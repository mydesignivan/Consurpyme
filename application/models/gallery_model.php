<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Gallery_model extends Model {

    function  __construct() {
        parent::Model();
        $this->load->helper('upload_helper');
    }

    /*
     * FUNCTIONS PUBLIC
     */
    public function create($data = array()) {
        $images_new = json_decode($data['images_new']);

        unset($data['images_new']);

        // INSERTA LOS DATOS
        if( !$this->db->insert(TBL_GALLERY, $data) ) {
            return false;
        }

        $gallery_id = $this->db->insert_id();

        // COPIA LAS IMAGENES NUEVAS
        $data = $this->copy_images($images_new, $gallery_id);
        if( !$data ) return false;

        // GUARDA LAS IMAGENES EN LA BASE DE DATO
        foreach( $data as $dat ){
            if( !$this->db->insert(TBL_IMAGES, $dat) ) {
                return false;
            }
        }

        // ELIMINA LAS IMAGENES TEMPORALES DEL USUARIO
        delete_images_temp();

        return "ok";
    }

    public function update($data = array(), $id=null) {
        if( !is_numeric($id) ) return false;

        $images_new = json_decode($data['images_new']);
        $images_deletes = json_decode($data['images_deletes']);
        $images_modified_id = json_decode($data['images_modified_id']);
        $images_modified_name = json_decode($data['images_modified_name']);

        unset($data['images_new']);
        unset($data['images_deletes']);
        unset($data['images_modified_id']);
        unset($data['images_modified_name']);

        // MODIFICA LOS DATOS
        $this->db->where('gallery_id', $id);
        if( !$this->db->update(TBL_GALLERY, $data) ) {
            return false;
        }

        // ELIMINA IMAGENES
        if( $images_deletes!="" ){
            foreach( $images_deletes as $image_id ){
                $row = $this->db->query("SELECT name, name_thumb FROM ". TBL_IMAGES ." WHERE image_id=".$image_id)->row_array();

                @unlink(UPLOAD_DIR.$row['name']);
                @unlink(UPLOAD_DIR.$row['name_thumb']);

                if( $images_modified_id=="" ){
                    $this->db->delete(TBL_IMAGES, array('image_id'=>$image_id));
                }
            }
        }

        // COPIA LAS IMAGENES NUEVAS
        if( $images_new!="" ){
            $data = $this->copy_images($images_new, $id);

            // GUARDA LAS IMAGENES EN LA BASE DE DATO
            foreach( $data as $dat ){
                if( !$this->db->insert(TBL_IMAGES, $dat) ) {
                    return false;
                }
            }
        }

        // COPIA Y MODIFICA LAS IMAGENES
        if( $images_modified_name!="" ){
            $data = $this->copy_images($images_modified_name, $id);
            if( !$data ) return false;

            // MODIFICA LAS IMAGENES EN LA BASE DE DATO
            foreach( $images_modified_id as $image_id ){
                $dat = current($data);
                unset($dat['prop_id']);
                $this->db->where('image_id', $image_id);

                if( !$this->db->update(TBL_IMAGES, $dat) ) {
                    return false;
                }
                next($data);
            }
        }

        // ELIMINA LAS IMAGENES TEMPORALES DEL USUARIO
        delete_images_temp();

        return "ok";
    }

    public function delete($id) {

        // ELIMINA LAS IMAGENES
        $this->db->select('name, name_thumb');
        $this->db->where_in("gallery_id", $id);
        $query = $this->db->get(TBL_IMAGES);

        foreach( $query->result_array() as $row ){
            @unlink(UPLOAD_DIR.$row['name']);
            @unlink(UPLOAD_DIR.$row['name_thumb']);
        }

        // ELIMINA DATOS EN (properties, properties_to_services, images)
        $delete1 = $this->db->query('DELETE FROM '.TBL_GALLERY.' WHERE gallery_id in('. implode(",", $id) .')');
        $delete2 = $this->db->query('DELETE FROM '.TBL_IMAGES.' WHERE gallery_id in('. implode(",", $id) .')');

        if( !$delete1 || !$delete2 ) return false;

        return true;
    }

    public function get_gallery($id){
        $this->db->select('gallery_id, title, description');
        $this->db->where('gallery_id', $id);
        $query = $this->db->get(TBL_GALLERY);
        return $query->row_array();
    }

    public function get_list(){
        $this->db->order_by('gallery_id', 'desc');
        $this->db->order_by('title', 'asc');
        return $this->db->get(TBL_GALLERY);
    }

    public function get_listImages($id){
        $this->db->select("image_id");
        $this->db->select("CONCAT('".UPLOAD_DIR."',name_thumb) as image_thumb", false);
        $this->db->select("CONCAT('".UPLOAD_DIR."',name) as image_real", false);
        $this->db->select("name_original");

        $this->db->where('gallery_id', $id);
        return $this->db->get(TBL_IMAGES);
    }
    


    /*
     * FUNCTION PRIVATE
     */
     private function copy_images($images_new, $gallery_id){
        $user_id = $this->session->userdata('user_id');
        $prefix = $user_id."_";
        $data = array();
        foreach( $images_new as $name_original ){
            $name = preg_replace("/\s+/", "_", strtolower($name_original));


            $filesource = file_search_special(UPLOAD_DIR_TMP, "/^".$user_id."\_.*\__".$name."$/");

            if( $filesource ){
                $filename_dest = $prefix.$name;
                $partf = part_filename($name);

                $n=0;
                while( file_exists(UPLOAD_DIR.$filename_dest) ){
                    $n++;
                    $partf2 = part_filename($filename_dest);
                    $filename_dest = $partf2['basename']."_copy".$n.".".$partf2['ext'];

                    $partf3 = part_filename($name_original);
                    $name_original = $partf3['basename']."_copy".$n.".".$partf3['ext'];
                }


                /*echo $filesource."<br>";
                echo UPLOAD_DIR.$filename_dest;
                die();*/
                if( !@copy($filesource, UPLOAD_DIR.$filename_dest) ){
                    return false;
                }

                if( $n==0 ){
                    $filename_thumb_dest = $prefix.$partf['basename']."_thumb.".$partf['ext'];
                }else{
                    $filename_thumb_dest = $partf2['basename']."_copy".$n."_thumb.".$partf2['ext'];
                }

                $filesource = str_replace($name, "", $filesource);
                if( !@copy($filesource.$partf['basename']."_thumb.".$partf['ext'], UPLOAD_DIR.$filename_thumb_dest) ){
                    return false;
                }

                $data[] = array(
                    'name'=>$filename_dest,
                    'name_thumb'=>$filename_thumb_dest,
                    'name_original'=>$name_original,
                    'gallery_id'=>$gallery_id
                );

            }else{
                die("Si estas viendo este error, porfavor anotate, el nombre del archivo:<br>Nombre Archivo: ".$name);
                return false;
            }
        }

        return $data;
     }


}
?>
