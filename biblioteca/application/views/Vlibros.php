<table>
    <tr>
        <th></th>
        <th>TITULO</th>
        <th>AUTOR</th>
    </tr>
    <?php
        if($genero!== false)
            echo "<h1>Genero ".$genero."</h1>";
        else
            echo "<h1>Todos los libros disponibles</h1>";

        foreach ($libros as $libro) {
            echo "<tr>";
                echo "<td><input type='checkbox' name='book[]' value='".$libro["titulo"]."'></td>";
                echo "<td>".$libro["titulo"]."</td>";
                echo "<td>".$libro["autor"]."</td>";
            echo "</tr>";
        }
        echo "<tr><td colspan='3'>";
        echo form_submit("butPrestar", "Prestar libro");
        echo "</td></tr>";
        
        
        //<button type='submit' name='butPrestar'>Prestar libros</button>
        
    ?>

</table>