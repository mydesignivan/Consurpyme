<?php
class Contacto extends Controller{
    function Contacto() {
        parent::Controller();
    }

    /*
     * FUNCTIONS PUBLIC
     */
    function index(){
        $this->load->view('contacto_view');
    }

    function send(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->library('email');
            $this->load->model('users_model');

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
            $this->email->to($this->users_model->get_email());
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