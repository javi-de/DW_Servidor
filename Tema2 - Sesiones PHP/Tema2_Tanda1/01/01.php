<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.1.Ejercicio 1</title>
</head>
    
<?php
    session_start();
    $nombreErroneo= false;

    //comprobar si se ha pinchado en el enlace de cerrar sesion
    if(isset($_GET["cerrarSesion"])){
        session_unset();    
    
    }else{
        //comprobar se ha escrito algo en el input de texto y si se ha pulsado Añadir
        if( isset($_POST["txtNombre"]) && isset($_POST["butAniadir"]) ){
            $usuNuevo= $_POST["txtNombre"];
            
            //comprobar si el nombre introducido es válido (empezar por mayúscula + minusculas)
            if(nombreValido($usuNuevo) && !in_array($usuNuevo, $_SESSION["usuarios"]) ){
                $_SESSION["usuarios"][]= $usuNuevo; 
            }else   
                $nombreErroneo= true;
        }
    }
    
    if(!isset($_SESSION["usuarios"]))
        $_SESSION["usuarios"]=[];
    

    function nombreValido($nombreUsu){
        $cadenaNombre= "/^[A-Z]{1}[a-z]*$/";
        $cadenaNombreCompuesto= "/^[A-Z]{1}[a-z]*[ ]{1}[A-Z]{1}[a-z]*$/";

        if( !preg_match($cadenaNombre, $nombreUsu) && !preg_match($cadenaNombreCompuesto, $nombreUsu) ){
            return false;      
        }

        return true;
    }
?>

<body>
    <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <table>
            <tr>
                <td>
                    <label for="txtNombre">Escriba algún nombre: </label>
                    <input type="text" name="txtNombre" id="txtNombre">
                </td>
                <td>
                    <button type="submit" name="butAniadir">Añadir</button>
                    <button type="reset" name="butBorrar">Borrar</button>
                </td>
                <td>
                    <?php
                        if($nombreErroneo)
                            echo "<span style= 'color: red;'>Nombre erróneo (comprueba que no exista ya o que cada palabra empieza por mayúscula)</span>";
                    ?>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <?php
                        $contadorUsuarios= count($_SESSION["usuarios"]);

                        if($contadorUsuarios== 0)
                            echo "<p>Todavía no se ha introducido ningún usuario</p>";
                        else{
                            echo "<p>Datos introducidos: ".count($_SESSION["usuarios"])."</p>";

                            echo "<ul>";
                            for($cont=0; $cont< $contadorUsuarios; $cont++){
                                echo "<li>".$_SESSION['usuarios'][$cont]."</li>";
                            }
                            echo "</ul>";
                        }  
                    ?>
                </td>
            </tr>
        </table>
    </form>
    <p><a href="?cerrarSesion">Cerrar sesión (se perderán los datos almacenados)</a></p>
</body>
</html>