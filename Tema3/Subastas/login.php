<?php
    require_once "cabecera.php";

?>

<form action="" method="post">
    <table>
        <tr>
            <td>Usuario: </td>
            <td><input type="text"></td>
        </tr>
        <tr>
            <td>Password: </td>
            <td><input type="password"></td>
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