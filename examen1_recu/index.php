<?php
    require_once "funcionesBD.php";

    //CONEXION A LA BD
    $conn= conectarBD();
    if($conn->connect_errno > 0) 
        die("Imposible conectarse con la base de datos [" . $conn->connect_error . "]");

    $catsql = "SELECT distinct(categoria) FROM temas ORDER BY categoria ASC;";
    $catresult = mysqli_query($conn,$catsql);

    $categoria;
    $idCat;
    $porcen;


    //MENU DE CATEGORIAS
    echo "<h1>Elija categoria de cursos</h1>";

    echo "<form action=".$_SERVER['PHP_SELF']." method='post'>";
        echo "<ul>";
        
        //radio de cada categoria
        while($catrow = mysqli_fetch_assoc($catresult)){
            echo "<input type='radio' id='radio".$catrow["categoria"]."' name='radioCursos' value='".$catrow["categoria"]."'>";
            echo "<label for='radio".$catrow["categoria"]."'>".$catrow["categoria"]."</label><br>";
        }

        //radio de TODAS LAS CATEGORIAS
        echo "<input type='radio' id='radioTodas' name='radioCursos' value='todas' checked>";
        echo "<label for='radioTodas'>TODAS LAS CATEGORIAS<label><br>";

        echo "</ul>";
    
        echo "<button type='submit' name='butVer'>Ver cursos</button>";
    echo "</form>";





    //CREACION TABLA
    if( isset($_POST["butVer"])){
        $categoria= $_POST["radioCursos"];

        echo "<form action=".$_SERVER['PHP_SELF']." method='post'>";
        echo "<table>";
            if($categoria== "todas")
                echo "<h2>Imparticiones de todos los cursos</h2>";
            else
                echo "<h2>Imparticiones de cursos de categoría ".$categoria."</h2>";
            
            echo "<tr>
                    <th>SELECCIONAR</th>
                    <th>TEMA</th>
                    <th>CANTIDAD DE CURSOS</th>
                </tr>";

                $temas= dameTemas($conn, $categoria);

                for ($i=0; $i < count($temas); $i++) { 
                    $idTema= $temas[$i]["IDTEMA"];
                    $numCursos= dameNumCursosDe($conn, $idTema);
                    $nombreTema= $temas[$i]["TEMA"];

                    echo "<tr>";
                        echo"<td><input type='checkbox' name='checkTema[]' value='$idTema'></td>";
                        echo "<td>".$nombreTema."</td>";
                        echo "<td>".$numCursos["count(*)"]." cursos</td>";
                    echo"</tr>";
                }
                echo "<tr><td></td><td>";
                    echo "<button type='submit' name='butBajar'>BAJAR PRECIO</button>";
                    echo "<select name='selectPorcen'>";
                            for($i= 5; $i<= 50; $i+=5) { 
                                echo "<option value='$i'>$i%</option>";
                            }
                    echo "</select>";
                    echo "<button type='submit' name='butSubir'>SUBIR PRECIO</button>";
                echo "</td></tr>";
        echo "</table>";
        echo "</form>";
    }


    //SUBIR PRECIO
    if(isset($_POST["butSubir"])){
        $porcen= 1 + $_POST["selectPorcen"]/100;
        //echo $porcen;
        $arrCheckIds= $_POST["checkTema"];
        $contPreciosCambiados=cambiarPrecios($conn, $porcen, $arrCheckIds);
        echo "<p>Se ha cambiado el precio a ".$contPreciosCambiados." cursos.</p>";
    }

    //BAJAR PRECIO
    if(isset($_POST["butBajar"])){
        $porcen= 1 - $_POST["selectPorcen"]/100;
        //echo $porcen;
        $arrCheckIds= $_POST["checkTema"];
        $contPreciosCambiados= cambiarPrecios($conn, $porcen, $arrCheckIds);
        echo "<p>Se ha cambiado el precio a ".$contPreciosCambiados." cursos.</p>";
    }

    

?>