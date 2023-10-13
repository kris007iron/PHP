<?php    
    //make 8 by 5 table with first row and first column bolded
    echo "<table border='1'>";
    for($i = 0; $i < 5; $i++){
        echo "<tr>";
        for($ii = 0; $ii < 8; $ii++){
            if($i == 0 || $ii == 0){
                echo "<td><b>".(($i+1)*($ii+1))."</b></td>";
            }else{
                echo "<td>".(($i+1)*($ii+1))."</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";

?>