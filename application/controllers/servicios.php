<?php
class Servicios extends Controller{
    function Servicios() {
        parent::Controller();
    }

    function index(){
        $this->load->view('servicios_view');
    }
}

?>
