<?php    
    $numbers = [];
    for ($i = 0; $i < 30; $i++) {
        $numbers[] = rand(-20, 20);
    }    
    echo "Liczby: </br>";
    foreach ($numbers as $number) {
        echo "$number </br>";
    }    
    $count = 0;
    for($i = 0; $i < count($numbers); $i++){
        for($ii = $i; $ii < count($numbers); $ii++){
            if($numbers[$i] == $numbers[$ii] && $i != $ii){
                $count++;
                break;
            }
        }
    }
    echo "Ile liczb się powtórzyło: $count";    
?>