<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $error="";
            if (isset($_GET['error'])) {
                $error="Combinación errónea de usuario-password";
            }
            $usuario="";
            if (isset($_COOKIE['usuario'])){
                $usuario=$_COOKIE['usuario'];
            }
        ?>
        <p style="color: red"><?php echo $error ?></p>
        <p>Si eres SOCIO, introduce tu usuario y tu password</p>
        <form action="autenticacion.php" method="POST" enctype="multipart/form-data">
            <label for="usuario">USUARIO:</label>
            <input type="text" name="usuario" id="usuario" value="<?php echo $usuario ?>"/>
            <br><br>
            <label for="password">PASSWORD:</label>
            <input type="password" name="password" id="password"/>
            <br><br>
            <input type="submit" value="Acceso Socio" name="socio"/>
            <hr>
            <p>Si no dispones de usuario, entra como invitado</p>
            <input type="submit" value="Acceso Invitado" name="invitado"/>
        </form> 
    </body>
</html>
