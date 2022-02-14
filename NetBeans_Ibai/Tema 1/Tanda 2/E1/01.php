<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form name="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <table>
                <tr>
                    <td><label for="texto">Texto a cifrar</label></td>
                    <td><input type="text" id="texto" name="texto" value="<?php 
                                    if (isset($_POST['texto'])) {
                                        echo $_POST['texto'];
                                    }   
                                ?>"></input></td>
                    <?php
                        if (isset($_POST['sustitucion']) || isset($_POST['cesar'])) {
                            $texto=$_POST['texto'];
                            if (empty($texto)) {
                                echo "<td>*Debes introducir un texto</td>";
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <td><label>Desplazamineto</label></td>
                    <td>
                        <?php
                            $numeros=array(3,5,10);
                            for ($i = 0; $i < count($numeros); $i++) {
                                if (isset($_POST[$numeros[$i]])) {
                                    echo '<input type="radio" id='.$numeros[$i].' name="desplazamientos" value='.$numeros[$i].' checked="checked">';
                                } else{
                                    echo '<input type="radio" id='.$numeros[$i].' name="desplazamientos" value='.$numeros[$i].'>';
                                }             
                                echo "<label for=".$numeros[$i].">".$numeros[$i]."</label><br>";
                            }
                        ?>
                    </td>
                    <td><input type="submit" value="CIFRADOR CESAR" name="cesar"></td>
                        <?php
                            if(isset($_POST['cesar']) && !isset($_POST['desplazamientos'])){
                                echo "<td>*Debes indicar un desplazamiento</td>";
                            }
                        ?>
                </tr>
                <tr>
                    <td><label>Fichero de clave</label></td>
                    <td>
                        <select name="ficheros">
                            <?php
                                $gestor = opendir("ficheros");
                                while (($archivo = readdir($gestor)) !== false)  {
                                    if ($archivo != "." && $archivo != "..") {
                                        echo "<option value='$archivo'>$archivo</option>";
                                    }
                                }
                            ?>
                        </select>
                    </td>
                    <td><input type="submit" value="CIFRADO POR SUSTITUCION" name="sustitucion"></td>
                </tr>
            </table>
            <?php
                if (isset($_POST['cesar']) && isset($_POST['desplazamientos']) && !empty($_POST['texto'])) {
                   $texto=strtoupper($_POST['texto']);
                   $resultado="";
                   for ($i = 0; $i < strlen($texto); $i++) {
                       $letra=ord($texto[$i]);
                       $letra+=$_POST['desplazamientos'];
                       if($letra>90){
                           $letra+=64-90;
                       }
                       $resultado.=chr($letra);
                   }
                   echo "<h1>Texto cifrado: ".$resultado."</h1>";
                } elseif (isset($_POST['sustitucion']) && isset($_POST['texto'])) {
                    $archivo = fopen('ficheros/fichero_clave1.txt','r');
                    $linea = fgets($archivo);
                    $texto=strtoupper($_POST['texto']);
                    $resultado="";
                    for ($i = 0; $i < strlen($texto); $i++) {
                        $letra=ord($texto[$i]);
                        $letra-=65;
                        $resultado.=substr($linea,$letra,1);
                    }
                    echo "<h1>Texto cifrado: ".$resultado."</h1>";
                }
            ?>
        </form>
        
    </body>
</html>
