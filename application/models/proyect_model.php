<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Proyect_model extends Model {

    function  Proyect_model() {
        parent::Model();
    }

    /*
     * FUNCTIONS PUBLIC
     */
    function create($data = array()) {

        // INSERTA LOS DATOS
        if( !$this->db->insert(TBL_PROYECTS, $data) ) {
            return false;
        }

        return "ok";
    }

    function update($data = array(), $proyect_id=null) {
        if( !is_numeric($proyect_id) ) return false;

        // MODIFICA LOS DATOS
        $this->db->where('proyect_id', $proyect_id);

        if( !$this->db->update(TBL_PROYECTS, $data) ) {
            return false;
        }

        return "ok";
    }

    function delete($proyect_id) {
        $this->db->where_in("proyect_id", $proyect_id);
        if( !$this->db->delete(TBL_PROYECTS) ){
            return false;
        }

        return true;
    }

    function get_list(){
        $this->db->order_by('proyect_id', 'desc');
        $this->db->order_by('client', 'asc');
        return $this->db->get(TBL_PROYECTS);
    }

    function get_proyect($proyect_id){
        if( !is_numeric($proyect_id) ) return false;
        $query = $this->db->get_where(TBL_PROYECTS, array("proyect_id"=>$proyect_id));
        return $query->row_array();
    }

}
?>