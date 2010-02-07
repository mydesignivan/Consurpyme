<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Consurpyme</title>
    <?php include("includes/head_inc.php");?>
</head>

<body>
<div class="container">
    <?php include("includes/header_inc.php");?>

    <div class="clear span-7 push-2 last titles">
        <h1>PROYECTOS</h1>
    </div>

    <div class="clear span-21 push-1 last content">
        <div class="span-19 push-1">
            <table class="span-18 table-proyect">
                <thead>
                    <tr class="top-table">
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
                        <td class="span-3 column-info"><span class="bold"><?=$row['client'];?></span></td>
                        <td class="span-4 column-info2"><span><?=nl2br($row['description']);?></span></td>
                        <td class="span-2 column-info"><span><?=$row['date_start'];?></span></td>
                        <td class="span-2 column-info2"><span><?=$row['date_end'];?></span></td>
                        <td class="span-2 column-info"><span><?=$row['plazo'];?></span></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include("includes/footer_inc.php");?>
    
</div>
</body>
</html>