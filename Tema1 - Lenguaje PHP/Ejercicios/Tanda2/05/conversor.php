<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio_Conversor</title>
</head>
<body>
    <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <table>
            <tr>
                <td>
                    <label for="txtCantidad">Cantidad: </label>
                    <input type="text" name="txtCantidad" id="txtCantidad">
                </td>
                <?php
                    $valorValido;
                    $txtCantidad= $_POST["txtCantidad"];
                
                    if(isset($_POST["butConvertir"])){
                        if(empty($txtCantidad)){
                            echo "<td>¡VACIO!</td>";
                            $valorValido= false;
                        }elseif(!is_numeric($txtCantidad)){
                            echo"<td>¡NO NUMÉRICO!</td>";
                            $valorValido= false;
                        }else
                            $valorValido= true;
                        
                    }

                ?>
                
                
            </tr>
            <tr>
                <td>
                    <input type="radio" name="radMoneda" id="eurosToDolares" value="$" checked>
                    <label for="eurosToDolares">Euros a dólares</label>

                    <input type="radio" name="radMoneda" id="dolaresToEuros" value="€">
                    <label for="dolaresToEuros">Dólares a euros</label>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="butConvertir">CONVERTIR</button>
                </td>  
            </tr>
        </table>
    </form>
    
        <?php
            if(isset($_POST["butConvertir"]) && $valorValido){
                $moneda= $_POST["radMoneda"];
                
                $f= fopen("factor_conversion.txt", "r");
 
                $factor_conversion= fscanf($f, "%s");
                
                fclose($f);
                
                if($moneda== "$"){
                    $cantidadConvertida= $txtCantidad*$factor_conversion[0];
                }else{
                    $cantidadConvertida= round($txtCantidad/$factor_conversion[0], 2);
                }
                echo "<tr>
                        <td>
                            ".$cantidadConvertida." ".$moneda."
                        </td>
                    </tr>";   
            }
            
        ?>
</body>
</html>
