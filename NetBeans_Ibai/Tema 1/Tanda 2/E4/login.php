<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            if(isset($_GET['nombre'])){
                $nombre=$_GET['nombre'];
                echo "CONTRASEÑA ERRÓNEA PARA <strong>".$nombre."</strong><br>";
                echo "Inténtalo de nuevo";
            }
        ?>
        <form name="form" action="validacion.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="nombre">Nombre de usuario:</label></td>
                    <td><input type="text" name="nombre" id="nombre"></td>
                    <td rowspan="2"><input type="submit" name="enviar"></td>
                </tr>
                <tr>
                    <td><label for="pass">Contraseña:</label></td>
                    <td><input type="text" name="pass" id="pass"></td>
                </tr>
        </form>
    </body>
</html>
