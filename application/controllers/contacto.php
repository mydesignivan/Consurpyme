<?php
class Contacto extends Controller{
    function  __construct() {
        parent::Controller();
    }

    public function index(){
        $this->load->view('contacto_view');
    }
}

?>
