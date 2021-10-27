<?php
    function tableImages($arrImgs){
        $arrAux=array();
        $countRows= 1;

        echo "<table><tr>";

        foreach($arrImgs as $urlImg) {
            $binaryImg= md5_file($urlImg, true);

            if(!in_array($binaryImg, $arrAux)){
                $arrAux[$urlImg]= $binaryImg;
                
                echo "<td><a target='_blanc' href=".$urlImg."><img src=".$urlImg." width='150' height='150'></a></td>";
            
                if($countRows%3==0){
                    echo "</tr>";

               // if(count($arrAux)< $countRows)
               //     echo "<tr>";
                }
                
                $countRows++;
            }

        }

        echo "</tr></table>";
    }
    
    
    
    $arrImgs= array("images/img1.jpeg", 
                    "images/img2.jfif", 
                    "images/img3.jfif", 
                    "images/img4.jfif", 
                    "images/img5.jfif", 
                    "images/img55.jfif", 
                    "images/img555.jfif", 
                    "images/img6.jfif",
                    "images/img7.jfif", 
                    "images/img8.jfif"
                   );
    
    tableImages($arrImgs);
?>