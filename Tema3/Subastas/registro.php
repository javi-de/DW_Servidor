<?php
    require_once "cabecera.php";
    
    $txtRegistro= "";

    if(isset($_POST["butRegistrarse"])){
        if(isset($_POST["txtPass"]) && $_POST["txtPass"]!= $_POST["txtPassConfirm"])
            $txtRegistro= "La contraseña no coincide.";
        else{
            $usu= $_POST["txtUsu"];
            $nombre= $_POST["txtNombre"];
            $pass= $_POST["txtPass"];
            $email= $_POST["txtEmail"];
            

            if( !empty($usu) && !empty($nombre) && !empty($pass) && !empty($email)) {
                //$txtRegistro= "conectado.";
                if(comprobarLogin($conn, $usu, $pass))
                    $txtRegistro= $usu." ya existe. Intentalo de nuevo.";
                else{
                    if(!registrarUsuario($conn, $usu, $nombre, $pass, $email) )
                        $txtRegistro= "No se ha podido registrar. Intentalo de nuevo.";
                    else
                        $txtRegistro= "Registro completado. Necesario verificar cuenta desde el email.";
                }
            }else
                $txtRegistro= "Es necesario rellenar todos los campos.";
        }
    }

?>
<h1>Registro</h1>
<p><?php echo $txtRegistro ?></p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <table>
        <tr>
            <td>Usuario: </td>
            <td><input type="text" name="txtUsu"></td>
        </tr>
        <tr>
            <td>Nombre completo: </td>
            <td><input type="text" name="txtNombre"></td>
        </tr>
        <tr>
            <td>Password: </td>
            <td><input type="password" name="txtPass"></td>
        </tr>
        <tr>
            <td>Confirmar password: </td>
            <td><input type="password" name="txtPassConfirm"></td>
        </tr>
        <tr>
            <td>E-mail: </td>
            <td><input type="email" name="txtEmail"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="butRegistrarse">Registrarse</button></td>
        </tr>
    </table>
</form>
<p>Volver a <a href="login.php">Login</a></p>

<?php
    require_once "pie.php";
    
?>