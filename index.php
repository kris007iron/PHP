<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="GET">
        Podaj imię: <input type="text" name="imie" id="imie">
        Podaj nazwisko: <input type="text" name="nazwisko" id="nazwisko">
        Podaj pesel: <input type="number" name="pesel" id="pesel">
        <input type="submit" value="Oblicz">
    </form>
    <?php
    $check = "agedyropulik";
    $check = strtoupper($check);
    $base = ["G", "A", "D", "E", "R", "Y", "P", "O", "L", "U", "K", "I"];
    for($i = 0; $i < strlen($check); $i++){
        for($ii = 0; $ii < count($base); $ii++){
            if($check[$i] == $base[$ii]){
                if($ii % 2 == 0){
                    $check[$i] = $base[$ii + 1];
                }else
                {
                    $check[$i] = $base[$ii-1];
                }
                break;
            }
        }
    }
    echo $check;
    if(isset($_GET['imie']) && isset($_GET['nazwisko']) && isset($_GET['pesel'])){
        $imie = $_GET['imie'];
        $nazwisko = $_GET['nazwisko'];
        $pesel = $_GET['pesel'];        
        echo substr($imie,0,1).substr($nazwisko,0,1);
        if($imie == "nigga" || $imie == "nigger" || $imie == "nygus" || $imie == "Nigołaj")
        {
            echo "Małpa";
            return;
        }                    
        $imie = trim($imie);
        for($i = 0; $i<strlen($imie);$i++){
            echo chr(ord($imie[$i])+1);
        }
        

        function validatePESEL($pesel) {
            // Check if the PESEL number is exactly 11 digits long
            if (strlen($pesel) !== 11 || !is_numeric($pesel)) {
                return "Invalid PESEL: The PESEL number should be exactly 11 digits long and contain only digits.";
            }
            if ($pesel[9] % 2 == 0){
                echo "Kobieta";
            }
            else{
                echo "Mężczyzna";
            }       
            // Extract individual digits from the PESEL
            $digits = str_split($pesel);
        
            // Define weights for the digits
            $weights = [1, 3, 7, 9, 1, 3, 7, 9, 1, 3, 1];
        
            // Calculate the control sum
            $controlSum = 0;
            for ($i = 0; $i < 10; $i++) {
                $controlSum += $digits[$i] * $weights[$i];
            }
            
            $controlDigit = (10 - ($controlSum % 10)) % 10;
        
            // Check if the control digit matches the last digit of the PESEL
            if ($controlDigit != $digits[10]) {
                return "Invalid PESEL: The control digit does not match.";
            }
        
            // Extract birthdate information from the PESEL
            $year = intval(substr($pesel, 0, 2));
            $month = intval(substr($pesel, 2, 2));
            $day = intval(substr($pesel, 4, 2));
        
            // Determine the birth century
            $century = "";
            if ($month >= 1 && $month <= 12) {
                $century = "19"; // Birthdate is in the 20th century
            } elseif ($month >= 21 && $month <= 32) {
                $century = "20"; // Birthdate is in the 21st century
                $month -= 20; // Adjust the month
            } else {
                return "Invalid PESEL: The month is not valid.";
            }
            if ($month < 10) {
                $month = "0" . $month; // Add leading zero to the month
            }
            if ($day < 10) {
                $day = "0" . $day; // Add leading zero to the day
            }
            if ($year < 10) {
                $year = "0" . $year; // Add leading zero to the year
            }
            return "Valid PESEL: Birthdate: $day-$month-$century$year";
        }                
        
        // Example usage:        
        //$result = validatePESEL($pesel);
        //echo $result;
        

        
    }
    ?>
</body>
</html>