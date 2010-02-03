<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Consurpyme</title>
    <?php include("includes/head_inc.php");?>

    <script type="text/javascript" src="js/helpers.js"></script>
    <script type="text/javascript" src="js/class.gallery.js"></script>
</head>

<body>
<div class="container">

    <?php include("includes/headerpanel_inc.php");?>

    <div class="clear span-7 push-2 last titles">
        <h1 style="margin-left: -10px"><?=$title;?></h1>
    </div>

    <div class="clear span-21 push-1 last content">
        <div class="proyecto span-19 push-1">
            <form action="" name="form1" id="form1" method="post" enctype="application/x-www-form-urlencoded">
                <div class="span-10 space-bottom">
                    <span>T&iacute;tulo</span><input class="float-right input1 border" type="text" name="txtTitle" value="<?=@$data["title"];?>" />
                </div>
                <div class="span-7 clear space-bottom">
                    <span>Descripci&oacute;n</span><br/>
                    <textarea class="textarea1 border" rows="5" cols="20" name="txtDescription"><?=@$data["description"];?></textarea>
                </div>

                <?php

                if( !$listImages ){?>
                    <div id="div-upload" class="span-18 clear space-bottom2">
                        <div class="span-3 index-image">Im&aacute;gen 1</div>
                        <input type="file" class="float-left border" size="22" name="uploadFile" onchange="Gallery.upload(this);" />
                        <input type="hidden" class="ajaxupload-filename" />
                        <div class="span-4 display-hidden ajax-loader">&nbsp;&nbsp;<img src="images/ajax-loader.gif" alt="" />&nbsp;Subiendo...</div>
                    </div>


                <?php }else{
                    
                    foreach( $listImages->result_array() as $row ){?>
                        <div id="div-upload" class="span-18 clear space-bottom2">
                            <div class="span-3 index-image"><img src="<?=$row['image_thumb'];?>" alt="<?=$row['name_original'];?>" class="ajaxupload-image" /></div>
                            <input type="file" class="float-left border" size="22" name="uploadFile" onchange="Gallery.upload(this);" />
                            <input type="hidden" class="ajaxupload-filename" value="<?=$row['image_thumb'];?>" />
                            <div class="span-4 display-hidden ajax-loader">&nbsp;&nbsp;<img src="images/ajax-loader.gif" alt="" />&nbsp;Subiendo...</div>
                        </div>
                <?php }
                }?>
    
                <div class="span-7 clear space-bottom">
                    <a href="#" class="link1" onclick="Gallery.attach(this); return false;">Adjuntar otra im&aacute;gen.</a>
                </div>


                <div class="span-7 clear space-bottom">
                    <span>Todos los campos son obligatorios</span>
                </div>

                <div class="span-7 clear space-bottom">
                    <input class="button2" type="button" value="Guardar" onclick="Gallery.save();" />
                    <input class="button2" type="button" value="Cancelar" onclick="location.href='<?=site_url('/panel/galeria/');?>';" />
                </div>
                
                <input type="hidden" name="gallery_id" value="<?=@$data["gallery_id"];?>" />
                <input type="hidden" name="images_new" />
            </form>
        </div>
    </div>

    <?php include("includes/footer_inc.php");?>

    <form action="" id="formAjaxUpload" method="post" enctype="multipart/form-data" class="display-hidden"></form>

</div>
</body>
</html>