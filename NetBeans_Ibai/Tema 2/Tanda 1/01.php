<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            session_start();
            $error="";
            if(isset($_GET['borrar'])){
                session_unset();
            }
            if (!isset($_SESSION['nombres'])){
                $_SESSION['nombres']=array();
                $respuesta="Todavía no se han introducido nombres";
            }
            if (isset($_POST['nombre'])){
                if(ctype_alpha(str_replace(' ', '', $_POST['nombre']))){
                    array_push($_SESSION['nombres'],$_POST['nombre']);
                } else {
                    $error="No has escrito el nombre únicamente con letras y espacios";
                }
            }
            if(!empty($_SESSION['nombres'])){
                $respuesta="Datos introducidos:<br>"; 
                foreach ($_SESSION['nombres'] as $value) {
                    $respuesta.="<ul><li>$value</li></ul>";
                }
            }
        ?>
        <p style="color: red"><?php echo $error?></p>
        <form action="01.php" method="POST" enctype="multipart/form-data">
            <table style="background-color: skyblue; border: solid 1px blue">
                <tbody>
                    <tr>
                        <td><label for="nombre">Escriba algún nombre:</label></td>
                        <td><input type="text" name="nombre" id="nombre"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="float: right">
                            <input type="submit" value="Añadir">
                            <input type="reset" value="Borrar">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <?php echo $respuesta; ?>
        <br>
        <a href="?borrar=si">Cerrar sesión (se perderán los datos almacenados)</a>
    </body>
</html>
