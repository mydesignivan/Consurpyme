<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Consurpyme</title>
    <?php include("includes/head_inc.php");?>
    <script type="text/javascript" src="js/class.contact.js"></script>
</head>

<body>
<div class="container">

    <?php include("includes/header_inc.php");?>

    <div class="clear span-7 push-2 last titles">
        <h1>CONTACTO</h1>
    </div>

    <div class="clear span-21 push-1 last content">

        <div class="span17 prepend-1 contact">
            <div class="span-17 prepend-1 btop"></div>
            <div class="contact-form">
                <?php if( !$this->session->flashdata('status_send') ){?>
                <form id="form1" action="<?=site_url('/contacto/send/');?>" method="post" enctype="application/x-www-form-urlencoded">
                    <div class="column-form span-8">
                        <div class="row-form"><span>*Nombre:</span><br/>
                            <div class="input4"><input type="text" name="txtFirstName" /></div>
                            <div class="msgvalidator"></div>
                        </div>
                        <div class="row-form clear"><span>Apellido:</span><br/>
                            <div class="input4"><input type="text" name="txtLastName" /></div>
                        </div>
                        <div class="row-form clear"><span>*Mensaje:</span><br/>
                            <div class="input5"><textarea rows="5" cols="20" name="txtMessage" ></textarea></div>
                            <div class="msgvalidator"></div>
                        </div>
                    </div>
                    <div class="column-form span-8">
                        <div class="row-form"><span>*Asunto:</span><br/>
                            <div class="input4"><input type="text" name="txtSubject" /></div>
                            <div class="msgvalidator"></div>
                        </div>
                        <div class="row-form clear"><span>Horario de Contacto:</span><br/>
                            <div class="input4"><input type="text" name="txtContactHours" /></div>
                        </div>
                        <div class="row-form clear"><span>*E-mail:</span><br/>
                            <div class="input4"><input type="text" name="txtEmail" /></div>
                            <div class="msgvalidator"></div>
                        </div>
                    </div>

                    <div class="span-8 clear legend">(*) Campos obligatorios.</div>
                    <div class="span-3 clear prepend-7">
                        <input class="button3" type="button" value="Enviar" onclick="Contact.send();" />
                    </div>
                </form>
                <?php }elseif( $this->session->flashdata('status_send')=="ok" ){?>
                    <div class="message">
                        <p>
                            Muchas gracias por comunicarse,<br />
                            En breve estaremos en contacto.
                        </p>
                    </div>
                <?php }?>
            </div>
            <div class="span-17 prepend-1 bbottom"></div>
        </div>
    </div>

    <?php include("includes/footer_inc.php");?>
    
</div>
</body>
</html>