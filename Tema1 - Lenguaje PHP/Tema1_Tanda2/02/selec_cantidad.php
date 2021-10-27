<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2_a</title>
</head>
<body>
    <?php
        define('DIR_IMG', './DIRIMG/');
        
        function cuantasImag(){
            $countImgs=0;
            
            if(file_exists(DIR_IMG)){
                $arrFiles= scandir(DIR_IMG);
                foreach($arrFiles as $file){
                    if(is_img(DIR_IMG.$file)){
                        $countImgs++;
                    }
                    //echo "<p>".$countImgs."</p>";
                }
            }    
            return $countImgs;
        }
        
        function is_img($dirImage){
            $arrExt= array("jpg", "png", "jfif", "jpeg");
            
            $tipoImg= explode(".", $dirImage);
            $ext= $tipoImg[2];
            
            //echo "<p>".$ext."</p>";
            
            if(in_array($ext, $arrExt))
                return true;
            
            return false;
        }
        
    ?>

    <form name="input" action="eval_imag.php" method="get">   
            <label for="images">¿Cuántas imágenes deseas ver?</label>
            <select name="images" id="images">
                <?php
                    $num= cuantasImag();
                    echo "<p>".$num."</p>";
                    for($count= 2; $count<= $num; $count++){
                        echo "<option value=".$count.">".$count."</option>";
                    }
                ?>
            </select>
            <br>
            <button type="submit">VER IMÁGENES</button>
    </form>
</body>
</html>

