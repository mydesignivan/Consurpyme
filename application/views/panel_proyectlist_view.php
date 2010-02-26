<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Consurpyme</title>
    <?php include("includes/head_inc.php");?>

    <script type="text/javascript" src="js/class.proyect.min.js"></script>
</head>

<body>
<div class="container">

    <?php include("includes/headerpanel_inc.php");?>

    <div class="clear span-7 push-2 last titles">
        <h1>PROYECTOS</h1>
    </div>

    <div class="clear span-21 push-1 last content">
        <div class="proyecto span-19 push-1">
            <div class="span-7">
                <input class="button2" type="button" value="Nuevo" onclick="javascript:location.href='<?=site_url('/panel/proyectform');?>'" />
                <?php if( $listProyects->num_rows>0 ){?>
                <input class="button2" type="button" value="Modificar" onclick="javascript:Proyect.buttons.edit();" />
                <input class="button2" type="button" value="Eliminar" onclick="javascript:Proyect.buttons.del();" />
                <?php }?>
            </div>

            <?php if( $listProyects->num_rows==0 ){?>
                <div class="proyect-message span-17 clear">
                    No hay proyectos cargados.
                </div>

            <?php }else{?>
            <table class="span-18 table-proyect" cellspacing="0">
                <thead>
                    <tr class="top-table">
                        <td class="span-0 column-table">&nbsp;</td>
                        <td class="span-3 column-table" ><span>Cliente</span></td>
                        <td class="span-4 column-table"><span>Descripci&oacute;n</span></td>
                        <td class="span-2 column-table"><span>Inicio</span></td>
                        <td class="span-2 column-table"><span>Fin</span></td>
                        <td class="span-2 column-table"><span>Plazo</span></td>
                    </tr>
                </thead>
    

                <tbody class="span-18">
                <?php foreach( $listProyects->result_array() as $row ){?>
                    <tr>
                        <td class="column-info span-0"><input type="checkbox" class="itemCheck" value="<?=$row['proyect_id'];?>" /></td>
                        <td class="column-info2 span-3"><?=$row['client'];?></td>
                        <td class="column-info span-4"><?=nl2br($row['description']);?></td>
                        <td class="column-info2 span-2"><?=$row['date_start'];?></td>
                        <td class="column-info span-2"><?=$row['date_end'];?></td>
                        <td class="column-info2 span-2"><?=utf8_encode($row['plazo']);?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
            <!--end .table-proyect-->
            <?php }?>

        </div>
    </div>

    <?php include("includes/footer_inc.php");?>
    
</div>
</body>
</html>