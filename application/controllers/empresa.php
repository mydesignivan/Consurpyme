<?php
class Empresa extends Controller{
    function Empresa() {
        parent::Controller();
    }

    function index(){
        $this->load->view('index_view');
    }
}

?>
