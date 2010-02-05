<?php
class Contacto extends Controller{
    function  __construct() {
        parent::Controller();
    }

    public function index(){
        $this->load->view('contacto_view');
    }

    public function send(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->library('email');


            if( !empty($_POST['txtLastName']) ){
                $name = $_POST['txtFirstName'].", ".$_POST['txtLastName'];
            }else{
                $name = $_POST['txtFirstName'];
            }
            $message = sprintf(EMAIL_CONTACT_MESSAGE, 
                        $name,
                        $_POST['txtSubject'],
                        $_POST['txtContactHours'],
                        $_POST['txtEmail'],
                        nl2br($_POST['txtMessage'])
                    );

            $this->email->from($_POST['txtEmail'], $name);
            $this->email->to(EMAIL_CONTACT_TO);
            $this->email->subject(EMAIL_CONTACT_SUBJECT);
            $this->email->message($message);
            if( $this->email->send() ){
                $this->session->set_flashdata('status_send', 'ok');
            }else {
                show_error(ERR_EMAIL_NOTSEND);
            }
            redirect('/contacto/');
        }
    }
}

?>
