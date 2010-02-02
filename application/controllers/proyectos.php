<?php
class Proyectos extends Controller{
    function  __construct() {
        parent::Controller();
        $this->load->model('proyect_model');
        $this->load->helper('text');
    }

    public function index(){
        $data = $this->proyect_model->get_list();
        $this->load->view('proyectos_view', array('listProyects'=>$data));
    }
}

?>
