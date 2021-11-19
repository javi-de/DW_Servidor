<?php
    require_once "cabecera.php";

    $txtLogin="";

    if(isset($_POST["butLogin"]) ){
        $usu= $_POST["txtUsu"];
        $pass= $_POST["txtPass"];
        
        if( !comprobarLogin($conn, $usu, $pass) ){
            $txtLogin= "Login incorrecto. Intentalo de nuevo.";
        }else{
            $fila= comprobarLogin($conn, $usu, $pass);
            if($fila["activo"]== 0)
                $txtLogin= "Esta cuenta no está verificada.";
            else{
                $txtLogin= "usuario conectado";
                $_SESSION["nombreUsu"]= $usu;
                $_SESSION["idUsu"]= $fila["id"];

                if(isset($_SESSION['ultimaPag'])){
                    header("Location: ".$_SESSION['ultimaPag']);
                } else {
                    header("Location: index.php");
                }
            }
        }
    }

?>
<h1>Login</h1>
<p><?php echo $txtLogin ?></p>
<form action="" method="post">
    <table>
        <tr>
            <td>Usuario: </td>
            <td><input type="text" name="txtUsu"></td>
        </tr>
        <tr>
            <td>Password: </td>
            <td><input type="password" name="txtPass"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="butLogin">Iniciar sesión</button></td>
        </tr>
        
    </table>
</form>
<p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>

<?php
    require_once "pie.php";
    
?>