<?php
class Clientes extends Controller{
    function  __construct() {
        parent::Controller();
    }

    public function index(){
        $this->load->view('clientes_view');
    }
}

?>
