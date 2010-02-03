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

        // MODIFICA LOS DATOS
        $this->db->where('gallery_id', $id);

        if( !$this->db->update(TBL_GALLERY, $data) ) {
            return false;
        }

        return "ok";
    }

    public function delete($id) {
        $this->db->where_in($id);
        if( !$this->db->delete(TBL_GALLERY) ){
            return false;
        }

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
        $this->db->select("CONCAT('".UPLOAD_DIR."',name_thumb) as image_thumb, name_original", false);
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
