<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ajax_upload extends Controller {

    private $file;
    function __construct(){
        parent::Controller();
        $this->load->helper('upload_helper');
        $this->file = $_FILES[key($_FILES)];
    }


    /*
     * FUNCTIONS PUBLIC
     */
    public function index(){
        if( $this->validate() ){
            $filename = $this->get_filename();

            move_uploaded_file($this->file['tmp_name'], UPLOAD_DIR_TMP.$filename);

            $config['image_library'] = 'GD';
            $config['source_image'] = UPLOAD_DIR_TMP.$filename;
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = UPLOAD_WIDTH;
            $config['height'] = UPLOAD_HEIGHT;
            $this->load->library('image_lib', $config);

            if( ! $this->image_lib->resize() ){
                echo $this->image_lib->display_errors();
            }else{
                $ext = substr($filename, (strripos($filename, ".")-strlen($filename))+1);
                $basename = substr($filename, 0, strripos($filename, "."));
                echo "filename:".UPLOAD_DIR_TMP.$basename."_thumb.".$ext;
            }

        }
    }

    /*
     * FUNCTIONS PRIVATE
     */
    private function validate(){
        if( !is_uploaded_file($this->file['tmp_name']) ) die(ERR_UPLOAD_NOTUPLOAD);
        if( round($this->file['size']/1024, 2) > (int)UPLOAD_MAXSIZE ) die(sprintf(ERR_UPLOAD_MAXSIZE, (int)UPLOAD_MAX_SIZE/2));
        if( !$this->is_allowed_filetype() ) die(ERR_UPLOAD_FILETYPE);

        return true;
    }

    private function is_allowed_filetype(){
        require_once(APPPATH.'config/mimes'.EXT);

        $extention = explode("|", UPLOAD_FILETYPE);
        foreach( $extention as $ext ){
            $mime = $mimes[$ext];

            if( is_array($mime) ){
                if( in_array($this->file['type'], $mime) ) return true;
            }else{
                if( $mime==$this->file['type'] ) return true;
            }
        }
        return false;
    }

    private function get_filename(){
        $name = preg_replace("/\s+/", "_", strtolower($this->file['name']));
        return $this->session->userdata('user_id') ."_". uniqid(time()) ."__". $name;
    }

}

?>