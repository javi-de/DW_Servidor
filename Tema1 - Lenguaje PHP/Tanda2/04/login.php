<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <?php
        $infoUser= "";

        //if(isset($_GET["butEntrar"]) && !empty($_GET["txtUser"]))
        //   $infoUser= $_GET["txtUser"];
        //cambia a validador.php y vuelve a esta página, por lo que el código comentado arriba no sirve

        if( isset($_GET["userValidador"]) )
            $infoUser = $_GET["userValidador"];

        //echo "infoUser: ".$infoUser;
    ?>

    <form enctype="multipart/form-data" name="input" action="validacion.php" method="get">
        <table>
            <tr>
                <td><label for="txtUser">Nombre de usuario: </label></td>
                <td><input type="text" name="txtUser" id="txtUser" value="<?php echo $infoUser; ?>" required></td>
            </tr>
            <tr>
                <td><label for="txtPass">Contraseña: </label></td>
                <td><input type="password" name="txtPass" id="txtPass" required></td>
                
                <td>
                    <button type="submit" name="butEntrar">ENTRAR</button>
                </td>
            </tr>
            
            <?php
                if( isset($_GET["falloValidador"]) && $_GET["falloValidador"]== "true" ){
                    echo "<tr><td colspan='3'>CONTRASEÑA ERRÓNEA PARA <strong>$infoUser</strong></td></tr>
                          <tr><td colspan='3'>Inténtalo de nuevo</td></tr>";
                }
            ?>

        </table>
    </form>
</body>
</html>