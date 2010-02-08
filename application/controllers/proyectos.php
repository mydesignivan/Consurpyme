<?php
class Proyectos extends Controller{
    function Proyectos() {
        parent::Controller();
        $this->load->model('proyect_model');
        $this->load->helper('text');
    }

    /*
     * FUNCTIONS PUBLIC
     */
    function index(){
        $data = $this->proyect_model->get_list();
        $this->load->view('proyectos_view', array('listProyects'=>$data));
    }
    
}
?>