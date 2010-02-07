<?php
class Panel extends Controller{
    function Panel() {
        parent::Controller();
        $this->load->library("simplelogin");
        if( !$this->session->userdata('logged_in') ) redirect('/login/');
        $this->load->helper('text');
    }

    /*
     * FUNCTIONS PUBLIC
     */
    function index(){
        $this->proyectos();
    }

    function proyectos(){
        $this->load->model('proyect_model');
        $data = $this->proyect_model->get_list();
        $this->load->view('panel_proyectlist_view', array('listProyects'=>$data));
    }
    function proyectform(){
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
    function proyect_create(){
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
    function proyect_modified(){
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
    function proyect_delete(){
        $id = $this->get_id();
        if( count($id)>0 ){
            $this->load->model('proyect_model');
            if( $this->proyect_model->delete($id) ){
                redirect('/panel/proyectos');
            }else{
                show_error("Ha ocurrido un error al eliminar los datos.");
            }
        }
    }



    function galeria(){
        $this->load->model('gallery_model');
        $result = $this->gallery_model->get_list();
        $this->load->view('panel_gallery_view', array('list'=>$result));
    }
    function galleryform(){
        $this->load->model('gallery_model');
        if( !$this->uri->segment(3) ){
            $data = array();
            $resultGallery = false;
            $title = "NUEVA GALERIA";
        }else{
            $data = $this->gallery_model->get_gallery($this->uri->segment(3));
            $resultGallery = $this->gallery_model->get_listImages($this->uri->segment(3));
            $title = "MODIFICAR GALERIA";
        }
        $this->load->view('panel_galleryform_view', array('data'=>$data, 'title'=>$title, 'listImages'=>$resultGallery));
    }
    function gallery_create(){
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
    function gallery_modified(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->model('gallery_model');
            
            $data = $this->request_fields2();
            $data['images_deletes'] = $_POST['images_deletes'];
            $data['images_modified_id'] = $_POST['images_modified_id'];
            $data['images_modified_name'] = $_POST['images_modified_name'];

            $status = $this->gallery_model->update($data, $this->uri->segment(3));

            if( $status=="ok" ){
                redirect('/panel/galeria');
            }else{
                show_error("Ha ocurrido un error al guardar los datos.");
            }
        }
    }
    function gallery_delete(){
        $id = $this->get_id();
        if( count($id)>0 ){
            $this->load->model('gallery_model');
            if( $this->gallery_model->delete($id) ){
                redirect('/panel/galeria');
            }else{
                show_error("Ha ocurrido un error al eliminar los datos.");
            }
        }
    }


    function micuenta(){
        $this->load->model('users_model');
        $this->load->view('panel_account_view');
    }
    function myaccount_modified(){
        $this->load->model('users_model');
        $this->load->library('encpss');
        $data = array(
            'username' => $_POST['txtUser'],
            'email'    => $_POST['txtEmail'],
            'password' => $this->encpss->encode($_POST['txtPass']),
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
    function request_fields(){
        return array(
            'client'        =>  $_POST['txtClient'],
            'description'   =>  $_POST['txtDescription'],
            'date_start'    =>  $_POST['txtDateStart'],
            'date_end'      =>  $_POST['txtDateEnd'],
            'plazo'         =>  $_POST['plazo']
        );
    }
    function request_fields2(){
        return array(
            'title'                 =>  $_POST['txtTitle'],
            'description'           =>  $_POST['txtDescription'],
            'images_new'            =>  $_POST['images_new']
        );
    }
    function get_id(){
        $id = array();
        for( $n=3; $n<=$this->uri->total_segments(); $n++ ){
            $seg = $this->uri->segment($n);
            if( is_numeric($seg) ) $id[] = $seg;
        }
        return $id;
    }

}
?>