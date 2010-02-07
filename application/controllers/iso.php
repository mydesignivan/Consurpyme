<?php
class Iso extends Controller{
    function Iso() {
        parent::Controller();
    }

    function index(){
        $this->load->view('iso_view');
    }
}

?>
