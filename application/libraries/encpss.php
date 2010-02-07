<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Encpss{

    var $CI;
    function  Encpss() {
        $this->CI =& get_instance();
        $this->CI->load->library('encrypt');
        $this->CI->encrypt->set_cipher(MCRYPT_BLOWFISH);
        $this->CI->encrypt->set_mode(MCRYPT_MODE_CFB);
    }

    function encode($pss){
        if( empty($pss) ) return '';

        return $this->CI->encrypt->encode($pss);
    }

    function decode($pss){
        return $this->CI->encrypt->decode($pss);
    }

}
?>
