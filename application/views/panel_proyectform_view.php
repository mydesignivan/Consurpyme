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
            <form action="" name="form1" method="post" enctype="application/x-www-form-urlencoded">
                <div class="span-10 space-bottom">
                    <span>Cliente</span><input class="float-right input1 border" type="text" name="txtClient" value="<?=getval($data, "client");?>" />
                </div>
                <div class="span-7 clear space-bottom">
                    <span>Descripci&oacute;n</span><br/>
                    <textarea class="textarea1 border" rows="5" cols="20" name="txtDescription"><?=getval($data, "description");?></textarea>
                </div>
                <div class="span-4 space-bottom clear">
                    <span>Inicio &emsp;</span><input class="input2 border" type="text" name="txtDateStart" value="<?=getval($data, "date_start");?>" />
                </div>
                <div class="span-4 space-bottom">
                    <span>Fin &emsp;</span><input class="input2 border" type="text" name="txtDateEnd" value="<?=getval($data, "date_end");?>" />
                </div>
                <div class="span-9 space-bottom clear">
                    <span>Plazo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input class="input2 border" type="text" name="txtDatePlazo" value="<?=getval($data, "date_plazo");?>" />&nbsp;&nbsp;<input class="input3 border" type="text" name="txtPlazoText" value="<?=getval($data, "plazo_text");?>" />
                    <!--<select class="border" name="cboDay">
                        <option value="0">d&iacute;a</option>
                    <?php for( $n=1; $n<=31; $n++ ){?>
                        <option value="<?=$n;?>"><?=$n;?></option>
                    <?php }?>
                    </select>
                    <select class="border" name="cboMonth">
                        <option value="0">mes</option>
                    <?php for( $n=1; $n<=12; $n++ ){?>
                        <option value="<?=$n;?>"><?=$n;?></option>
                    <?php }?>
                    </select>
                    <select class="border" name="cboYear">
                        <option value="0">a&ntilde;o</option>
                    <?php for( $n=1933; $n<=date('Y'); $n++ ){?>
                    <option value="<? echo $n;?>"><? echo $n;?>&nbsp;</option>
                    <?php }?>
                    </select>-->
                </div>
                <div class="span-7 clear space-bottom">
                    <span>Avance</span><br/>
                    <textarea class="textarea1 border" rows="5" cols="20" name="txtAdvance"><?=getval($data, "advance");?></textarea>
                </div>
                <div class="span-7 clear space-bottom">
                    <span>Todos los campos son obligatorios</span>
                </div>
                <div class="span-7 clear space-bottom">
                    <input class="button2" type="button" value="Guardar" onclick="Proyect.save();" />
                    <input class="button2" type="button" value="Cancelar" onclick="javascript:location.href='<?=site_url('/panel/proyectos/');?>';" />
                </div>
                <input type="hidden" name="proyect_id" value="<?=getval($data, "proyect_id");?>" />
            </form>
        </div>
    </div>

    <?php include("includes/footer_inc.php");?>
    
</div>
</body>
</html>