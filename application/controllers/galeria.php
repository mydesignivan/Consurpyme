<?php
class Galeria extends Controller{
    function  __construct() {
        parent::Controller();
    }

    public function index(){
        $this->load->view('galeria_view');
    }
}

?>
