<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            session_start();
            $prodPrecios=array("Prod1" => 10, "Prod2" => 20, "Prod3" => 10, "Prod4" => 30);
            if(!isset($_SESSION['productos']) || isset($_POST['reset'])){
                $_SESSION['productos']=array();
                foreach ($prodPrecios as $key => $value) {
                    $_SESSION['productos'][$key]=0;
                }
            }
            $compra="";
            $error="";
            if(isset($_POST['add'])){
                if(isset($_POST['productos'])){
                    $productos=$_POST['productos'];
                    foreach ($productos as $value) {
                        $seleccionado= substr($value, -1);
                        if(isset($_POST['select'])){
                            if($_POST['select'][$seleccionado-1]==0){
                                $error.="El ".$value." esta selecionado con cantidad 0<br>";
                            } else {
                                $_SESSION['productos'][$value]=$_SESSION['productos'][$value]+$_POST['select'][$seleccionado-1];
                            }
                        }
                    }
                    foreach ($prodPrecios as $key => $value) {
                        $n= substr($key, -1);
                        if($_POST['select'][$n-1]!=0 && !(isset($_POST['productos'][$n-1]))){
                            $error.=$key." no esta selecionado y tienen ".$_POST['select'][$n-1]." productos<br>";
                        }
                    }
                } else {
                    $error.="Ningun checkbox selecionado<br>";
                    foreach ($prodPrecios as $key => $value) {
                        $n= substr($key, -1);
                        if($_POST['select'][$n-1]!=0 && !(isset($_POST['productos'][$n-1]))){
                            $error.=$key." no esta selecionado y tienen ".$_POST['select'][$n-1]." productos<br>";
                        }
                    }
                }
                
            } elseif(isset($_POST['fin'])){
                $productos=$_SESSION['productos'];
                $compra="<h1>Tu pedido</h1><ul>";
                $total=0;
                foreach ($prodPrecios as $key => $value) {
                    if($_SESSION['productos'][$key]!=0){
                        $compra.="<li>".$key.",".$_SESSION['productos'][$key]
                                . " unidades a ".$prodPrecios[$key]."€</li>";
                        $total+=$prodPrecios[$key]*$_SESSION['productos'][$key];
                    }
                }
                $compra.="</ul>"
                        . "Total: ".$total." EUROS<br><br>";
                foreach ($prodPrecios as $key => $value) {
                    $_SESSION['productos'][$key]=0;
                }
            }
            $formulario="";
            foreach ($prodPrecios as $key => $value) {
                $formulario.="<tr>";
                $formulario.="<td><input type='checkbox' id=$key value=$key name='productos[]'></td>";
                $formulario.="<td><label for=$key>$key</label></td>";
                $formulario.="<td>$value €</td>";
                $formulario.="<td><select name='select[]'>";
                for ($i = 0; $i <= 10; $i++) {
                        $formulario.="<option value=$i>$i</option>";
                }
                $formulario.="</select></td>";
                $formulario.="<td>".$_SESSION['productos'][$key]." uds pedidas</td>";
                $formulario.="</tr>";
            }
            
            
            echo $compra;
        ?>
        <p style="color:red"><?php echo $error ?></p>
        <form action="carro.php" method="POST" enctype="multipart/form-data">
            <table border="0">
                <thead>
                    <tr>
                        <th></th>
                        <th>PRODUCTO</th>
                        <th>PRECIO</th>
                        <th>ELIJA CANTIDAD</th>
                        <th>PEDIDO ACTUAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $formulario ?>
                </tbody>
                <tfoot>
                    <td colspan="5">
                        <input type="submit" name="add" value="AÑADIR UNIDADES">
                        <input type="submit" name="fin" value="FORMALIZAR COMPRA">
                        <input type="submit" name="reset" value="VACIAR CARRO"> 
                    </td>
                </tfoot>
            </table>
        </form>
    </body>
</html>
