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
        <?php
            session_start();
            //(input)texto[], (select)cantidad[], (option)value=0-10,(checkbox)grabar[]
            //Comprobaciones:
            $text=array("","","","","","","","");
            $cantidad=array("","","","","","","","");
            $cant=0;
            $mensaje="";
            if(isset($_POST['texto'])){
                $cajasDeTexto=$_POST['texto'];
                $i=0;
                $parar=false;
                foreach ($cajasDeTexto as $key => $value) {
                    $text[$i]=$value;
                    if(isset($_POST['cantidad'])){
                        $cantidad[$i]=$_POST['cantidad'][$i];
                        if(empty($text[$i])&& $cantidad[$i]!=1){
                            $n=$i+1;
                            $mensaje.="La cantidad $n esta selecionada y no tiene pregunta<br>";
                        }
                    }
                    if(!empty($value) && !$parar){
                        $cant++;
                    } else if(!empty($value) && $parar){
                        $cant=0;
                    } else {
                        $parar=true;
                    }
                    
                    $i++;
                }
            }
            //Tabla:
            $tabla="";
            for ($x = 1; $x <= 8; $x++) {
                $tabla.="<tr><td>$x</td>"
                        . "<td><input type='text' name='texto[]' value=".$text[$x-1]."></input></td>"
                        . "<td><select name='cantidad[]'>";
                for ($i = 1; $i <= 10; $i++) {
                    if($cantidad[$x-1]==$i)
                        $tabla.="<option value=$i selected>$i</option>";
                    else 
                        $tabla.="<option value=$i>$i</option>";
                }
                $a=$x-1;
                $check="";
                $graTxt="grabar$x";
                if(isset($_POST[$graTxt])){
                    if(empty($text[$x-1])){
                        $mensaje.="El check numero $x esta seleccionado y no tiene pregunta<br>";
                    }
                    $check="checked";
                }
                $tabla.="</select></td>"
                        . "<td><input type='checkbox' name='grabar$x' id='grabar$a' $check>"
                        . "<label for='grabar$a'>Grabar fallos</label></td></tr>";
            }
            //Sesion:
            if(isset($_POST['texto']) && isset($_POST['cantidad'])){
                $_SESSION['tipo']=$_POST['texto'];
                $i=0;
                foreach ($_SESSION['tipo'] as $key => $value) {
                    $_SESSION['cantidad'][$value]=$_POST['cantidad'][$i];
                    $i++;
                }
            }
            //Grabar:
            $grabaciones=array();
            for ($i=0; $i<8; $i++){
                $nombre="grabar".($i+1);
                if(isset($_POST[$nombre])){
                    array_push($grabaciones, $_POST['texto'][$i]);
                }
            }
            $_SESSION['grabacion']=$grabaciones;
            //Mensaje:
            if(isset($_POST['enviar'])){
                if($cant<3)
                    $mensaje.="Debe haber al menos 3 tipos distintos";
                if($mensaje=="")
                    header("Location: jugar.php");
            }
        ?>
        <h3 style="color: red"><?php echo $mensaje ?></h3>
        <h3>Configura un mínimo de 3 tipos de preguntas</h3>
        <form action="01.php" method="POST" enctype="multipart/form-data">
            <table border="0">
                <thead>
                    <tr>
                        <th></th>
                        <th>TIPO DE PREGUNTA</th>
                        <th>CANTIDAD</th>
                        <th>GRABAR FALLOS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $tabla ?>
                    <tr>
                        <td colspan="4"><input style="background-color: dodgerblue; width: 100%; color: white" type="submit" name="enviar" value="ENVIAR TIPOS"/></td>
                    </tr>
                </tbody>
            </table>
        </form>

    </body>
</html>
