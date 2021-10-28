<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carro.php</title>
</head>
<style>
    table{
        text-align: center;
        border: 1px solid black;
    }
    
    #pedido td{
        border: 1px solid black;
    }
</style>
<body>
    <?php
        session_start();
        //array de productos y precios
        $arrProductos= ["Producto1" => 10,
                        "Producto2" => 12,
                        "Producto3" => 4.9,
                        "Producto4" => 2.5,
                        "Producto5" => 10
                       ];
        
        //array-session de productos y cantidades
        if(!isset($_SESSION["cantidadProd"])){
            $_SESSION["cantidadProd"]= ["Producto1" => 0,
                                        "Producto2" => 0,
                                        "Producto3" => 0,
                                        "Producto4" => 0,
                                        "Producto5" => 0
                                       ];
        }
    ?>
    
     <?php
    /*******************************EFECTO BOTON AÑADIR*******************************************/
        if(isset($_POST["butAniadir"])){
            foreach ($arrProductos as $nombreProd => $precioProd) {
                $checkProd= "check_".$nombreProd;
                if(isset($_POST[$checkProd])){
                    $selectProd= "select_".$nombreProd;
                    $cantidadAniadir= intval($_POST[$selectProd]);
                    
                    if($cantidadAniadir== 0)
                        echo "<span style='color: red'>ERROR. Se ha intentado añadir 0 cantidades de uno de los productos seleccionados</span>";
                    else
                        $_SESSION["cantidadProd"][$nombreProd]+= $cantidadAniadir;
                }
                
            }
        }
        
    /*********************************EFECTO BOTON COMPRAR*****************************************/        
        if(isset($_POST["butComprar"])){
            //creacion de una tabla con los productos 'comprados'
            echo "<h2>Tu pedido: </h2>";
            echo "<table id='pedido'>";
            
            $totalFinal= 0;
            foreach ($arrProductos as $nombreProd => $precioProd) {
                $cantidad= $_SESSION["cantidadProd"][$nombreProd];
                $totalProd= 0;
                if($cantidad!= 0){
                    //fila por producto: nombre | cantidad | precio | subtotal
                    $totalProd= $cantidad*$precioProd;
                    echo "<tr>";
                        echo "<td>$nombreProd: </td>";
                        echo "<td>$cantidad uds</td>";
                        echo "<td>$precioProd $/ud</td>";
                        echo "<td>subtotal: $totalProd $</td>";
                    echo "</tr>";      
                }
                
                $totalFinal+= $totalProd;
            }
            //fila para el total de la compra completa: __ | __ | __ | TOTAL
            echo "<tr>"
                    //. "<td></td>"
                    //. "<td></td>"
                    . "<td colspan='3'></td>"
                    . "<td><strong>TOTAL: </strong>$totalFinal $</td>"
               . "</tr>";
            echo "</table>";
            echo "<br>";
            
            $_SESSION["cantidadProd"]= ["Producto1" => 0,
                                        "Producto2" => 0,
                                        "Producto3" => 0,
                                        "Producto4" => 0,
                                        "Producto5" => 0
                                       ];
        }

    /*******************************EFECTO BOTON VACIAR*******************************************/    
        if(isset($_POST["butVaciar"])){
            $_SESSION["cantidadProd"]= ["Producto1" => 0,
                                        "Producto2" => 0,
                                        "Producto3" => 0,
                                        "Producto4" => 0,
                                        "Producto5" => 0
                                       ];
        }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <table>
            <tr>
                <th>PRODUCTO</th>
                <th>PRECIO</th>
                <th>CANTIDAD</th>
                <th>PEDIDO ACTUAL</th>
            </tr>
            <?php

                foreach ($arrProductos as $nombreProd => $precioProd) {
                    //crea linea a linea
                    echo "<tr>";
                    
                    //COLUMNA 1
                    echo "<td>";
                    echo"<label><input type='checkbox' name='check_$nombreProd' value='$nombreProd'>$nombreProd</label>";
                    echo "</td>";
                    
                    //COLUMNA 2
                    echo "<td>";
                    echo $precioProd." $";
                    echo "</td>";
                    
                    //COLUMNA 3
                    echo "<td>";
                    echo "<select name='select_$nombreProd'>";
                        for($cont=0; $cont<= 10; $cont++){
                            echo "<option value=$cont>$cont</option>";
                        }
                    echo "</select>";
                    echo "</td>";
                    
                    
                    //COLUMNA 4
                    echo "<td>";
                    echo $_SESSION["cantidadProd"][$nombreProd]." uds pedidas";
                    echo "</td>";
                    
                    echo "</tr>";
                }
            ?>  
            <tr>
                <td><button type="submit" name="butAniadir">AÑADIR UNIDADES</button></td>
                <td><button type="submit" name="butComprar">FORMALIZAR COMPRA</button></td>
                <td><button type="submit" name="butVaciar">VACIAR CARRO</button></td>
            </tr>
        </table>
        
    </form>
   
</body>
</html>