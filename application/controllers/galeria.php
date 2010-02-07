<?php
class Galeria extends Controller{
    function Galeria() {
        parent::Controller();
        $this->load->model('gallery_model');
        $this->load->helper('text');
    }

    function index(){
        $result = $this->gallery_model->get_list();
        $this->load->view('galeria_view', array('listGallery'=>$result));
    }
}

?>
