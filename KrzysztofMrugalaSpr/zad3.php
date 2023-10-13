<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">
        Podaj text: <input type="text" name="text" id="text">        
        <input type="submit" value="Submit">
    </form>
    <?php        
        if(isset($_GET['text'])){
            $text = $_GET['text'];
            $tab = [];
            for($i = 0; $i < strlen($text); $i++){
                if($text[$i]==" " ){
                    $tab[] = substr($text,0,$i);
                    $text = substr($text,$i+1);
                    $i = 0;
                }else if($i == strlen($text)-1){
                    $tab[] = $text;
                }
            }            
            for($i = 0; $i < count($tab); $i++){
                if(strlen($tab[$i]) % 2 != 0){
                    $tab[$i] = strtoupper(substr($tab[$i],0,1)).substr($tab[$i],1,strlen($tab[$i])-2).strtoupper(substr($tab[$i],strlen($tab[$i])-1));
                }
            }            
            for($i = 0; $i < count($tab); $i++){
                echo $tab[$i]." ";
            }
        }
    ?>
</body>
</html>