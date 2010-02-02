<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Proyect_model extends Model {


    function  __construct() {
        parent::Model();
    }

    /*
     * FUNCTIONS PUBLIC
     */
    public function create($data = array()) {

        // INSERTA LOS DATOS
        if( !$this->db->insert(TBL_PROYECTS, $data) ) {
            return false;
        }

        return "ok";
    }

    public function update($data = array(), $proyect_id=null) {
        if( !is_numeric($proyect_id) ) return false;

        // MODIFICA LOS DATOS
        $this->db->where('proyect_id', $proyect_id);

        if( !$this->db->update(TBL_PROYECTS, $data) ) {
            return false;
        }

        return "ok";
    }

    public function delete($proyect_id) {
        $this->db->where_in($proyect_id);
        if( !$this->db->delete(TBL_PROYECTS) ){
            return false;
        }

        return true;
    }

    public function get_list(){
        $this->db->order_by('proyect_id', 'desc');
        $this->db->order_by('client', 'asc');
        return $this->db->get(TBL_PROYECTS);
    }

    public function get_proyect($proyect_id){
        if( !is_numeric($proyect_id) ) return false;
        $query = $this->db->get_where(TBL_PROYECTS, array("proyect_id"=>$proyect_id));
        return $query->row_array();
    }

}
?>
