<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>entrada.php</title>
</head>
<body>
    <?php
        session_unset();
    ?>
    <form name="input" action="autentificacion.php" method="post">
        <table>
            <tr>
                <td colspan="2">
                    <?php
                        if(isset($_GET["conecFallida"])){
                            echo "<span style='color: red'>Usuario o contraseña erróneas, intentalo de nuevo</span>";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><p>Si eres SOCIO, introduce tu usuario y password</p><td>
            </tr>
            <tr>
                <td><label for="txtUsuario">USUARIO: </label></td>
                <td><input type="text" name="txtUsuario" id="txtUsuario"></td>
            </tr>
            <tr>
                <td><label for="txtPass">PASSWORD: </label></td>
                <td><input type="password" name="txtPass" id="txtPass"></td>
            <tr>
                <td colspan="2"><button type="submit" name="butSocio">Acceso Socios</button><td>
            </tr>
            <tr>
                <td colspan="2"><p>Si no dispones de usuario, entra como invitado</p><td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="butInvitado">Acceso Invitados</button><td>
            </tr>
        </table>       
    </form>
</body>
</html>