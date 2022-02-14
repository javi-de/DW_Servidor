<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="10">
        <title></title>
    </head>
    <body>
        <script type="text/javascript">
            window.onload=function(){
                window.scrollTo(0,docuement.body.scrollHeight);
            }
        </script>
        <?php
            $user=$_GET['nombre'];
            if(isset($_POST['texto'])){
                $texto=$_POST['texto'];
                $gestor=fopen("charla.txt", "a+");
                $texto=str_replace(":)","😊",$texto);
                $texto=str_replace(":(","☹",$texto);
                $palabras=fopen("ofensivas.txt", "r");
                while($linea=fgets($palabras)){
                    $linea= trim($linea);
                    $texto=str_replace($linea,"#$%$#",$texto);
                }
                fclose($palabras);
                fwrite($gestor, $user."; ".$texto.PHP_EOL);
                fclose($gestor);
            }
        ?>
        <iframe src="contenido_charla.php"></iframe>
        <form action="charla.php?nombre=<?php echo $user?>" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Usuario:</td>
                    <td><strong><?php echo $user?></strong></td>
                </tr>
                <tr>
                    <td><label for="texto">Mensaje:</label><br><input type="submit"></td>
                    <td><input name="texto"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
