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

            <?php }else{?>

            <table class="span-18 table-proyect">
                <thead>
                    <tr class="top-table">
                        <td class="span-0 column-table" ></td>
                        <td class="span-5 column-table"><span>T&iacute;tulo</span></td>
                        <td class="span-11-1 column-table"><span>Descripci&oacute;n</span></td>
                    </tr>
                </thead>

                <tbody class="span-18">
                <?php foreach( $list->result_array() as $row ){?>
                    <tr>
                        <td class="span-0 column-info"><input type="checkbox" class="itemCheck" value="<?=$row['gallery_id'];?>" /></td>
                        <td class="span-5 column-info2"><span><?=character_limiter(nl2br($row['title']), 60);?></span></td>
                        <td class="span-11-1 column-info"><span><?=character_limiter(nl2br($row['description']), 60);?></span></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
            </div><!--end .table-proyect-->
            <?php }?>
        </div>
    </div>

    <?php include("includes/footer_inc.php");?>
    
</div>
</body>
</html>