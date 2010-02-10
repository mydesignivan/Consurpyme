<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Consurpyme</title>
    <?php include("includes/head_inc.php");?>

    <script type="text/javascript" src="js/login.js"></script>
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

            <form id="formLogin" action="<?=site_url('/login/');?>" method="post" onsubmit="return validate();">
                <div class="span-8 space-bottom"><span>Usuario</span><input class="login" type="text" name="txtLoginUser" /></div>
                <div class="span-8 space-bottom"><span>Contrase&ntilde;a</span><input class="login" type="password" name="txtLoginPass" /></div>
                <div class="span-8 space-bottom3"><input class="button1" type="submit" value="Entrar" /></div>
            </form>
        </div>
    </div>
    
</div>
</body>
</html>