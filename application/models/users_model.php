<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends Model {


    function  __construct() {
        parent::Model();
    }

    /*
     * FUNCTIONS PUBLIC
     */
    public function update($data = array()) {
        // MODIFICA LOS DATOS
        $this->db->where('user_id', $this->session->userdata('user_id'));

        if( !$this->db->update(TBL_USERS, $data) ) {
            return false;
        }

        return "ok";
    }

}
?>
