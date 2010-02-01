<?php
class Iso extends Controller{
    function  __construct() {
        parent::Controller();
    }

    public function index(){
        $this->load->view('iso_view');
    }
}

?>
