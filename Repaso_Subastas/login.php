<?php
    require_once 'cabecera.php';

    $strError= "";
    $strLogin= "";
    $strUsuCreado="";
    
    if(isset($_GET["strUsuCreado"])){
        $strUsuCreado=$_GET["strUsuCreado"];
    }
    
    if(isset($_POST["butLogin"])){
        $usuario= $_POST["usuario"];
        $password= $_POST["password"]; 
        
        if( $usuario== "" || $password== ""){
            $strError= "Es necesario introducir Usuario y Password";
        }else{
            $usuarios= comprobarRegistro($con, $usuario, $password);
            if(count($usuarios)== 0){
                $strError= $usuario ." no existe en la base de datos o contraseña errónea";
            }else{
                if($usuarios[0]["activo"]== 0){
                    $strError= "Usuario registrado pero no activo. Es necesario verificar la cuenta";
                }else{
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['usuarioId'] = $usuarios[0]["id"];
                    
                    $strLogin= "Ta bien";
                }
            }
            
        }
    }

?>

<br><br><br><br><br>

<h1>LOGIN</h1>

<p style="color:red;"><?php echo $strError ?></p>
<p style="color:green;"><?php echo $strUsuCreado ?></p>
<p style="color:green;"><?php echo $strLogin ?></p>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td><label for="usuario">Usuario</label></td>
            <td><input type="text" name="usuario" id="usuario"></td>
        </tr>
        <tr>
            <td><label for="password">Password</label></td>
            <td><input type="password" name="password" id="password"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="butLogin" id="butLogin">Login</button></td>
        </tr>
    </table>
    <p>¿No tienes cuenta? <a href="registro.php">¡Registrate!</a></p>
</form>













<?php    
    require_once 'pie.php';
?>