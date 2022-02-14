<?php
    require_once 'cabecera.php';
    
    $strError= "";

    if(isset($_POST["butRegistro"])){
        $usuario= $_POST["usuario"];
        $nombreUsu= $_POST["nombre"];
        $password= $_POST["password"];
        $confirmPassword= $_POST["confirmPassword"];
        $email= $_POST["email"];
        
        if( $usuario== "" || $nombreUsu== "" || $password== "" || $confirmPassword== "" || $email== ""){
            $strError= "Hay que rellenar todos los campos";
        }else{
            $usuario= $_POST["usuario"];
            
            if(existeUsuario($con, $usuario)){
                $strError= "El usuario ".$usuario." ya existe";
            }else{
                guardarUsuarioBD($con, $usuario, $nombreUsu, $password, $email);
                //enviarEmail($con, $usuario);
                header("Location: login.php?strUsuCreado='Usuario creado'");
                
            }

            

        }
    }
?>
<br><br><br><br><br>

<h1>REGISTRO</h1>
<p>Para registrarte en <?php echo NOMBRE_FORO ?>, rellena el siguiente formulario</p>

<p style="color:red;"><?php echo $strError ?></p>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td><label for="usuario">Usuario</label></td>
            <td><input type="text" name="usuario" id="usuario"></td>
        </tr>
        <tr>
            <td><label for="nombre">Nombre completo</label></td>
            <td><input type="text" name="nombre" id="nombre"></td>
        </tr>
        <tr>
            <td><label for="password">Password</label></td>
            <td><input type="password" name="password" id="password"></td>
        </tr>
        <tr>
            <td><label for="confirmPassword">Confirmar password</label></td>
            <td><input type="password" name="confirmPassword" id="confirmPassword" onblur="verificarPassword()"></td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td><input type="email" name="email" id="email"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="butRegistro" id="butRegistro">Registrarse</button></td>
        </tr>
    </table>
</form>

<?php    
    require_once 'pie.php';
?>

<script>  
    function verificarPassword(){
        let elePass= document.getElementById("password");
        let eleConfirmPass= document.getElementById("confirmPassword");
        let eleBoton= document.getElementById("butRegistro");
        
        let pass= elePass.value;
        let confirmPass= eleConfirmPass.value;
        
        if(pass== confirmPass){
            elePass.style.backgroundColor= "green";
            eleConfirmPass.style.backgroundColor= "green";
            eleBoton.disabled= false;
        }else{
            elePass.style.backgroundColor= "red";
            eleConfirmPass.style.backgroundColor= "red";
            eleBoton.disabled= true;
            alert("La contraseña no coincide");
        }
    }
</script>