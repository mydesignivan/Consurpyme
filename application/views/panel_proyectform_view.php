<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Consurpyme</title>
    <?php include("includes/head_inc.php");?>

    <!--SCRIPT: "CALENDARIO DatePicker"-->
    <link rel="stylesheet" href="js/jquery.datepicker/style.css" type="text/css" media="all" />
    <script type="text/javascript" src="js/jquery.datepicker/ui.datepicker.js"></script>
    <!--END SCRIPT-->

    <script type="text/javascript" src="js/class.proyect.js"></script>
</head>

<body>
<div class="container">

    <?php include("includes/headerpanel_inc.php");?>

    <div class="clear span-7 push-2 last titles">
        <h1 style="margin-left: -10px"><?=$title;?></h1>
    </div>

    <div class="clear span-21 push-1 last content">
        <div class="proyecto span-19 push-1">
            <form action="" id="form1" method="post" enctype="application/x-www-form-urlencoded">
                <div class="span-10 space-bottom">
                    <span>Cliente</span><input class="float-right input1 border" type="text" name="txtClient" value="<?=@$data["client"];?>" />
                </div>
                <div class="span-7 clear space-bottom">
                    <span>Descripci&oacute;n</span><br/>
                    <textarea class="textarea1 border" rows="5" cols="20" name="txtDescription"><?=@$data["description"];?></textarea>
                </div>
                <div class="span-4 space-bottom clear">
                    <span>Inicio &emsp;</span><input class="input2 border" type="text" name="txtDateStart" id="txtDateStart" value="<?=@$data["date_start"];?>" />
                </div>
                <div class="span-4 space-bottom">
                    <span>Fin &emsp;</span><input class="input2 border" type="text" name="txtDateEnd" id="txtDateEnd" value="<?=@$data["date_end"];?>" />
                </div>
                <div class="span-9 space-bottom clear">
                    <span class="float-left">Plazo&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input class="input-plazo border" type="text" name="txtPlazo" value="<?=@$data["plazo"];?>" />
                    <select name="cboPlazoUnit">
                        <option value="d&iacute;as" <?php if( @$data["plazo_unit"]=="días" ) echo 'selected="selected"';?>>D&iacute;as</option>
                        <option value="meses" <?php if( @$data["plazo_unit"]=="meses" ) echo 'selected="selected"';?>>Meses</option>
                        <option value="a&ntilde;os" <?php if( @$data["plazo_unit"]=="años" ) echo 'selected="selected"';?>>A&ntilde;os</option>
                    </select>
                </div>
                <div class="span-7 clear space-bottom">
                    <span>Todos los campos son obligatorios</span>
                </div>
                <div class="span-7 clear space-bottom">
                    <input class="button2" type="button" value="Guardar" onclick="Proyect.save();" />
                    <input class="button2" type="button" value="Cancelar" onclick="javascript:location.href='<?=site_url('/panel/proyectos/');?>';" />
                </div>
                <input type="hidden" name="proyect_id" value="<?=@$data["proyect_id"];?>" />
                <input type="hidden" name="plazo" value="<?=@$data["plazo"];?>" />
            </form>
        </div>
    </div>

    <?php include("includes/footer_inc.php");?>
    
</div>
</body>
</html>