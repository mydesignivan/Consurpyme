<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends Model {

    private $table_from;

    function  __construct() {
        parent::Model();
        $this->table_from = "users";
    }

    /*
     * FUNCTIONS PUBLIC
     */
    public function update($data = array()) {
        // MODIFICA LOS DATOS
        $this->db->where('user_id', $this->session->userdata('user_id'));

        if( !$this->db->update($this->table_from, $data) ) {
            return false;
        }

        return "ok";
    }

}
?>
