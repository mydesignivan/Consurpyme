<?php
class Proyectos extends Controller{
    function  __construct() {
        parent::Controller();
    }

    public function index(){
        $this->load->view('proyectos_view');
    }
}

?>
