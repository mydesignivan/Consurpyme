<?php
class Servicios extends Controller{
    function  __construct() {
        parent::Controller();
    }

    public function index(){
        $this->load->view('servicios_view');
    }
}

?>
