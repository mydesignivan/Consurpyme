<?php
class Clientes extends Controller{
    function  Clientes() {
        parent::Controller();
    }

    function index(){
        $this->load->view('clientes_view');
    }
}

?>
