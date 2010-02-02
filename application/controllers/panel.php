<?php
class Panel extends Controller{
    function  __construct() {
        parent::Controller();
        $this->load->library("simplelogin");
        if( !$this->session->userdata('logged_in') ) redirect('/login/');
        $this->load->helper('text');
    }

    /*
     * FUNCTIONS PUBLIC
     */
    public function index(){
        $this->proyectos();
    }

    public function proyectos(){
        $this->load->model('proyect_model');
        $data = $this->proyect_model->get_list();
        $this->load->view('panel_proyectlist_view', array('listProyects'=>$data));
    }
    public function proyectform(){
        if( $this->uri->segment(3)!="" ){
            $this->load->model('proyect_model');
            $data = $this->proyect_model->get_proyect($this->uri->segment(3));
            $title = "MODIFICAR PROYECTO";
        }else{
            $data = array();
            $title = "NUEVO PROYECTO";
        }
        $this->load->view('panel_proyectform_view', array("data"=>$data, "title"=>$title));
    }
    public function proyect_create(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->model('proyect_model');

            $status = $this->proyect_model->create($this->request_fields());

            if( $status=="ok" ){
                redirect('/panel/proyectos');
            }else{
                show_error("Ha ocurrido un error al guardar los datos.");
            }
        }
    }
    public function proyect_modified(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->model('proyect_model');

            $status = $this->proyect_model->update($this->request_fields(), $this->uri->segment(3));

            if( $status=="ok" ){
                redirect('/panel/proyectos');
            }else{
                show_error("Ha ocurrido un error al guardar los datos.");
            }
        }
    }
    public function proyect_delete(){
        $proyect_id = array();
        for( $n=3; $n<=$this->uri->total_segments(); $n++ ){
            $seg = $this->uri->segment($n);
            if( is_numeric($seg) ) $proyect_id[] = $seg;
        }

        if( count($proyect_id)>0 ){
            $this->load->model('proyect_model');
            if( $this->proyect_model->delete($proyect_id) ){
                redirect('/panel/proyectos');
            }else{
                show_error("Ha ocurrido un error al eliminar los datos.");
            }
        }
    }



    public function galeria(){
        $this->load->model('gallery_model');
        $result = $this->gallery_model->get_list();
        $this->load->view('panel_gallery_view', array('list'=>$result));
    }
    public function galleryform(){
        $this->load->model('gallery_model');
        if( !$this->uri->segment(3) ){
            $data = array();
            $title = "NUEVA GALERIA";
        }else{
            $data = $this->gallery_model->get_gallery($this->uri->segment(3));
            $title = "MODIFICAR GALERIA";
        }
        $this->load->view('panel_galleryform_view', array('data'=>$data, 'title'=>$title));
    }
    public function gallery_create(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->model('gallery_model');

            $status = $this->gallery_model->create($this->request_fields2());

            if( $status=="ok" ){
                redirect('/panel/galeria');
            }else{
                show_error("Ha ocurrido un error al guardar los datos.");
            }
        }
    }
    public function gallery_modified(){
    }
    public function gallery_gallery(){
    }


    public function micuenta(){
        $this->load->model('users_model');
        $this->load->view('panel_account_view');
    }
    public function myaccount_modified(){
        $this->load->model('users_model');
        $this->load->library('encpss');
        $data = array(
            'username'=>$_POST['txtUser'],
            'password'=>$this->encpss->encode($_POST['txtPass']),
        );
        $status = $this->users_model->update($data);
        if( $status=="ok" ){
            redirect('/login/logout');
        }else{
            show_error("Ha ocurrido un error al guardar los datos.");
        }
    }



    
    /*
     * FUNCTIONS PRIVATE
     */
    private function request_fields(){
        return array(
            'client'        =>  $_POST['txtClient'],
            'description'   =>  $_POST['txtDescription'],
            'date_start'    =>  $_POST['txtDateStart'],
            'date_end'      =>  $_POST['txtDateEnd'],
            'date_plazo'    =>  $_POST['txtDatePlazo'],
            'plazo_text'    =>  $_POST['txtPlazoText']
        );
    }
    private function request_fields2(){
        return array(
            'title'         =>  $_POST['txtTitle'],
            'description'   =>  $_POST['txtDescription']
        );
    }

}

?>
