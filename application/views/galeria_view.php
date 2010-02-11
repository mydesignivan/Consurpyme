<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Consurpyme</title>
    <?php include("includes/head_inc.php");?>

    <!-- JQUERY FANCYBOX -->
    <link rel="stylesheet" type="text/css" href="js/jquery.fancybox/jquery.fancybox.css" media="screen" />
    <script type="text/javascript" src="js/jquery.fancybox/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox/jquery.fancybox-1.2.1.pack.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox/execute.js"></script>
    <!--END SCRIPT-->
</head>

<body>
<div class="container">
    <?php include("includes/header_inc.php");?>

    <div class="clear span-7 push-2 last titles">
        <h1>GALERIA</h1>
    </div>

    <div class="clear span-21 push-1 last content">
        <div class="span-19 prepend-1">
            

            <table width="280" class="span-19 table-proyect" cellspacing="0">
                <thead>
                    <tr class="top-table">
                        <td class="span-1 column-table" ><span>Cliente</span></td>
                        <td class="span-2-1 column-table"><span>Descripci&oacute;n</span></td>
                        <td class="column-table"><span>Fotos</span></td>
                    </tr>
                </thead>
                <?php if( $listGallery->num_rows>0 ) {?><tbody ><?php }?>
                <?php
                $n=0;
                foreach( $listGallery->result_array() as $row ){$n++;?>
                    <tr>
                        <td class="span-1 column-info vert-align-top"><span class="bold"><?=$row['title'];?></span></td>
                        <td class="span-2-1 column-info2 vert-align-top"><span><?=nl2br($row['description']);?></span></td>
                        <td class="column-info3">
                            <ul>
                            <?php $listImages = $this->gallery_model->get_listImages($row['gallery_id']);
                                foreach( $listImages->result_array() as $row2 ){?>

                            <li><a href="<?=$row2['image_real'];?>" class="image-fancybox" rel="group<?=$n;?>"><img src="<?=$row2['image_thumb'];?>" alt="<?=$row2['name_original'];?>" /></a></li>

                            <?php }?>
                            </ul>
                        </td>
                    </tr>
            <?php }?>
                <?php if( $listGallery->num_rows>0 ) {?></tbody><?php }?>
            </table>
            
        </div>
    </div>

    <?php include("includes/footer_inc.php");?>
    
</div>
</body>
</html>