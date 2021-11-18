<?php
    require_once "cabecera.php";
    
?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <table>
        <tr>
            <td>Usuario: </td>
            <td><input type="text"></td>
        </tr>
        <tr>
            <td>Nombre completo: </td>
            <td><input type="text"></td>
        </tr>
        <tr>
            <td>Password: </td>
            <td><input type="password"></td>
        </tr>
        <tr>
            <td>Confirmar password: </td>
            <td><input type="password"></td>
        </tr>
        <tr>
            <td>E-mail: </td>
            <td><input type="email"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="butRegistrarse">Registrarse</button></td>
        </tr>
    </table>
</form>

<?php
    require_once "pie.php";
    
?>