<?php
    require_once 'cabecera.php';
    $err="";
    $cor="";
    if(isset($_POST['usuario'])){
        if(iniciarSesion($con, $_POST['usuario'], $_POST['pass'])!=null){
            $_SESSION['id']=iniciarSesion($con, $_POST['usuario'], $_POST['pass']);
            $_SESSION['usuario']=usuarioPorId($con, $_SESSION['id']);
        } else {
            $err="Usuario o contraseña incorrecta(s)";
        }
    }
    if(!isset($_SESSION['id'])){
    
?>
<script src="js/registro.js"></script>
<h2>LOGIN</h2>
<p style="color: green"><?php echo $cor;?></p>
<p style="color: red"><?php echo $err;?></p>
<form action="" method="POST" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td><label for="usuario">Usuario</label></td>
            <td><input type="text" id="usuario" name="usuario"></td>
        </tr>
        <tr>
            <td><label for="pass">Password</label></td>
            <td><input type="password" id="pass" name="pass"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="login" value="Login!"></td>
        </tr>
    </table>
</form>
<p>No tienes una cuenta? <a href="registro.php">Regístrate!</a></p>
<?php
    } else {
        if(isset($_SESSION['ultimaPag'])){
            header("Location: ".$_SESSION['ultimaPag']);
        } else {
            header("Location: index.php");
        }
        
    }
    require_once 'pie.php';
?>