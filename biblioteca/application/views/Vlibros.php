<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    echo form_open("/chome/genero/");
?>
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
                    echo "<td>";
                        echo form_checkbox("checkLibro[]", $libro["titulo"], FALSE);
                    echo "</td>";
                    echo "<td>".$libro["titulo"]."</td>";
                    echo "<td>".$libro["autor"]."</td>";
                echo "</tr>";
            }
            echo "<tr><td colspan='3'>";
            echo form_submit("butPrestar", "Prestar libros");//<input type='submit' name='butPrestar' value='Prestar libros'>
            echo "</td></tr>";
            
            
            
        ?>

    </table>
<?php
    echo form_close();
?>
