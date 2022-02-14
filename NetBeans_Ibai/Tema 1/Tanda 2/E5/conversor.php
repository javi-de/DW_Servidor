<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $valor="";
            $resultado="";
            $seleccionado=true;
            $cambioEAD=1.17;
            $cambioDAE=0.86;
            if(isset($_POST['cantidad'])){
                $valor=$_POST['cantidad'];
                if(empty($_POST['cantidad'])){
                    $vacio="¡VACÍO!";
                } elseif (!is_numeric($_POST['cantidad'])) {
                    $vacio="¡NO NUMERICO!";
                } else {
                    $vacio="";
                    $gestor=fopen("cambios.txt", "a+");
                    if($_POST['cambio']=="euroADolar"){
                        $resultado=$valor*$cambioEAD."€";
                        fwrite($gestor, $valor."*".$cambioEAD.": ".$resultado.PHP_EOL);
                    } else {
                        $resultado=$valor*$cambioDAE."€";
                        fwrite($gestor, $valor."*".$cambioDAE.": ".$resultado.PHP_EOL);
                    }             
                    fclose($gestor);
                }
                if($_POST['cambio']=="euroADolar"){
                    $seleccionado=true;
                } else {
                    $seleccionado=false;
                }
            }
            
        ?>
        <form action="conversor.php" method="POST" enctype="multipart/form-data">
            <table>
                <tbody>
                    <tr>
                        <td><label for="cantidad">Cantidad:</label></td>
                        <td><input type="text" name="cantidad" value="<?php echo $valor?>"></td>
                        <td><?php echo $vacio?></td>
                        <td>
                            <input type="radio" value="euroADolar" name="cambio" id="euroADolar" <?php if($seleccionado) echo "checked"?>><label for="euroADolar">Euros a dolares</label><br>
                            <input type="radio" value="dolaresAEuros" name="cambio" id="dolaresAEuros" <?php if(!$seleccionado) echo "checked"?>><label for="dolaresAEuros">Dolares a euros</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><?php echo $resultado?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="CONVERTIR"></td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
