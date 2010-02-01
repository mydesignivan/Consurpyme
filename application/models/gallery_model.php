<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Gallery_model extends Model {

    private $table_from;

    function  __construct() {
        parent::Model();
        $this->table_from = "gallery";
    }

    /*
     * FUNCTIONS PUBLIC
     */
    public function create($data = array()) {

        // INSERTA LOS DATOS
        if( !$this->db->insert($this->table_from, $data) ) {
            return false;
        }

        return "ok";
    }

    public function update($data = array(), $id=null) {
        if( !is_numeric($id) ) return false;

        // MODIFICA LOS DATOS
        $this->db->where('gallery_id', $id);

        if( !$this->db->update($this->table_from, $data) ) {
            return false;
        }

        return "ok";
    }

    public function delete($id) {
        $this->db->where('gallery_id in ('.$id.')');
        if( !$this->db->delete($this->table_from) ){
            return false;
        }

        return true;
    }

    public function get_gallery($id){
    }

    public function get_list(){
        $this->db->order_by('gallery_id', 'desc');
        $this->db->order_by('title', 'asc');
        return $this->db->get($this->table_from);
    }


}
?>
