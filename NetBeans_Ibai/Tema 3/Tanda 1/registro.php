<?php
    require_once 'cabecera.php';
    $err="";
    $cor="";
    if(isset($_POST['registrarse'])){
        if(nombre($con,$_POST['usuario'])==0 && $_POST['usuario']!="" && $_POST['nombre']!="" && $_POST['pass']==$_POST['pass2']){
            $cadena="";
            for ($index = 1; $index <= 16; $index++) {
                $cadena.=chr(rand(48,126));
            }
            if($_POST['email']!=""){
                crearUsuario($con, $_POST['usuario'], $_POST['nombre'], $_POST['pass'], $cadena, $_POST['email']);
            } else {
                crearUsuario($con, $_POST['usuario'], $_POST['nombre'], $_POST['pass'], $cadena);
            } 
            $cor="Usuario creado ".$cadena;
            header("Location: login.php");
        } else {
            $err="El usuario ya existe o no ha rellenado alguno de los campos";
        }
    }
?>
<script src="js/registro.js"></script>
<h2>REGISTRO</h2>
<p style="color: green"><?php echo $cor;?></p>
<p style="color: red"><?php echo $err;?></p>
<form action="registro.php" method="POST" enctype="multipart/form-data">
    <table border="1">
        <p>Para registarte en SUBASTAS DEWS, rellena el siguiente formulario</p>
        <tr>
            <td><label for="usuario">Usuario</td>
            <td><input type="text" id="usuario" name="usuario"></td>
        </tr>
        <tr>
            <td><label for="nombre">Nombre</td>
            <td><input type="text" id="nombre" name="nombre"></td>
        </tr>
            <tr>
            <td><label for="pass">Password</td>
            <td><input type="password" id="pass" name="pass"></td>
        </tr>
            <tr>
            <td><label for="pass2">Password (de nuevo)</td>
            <td><input type="password" id="pass2" name="pass2" onblur="comprobarPass()"></td>
        </tr>
            <tr>
            <td><label for="email">Email</td>
            <td><input type="text" id="email" name="email"></td>
        </tr>
            <tr>
            <td></td>
            <td><input type="submit" id="boton" name="registrarse" value="Registrate"></td>
        </tr>
    </table>
</form>

<?php
    require_once 'pie.php';
?>