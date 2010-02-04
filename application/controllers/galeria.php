<?php
class Galeria extends Controller{
    function  __construct() {
        parent::Controller();
        $this->load->model('gallery_model');
        $this->load->helper('text');
    }

    public function index(){
        $result = $this->gallery_model->get_list();
        $this->load->view('galeria_view', array('listGallery'=>$result));
    }
}

?>
