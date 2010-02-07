<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends Model {

    function  Users_model() {
        parent::Model();
    }

    /*
     * FUNCTIONS PUBLIC
     */
    function update($data = array()) {

        if( empty($data['password']) ) unset($data['password']);

        // MODIFICA LOS DATOS
        $this->db->where('user_id', $this->session->userdata('user_id'));

        if( !$this->db->update(TBL_USERS, $data) ) {
            return false;
        }

        return "ok";
    }

    function get_email(){
        $this->db->select('email');
        $query = $this->db->get(TBL_USERS);
        $row = $query->row_array();
        return $row['email'];
    }

}
?>