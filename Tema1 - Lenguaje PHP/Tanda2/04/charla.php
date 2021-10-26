<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT</title>
</head>
<body>
    <?php
        if( isset($_GET["butEnviar"]) )
            $infoUser=$_GET["txtCuenta"];
        else{
            if( isset($_GET["userValidador"]) )
                $infoUser= $_GET["userValidador"];
        }
        //<textarea name="areaChat" rows="50" cols="100"></textarea>
    ?>
    <form enctype="multipart/form-data" name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
        <table>
            <tr>
                <td><iframe src="contenido_charla.php"></iframe></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="txtMensaje" id="txtMensaje" size="38" focus>
                    <button type="submit" name="butEnviar">ENVIAR</button>
                
                    <?php
                        if( isset($_GET["butEnviar"]) && empty($_GET["txtMensaje"]) )
                            echo "<span style='color:red'><strong>No has introducido ningún mensaje</strong></span>";
                    ?>
                </td>
            </tr>
        </table>

        <label for="txtCuenta">Cuenta: </label>
        <input type="text" name="txtCuenta" id="txtCuenta" value="<?php echo $infoUser; ?>" readonly style="border: none">

    </form>

    <?php
        if( isset($_GET["butEnviar"]) && !empty($_GET["txtMensaje"]) ){
            
            $f= fopen("./charla.txt", "a");

            if(!$f)
                echo "No se puede abrir el fichero.";
            else{
                    $mensaje= "<strong>".$infoUser."</strong> dice: ".$_GET["txtMensaje"]."\n";
                    fwrite($f, $mensaje); 
                }
        }

    ?>
</body>
</html>