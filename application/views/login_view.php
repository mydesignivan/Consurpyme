<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Consurpyme</title>
    <?php include("includes/head_inc.php");?>

    <script type="text/javascript">
    <!--
        function validate(){
            if( document.formLogin.txtLoginUser.value.length==0 ){
                alert("Ingrese el nombre de Usuario.");
                document.formLogin.txtLoginUser.focus();
                return false;
            }
            if( document.formLogin.txtLoginPass.value.length==0 ){
                alert("Ingrese la Contraseña.");
                document.formLogin.txtLoginPass.focus();
                return false;
            }
            return true;
        }
        $(document).ready(function(){
            document.formLogin.txtLoginUser.focus();
        });
    -->
    </script>
</head>

<body>
<div class="container">

    <div class="clear span-9 push-8 last content-login">
        <div class="span-12">
            <?php if( $loginfaild==1 ){?>
                <div class="messagerror">
                    El usuario y/o password son incorrectos.
                </div>
            <?php }?>

            <form name="formLogin" action="<?=site_url('/login/');?>" method="post" onsubmit="return validate();">
                <div class="span-8 space-bottom"><span>Usuario</span><input class="login" type="text" name="txtLoginUser" /></div>
                <div class="span-8 space-bottom"><span>Contraseña</span><input class="login" type="password" name="txtLoginPass" /></div>
                <div class="span-8 push-3 space-bottom"><input class="button1" type="submit" value="Entrar" /></div>
            </form>
        </div>
    </div>
    
</div>
</body>
</html>