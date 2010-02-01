<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Proyect_model extends Model {

    private $table_from;

    function  __construct() {
        parent::Model();
        $this->table_from = "proyects";
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

    public function update($data = array(), $proyect_id=null) {
        if( !is_numeric($proyect_id) ) return false;

        // MODIFICA LOS DATOS
        $this->db->where('proyect_id', $proyect_id);

        if( !$this->db->update($this->table_from, $data) ) {
            return false;
        }

        return "ok";
    }

    public function delete($proyect_id) {
        $this->db->where('proyect_id in ('.$proyect_id.')');
        if( !$this->db->delete($this->table_from) ){
            return false;
        }

        return true;
    }

    public function get_list(){
        $this->db->order_by('proyect_id', 'desc');
        $this->db->order_by('client', 'asc');
        return $this->db->get($this->table_from);
    }

    public function get_proyect($proyect_id){
        if( !is_numeric($proyect_id) ) return false;
        $query = $this->db->get_where($this->table_from, array("proyect_id"=>$proyect_id));
        return $query->row_array();
    }

}
?>
