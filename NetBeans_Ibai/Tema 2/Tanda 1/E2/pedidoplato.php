<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include_once 'libmenu.php';
            session_start();
            if (!isset($_SESSION['nombre'])) {
                header('Location: entrada.php');
            }
            $opciones="";
            if (isset($_GET['plato'])){
                $tipo=$_GET['plato'];
                $platos=damePlatos($tipo);
                foreach ($platos as $plato => $pvp) {
                    $precio= intval($pvp);
                    if($_SESSION['nombre']!="invitado"){
                        $precio= (100-dameDcto($_SESSION['nombre']))/100*$precio;
                    }
                    $opciones.="<option value=$plato>$plato - $precio €</option>";
                }
            }
            $texto="Elija un $tipo";
            if(isset($_SESSION[$tipo])){
                $platoSeleccionado=$_SESSION[$tipo];
                $texto="Va a cambiar su eleccion $platoSeleccionado por:";
            }
        ?>
        <p><?php echo $texto ?></p><br>
        <form action="pedido.php?<?php echo $tipo?>" method="POST" enctype="multipart/form-data">
            <select name="plato">
                <?php echo $opciones ?>
            </select>
            <input type="submit" name="platos" value="ELEGIR <?php echo $tipo?>">
        </form>
    </body>
</html>
