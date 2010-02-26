<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 					'ab');
define('FOPEN_READ_WRITE_CREATE', 				'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 			'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| NOMBRE DE LAS TABLAS   (BASE DE DATO)
|--------------------------------------------------------------------------
*/
define('TBL_GALLERY',  'gallery');
define('TBL_IMAGES',   'images');
define('TBL_PROYECTS', 'proyects');
define('TBL_USERS',    'users');

/*
|--------------------------------------------------------------------------
| MENSAJES DE ERROR
|--------------------------------------------------------------------------
*/
define('ERR_UPLOAD_NOTUPLOAD', 'El archivo no ha podido llegar al servidor.');
define('ERR_UPLOAD_MAXSIZE', 'El tamaño del archivo debe ser menor a %s MB.');
define('ERR_UPLOAD_FILETYPE', 'El tipo de archivo es incompatible.');
define('ERR_EMAIL_NOTSEND', 'El email no ha podido ser enviado.');

/*
|--------------------------------------------------------------------------
| UPLOAD FILE
|--------------------------------------------------------------------------
*/
define('UPLOAD_DIR', './uploads/');
define('UPLOAD_DIR_TMP', './uploads/tmp/');
define('UPLOAD_FILETYPE', 'gif|jpg|png');
define('UPLOAD_MAXSIZE', 1536); //Expresado en Kylobytes

define('IMAGE_THUMB_WIDTH', 107);
define('IMAGE_THUMB_HEIGHT', 90);
define('IMAGE_THUMB_QUALITY', 90);
define('IMAGE_ORIGINAL_WIDTH', 800);
define('IMAGE_ORIGINAL_HEIGHT', 600);
define('IMAGE_ORIGINAL_QUALITY', 80);


/*
|--------------------------------------------------------------------------
| EMAIL (FORMULARIO DE CONSULTA)
|--------------------------------------------------------------------------
*/
define('EMAIL_CONTACT_SUBJECT', 'www.consurpyme.com.ar - Formulario de consulta');
define('EMAIL_CONTACT_MESSAGE', '<b>Nombre y Apellido:</b> %s<br><b>Asunto:</b> %s<br><b>Horario de contacto:</b> %s<br><b>Email:</b> %s<br><b>Mensaje:</b><hr color="#000000" />%s');


/* End of file constants.php */
/* Location: ./system/application/config/constants.php */