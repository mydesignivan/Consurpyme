<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Consurpyme</title>
    <?php include("includes/head_inc.php");?>

    <script type="text/javascript" src="js/class.account.js"></script>
</head>

<body>
<div class="container">

    <?php include("includes/headerpanel_inc.php");?>

    <div class="clear span-7 push-2 last titles">
        <h1>MI CUENTA</h1>
    </div>

    <div class="clear span-21 push-1 last content">
        <div class="proyecto span-10 push-1">
            <form id="form1" action="<?=site_url('/panel/myaccount_modified');?>" method="post" onsubmit="return Account.validate();" enctype="application/x-www-form-urlencoded">
                <div class="span-8 space-bottom clear"><span>Usuario</span><input class="span-5 border float-right" type="text" name="txtUser" value="<?=$this->session->userdata('username');?>" /></div>
                <div class="span-8 space-bottom clear"><span>Email</span><input class="span-5 border float-right" type="text" name="txtEmail" value="<?=$this->session->userdata('email');?>" /></div>
                <div class="span-8 space-bottom clear"><span>Contrase&ntilde;a</span><input class="span-5 border float-right" type="password" name="txtPass" /></div>
                <div class="span-8 space-bottom clear"><span>Repetir contrase&ntilde;a</span><input class="span-5 border float-right" type="password" name="txtPass2" /></div>
                <div class="span-8 push-3 clear"><input class="button2" type="submit" value="Modificar" /></div>
            </form>
        </div>
    </div>

    <?php include("includes/footer_inc.php");?>
    
</div>
</body>
</html>