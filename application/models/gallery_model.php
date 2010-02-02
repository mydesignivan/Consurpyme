<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Gallery_model extends Model {

    function  __construct() {
        parent::Model();
    }

    /*
     * FUNCTIONS PUBLIC
     */
    public function create($data = array()) {

        // INSERTA LOS DATOS
        if( !$this->db->insert(TBL_GALLERY, $data) ) {
            return false;
        }

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
    }

    public function get_list(){
        $this->db->order_by('gallery_id', 'desc');
        $this->db->order_by('title', 'asc');
        return $this->db->get(TBL_GALLERY);
    }


}
?>
