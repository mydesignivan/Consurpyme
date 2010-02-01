<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Consurpyme</title>
    <?php include("includes/head_inc.php");?>
    <script type="text/javascript">
    <!--
    function validate(){
        if( document.form1.txtUser.value.length==0 ){
            alert('Ingrese el nombre de "Usuario"');
            document.form1.txtUser.focus();
            return false;
        }
        if( document.form1.txtPass.value.length==0 ){
            alert('Ingrese el nuevo "Password"');
            document.form1.txtPass.focus();
            return false;
        }
        if( document.form1.txtPass2.value.length==0 ){
            alert('Ingrese la confirmación de la contraseña.');
            document.form1.txtPass2.focus();
            return false;
        }
        if( document.form1.txtPass.value!=document.form1.txtPass2.value ){
            alert('La confirmación del password es incorrecta.');
            document.form1.txtPass2.value="";
            document.form1.txtPass2.focus();
            return false;
        }

        return true;
    }
    -->
    </script>
</head>

<body>
<div class="container">

    <?php include("includes/headerpanel_inc.php");?>

    <div class="clear span-7 push-2 last titles">
        <h1>MI CUENTA</h1>
    </div>

    <div class="clear span-21 push-1 last content">
        <div class="proyecto span-10 push-1">
            <form name="form1" action="<?=site_url('/panel/myaccount_modified');?>" method="post" onsubmit="return validate();" enctype="application/x-www-form-urlencoded">
                <div class="span-7 space-bottom clear"><span>Usuario</span><input class="span-5 border float-right" type="text" name="txtUser" value="<?=$this->session->userdata('username');?>" /></div>
                <div class="span-7 space-bottom clear"><span>Contraseña</span><input class="span-5 border float-right" type="password" name="txtPass" /></div>
                <div class="span-7 space-bottom clear"><span>Repetir</span><input class="span-5 border float-right" type="password" name="txtPass2" /></div>
                <div class="span-8 push-3 clear"><input class="button2" type="submit" value="Modificar" /></div>
            </form>
        </div>
    </div>

    <?php include("includes/footer_inc.php");?>
    
</div>
</body>
</html>