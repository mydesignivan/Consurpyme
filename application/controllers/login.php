<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Controller{

    function Login(){
        parent::Controller();
        $this->load->library("simplelogin");
        $this->load->library("encpss");
    }

    /*
     * FUNCTIONS PUBLIC
     */
    function index(){
        if( $this->session->userdata('logged_in') ) redirect('/panel/');
        $status=0;
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $statusLogin = $this->simplelogin->login($_POST["txtLoginUser"], $_POST["txtLoginPass"]);
            if( $statusLogin ){
                redirect('/panel/');
            }else{
                $status=1;
            }
        }
        $this->load->view('login_view', array('loginfaild'=>$status));
    }

    function logout(){
        $this->simplelogin->logout();
        redirect('/panel/');
    }

}

?>