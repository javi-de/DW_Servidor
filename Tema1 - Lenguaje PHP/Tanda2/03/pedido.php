<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCSS.css">
    <title>Ejercicio3</title>
</head>
<body>
    <?php
        /* Contenido inicial de articulos.txt
Tornillo TY200;0.15
Arandela;0.03
Bisagra HG209;1.34
Llave Allen;0.6
         */
        $parametrosCorrectos= true;

        if(isset($_POST["butAniadir"])){
            if( empty($_POST["txtNombre"]) || empty($_POST["txtPrecio"]) || !is_numeric($_POST["txtPrecio"]))
                $parametrosCorrectos= false;
            else{    
                $cadenaParaArticulos= "\n".$_POST["txtNombre"].";".$_POST["txtPrecio"];

                $f= fopen("articulos.txt", "a");

                fwrite($f, $cadenaParaArticulos);

                fclose($f);
            }
        }

        
        function cargarArticulos(){            
            $f= fopen("articulos.txt", "r");

            while(!feof($f)){
                $linea= fgets($f);
                $explodeArtPre= explode(";", $linea);

                $arrArtPre[$explodeArtPre[0]]= $explodeArtPre[1];
            }

            fclose($f);
            
            return $arrArtPre;
        }
        
        $arrArtPre= cargarArticulos();
        /*
        foreach ($arrArtPre as $key => $value) {
            echo $key." ".$value."<br>";
        }        
        */
    ?>
    
    <!-- PRIMER FORM -->
    <form enctype="multipart/form-data" name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <caption>ELIGE TU PEDIDO</caption>
                <?php
                    $total= 0;
                    if(isset($_GET["nuevoTotal"]))
                        $total= $_GET["nuevoTotal"];
                    
                    foreach ($arrArtPre as $articulo => $precio) {
                        $nuevoTotal=floatval($total)+floatval($precio);
                        echo "<tr>
                                <td>
                                    ".$articulo."
                                </td>
                                <td>
                                    ".$precio."                                    
                                </td>
                                <td>
                                    <a href='?nuevoTotal=${nuevoTotal}'>Añadir unidad</a>
                                </td>
                             </tr>";
                    }
                ?>
            <tr>
                <td colspan='3' class="total">
                    TOTAL= <?php echo $total; ?> €
                </td>
            </tr>
        </table>
    </form>
    
    
    <br><br><br><br>

    <!-- SEGUNDO FORM -->
    <form name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <caption>AÑADE ARTÍCULO</caption>
            <tr>
                <td>
                    <label for="txtNombre">Nombre: </label>
                </td>
                    
                <td>
                    <label for="txtPrecio">Precio: </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="txtNombre" id="txtNombre">
                </td>
                <td>
                    <input type="text" name="txtPrecio" id="txtPrecio">
                </td>
                <td>
                    <button type="submit" name="butAniadir">AÑADIR</button>
                </td>
            </tr>
            <?php
                 if(!$parametrosCorrectos)
                    echo "<tr><td colspan='2' style='color:red'>HAY QUE ESCRIBIR CORRECTAMENTE LOS DOS CAMPOS</td></tr>";
                 else                   
                    echo "<tr><td colspan='2' style='color:green'>ARTICULO AÑADIDO</td></tr>";
            ?>
        </table>
    </form>
</body>
</html>

