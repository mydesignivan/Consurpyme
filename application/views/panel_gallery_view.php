<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Consurpyme</title>
    <?php include("includes/head_inc.php");?>

    <script type="text/javascript" src="js/class.gallery.js"></script>
</head>

<body>
<div class="container">

    <?php include("includes/headerpanel_inc.php");?>

    <div class="clear span-7 push-2 last titles">
        <h1>GALERIA</h1>
    </div>

    <div class="clear span-21 push-1 last content">
        <div class="proyecto span-19 push-1">
            <div class="span-6">
                <input class="button2" type="button" value="Nuevo" onclick="javascript:location.href='<?=site_url('/panel/galleryform');?>'" />
                <?php if( $list->num_rows>0 ){?>
                <input class="button2" type="button" value="Modificar" onclick="javascript:Gallery.buttons.edit();" />
                <input class="button2" type="button" value="Eliminar" onclick="javascript:Gallery.buttons.del();" />
                <?php }?>
            </div>

            <?php if( $list->num_rows==0 ){?>
                <div class="proyect-message span-17 clear">
                    No hay Galer&iacute;as de Fotos cargadas.
                </div>

            <table class="span-18 table-proyect">
                <thead>
                    <tr class="top-table">
                        <td class="span-0 column-table">&nbsp;</td>
                        <td class="column-table align-left span-5" ><span>T&iacute;tulo</span></td>
                        <td class="column-table align-left span-11-1 border-none"><span>Descripci&oacute;n</span></td>
                    </tr>
                </thead>
                <tbody class="body-table span-18">
                    <tr>
                        <td class="column-info span-0"><input type="checkbox" class="itemCheck" value="" /></td>
                        <td class="column-info span-5"></td>
                        <td class="column-info span-11-1 border-none"></td>
                    </tr>
                </tbody>
            </table>

            <?php }else{?>

            <div class="table-proyect span-19 clear">
                <div class="top-table span-18">
                    <div class="span-1 column-table"></div>
                    <div class="column-table align-left span-5"><span>T&iacute;tulo</span></div>
                    <div class="column-table align-left span-11-1 border-none"><span>Descripci&oacute;n</span></div>
                </div>
                
                <?php
                    $n=0;
                    foreach( $list->result_array() as $row ){
                    $n++;
                    $class = ($n%2) ? 'row-odd' : '';
                 ?>
                <div class="body-table span-18 <?=$class;?>">
                    <div class="column-info span-1"><input type="checkbox" class="itemCheck" value="<?=$row["gallery_id"];?>" /></div>
                    <div class="column-info span-5"><?=$row['title'];?></div>
                    <div class="column-info span-11-1 border-none"><?=character_limiter(nl2br($row['description']), 60);?></div>
                </div>
                <?php }?>
            </div><!--end .table-proyect-->
            <?php }?>
        </div>
    </div>

    <?php include("includes/footer_inc.php");?>
    
</div>
</body>
</html>