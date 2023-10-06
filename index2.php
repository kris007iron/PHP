<?php
// //phpinfo();
// define('PI',3.14);
// $r=2.0;
// $pole = 2*PI*$r;
// echo("Pole koła o promieniu $r wynosi $pole");
// echo ++$pole;
// $liczba=10;
// echo "</br>";
// if($liczba%2)
// {
//   echo("Liczba $liczba jest nieparzysta");
// }
// else
// {
//   echo("Liczba $liczba jest parzysta");
// }
// echo "</br>";
// $liczba=11;
// echo 'Liczba '.$liczba.' jest '.($liczba%2?'nie':'').'parzysta';
// echo "</br>";
// $operator = "/";
// switch($operator){
//     case "+":
//         echo $liczba + $r;
//         break;
//     case "-":
//         echo $liczba - $r;
//         break;
//     case "*":
//         echo $liczba * $r;
//         break;
//     case "/":
//         echo ($r==0)?"Nie można dzielić przez zero":$liczba / $r;
//         break;
// }
// echo "</br>";
// $ii = 10;
// for($i = 1; $i <= 10; $i++){
//   echo "$i $ii </br>";
//   --$ii;
// }
// while($ii<10){
//   echo "$ii </br>";
//   $ii++;
// }

// if(isset($_POST['texti'])){\
// switch($_POST['operator']){
//     case "+":
//         echo $_POST['liczbai'] + $_POST['liczbaii'];
//         break;
//     case "-":
//       echo $_POST['liczbai'] - $_POST['liczbaii'];
//         break;
//     case "*":
//       echo $_POST['liczbai'] * $_POST['liczbaii'];
//         break;
//     case "/":
//       echo ($_POST['liczbaii']==0)?"Nie można dzielić przez zero":$_POST['liczbai'] / $_POST['liczbaii'];
//       break;
//     default:
//       echo "Deine Mutter";
// }
// 
function pp($a,$b){
  return $a*$b;
}
echo pp(2,3);
echo "</br>";
function silnia($a){
  return $a==1?1:$a*silnia($a-1);
}
echo silnia(5);
function rabbits($pairs)
{    

  if($pairs == 0)
  {
    return 0;
  }
  else if($pairs == 1)
  {
    return 1;
  }    
    return rabbits($pairs - 1) + rabbits($pairs - 2);  
}
echo rabbits(12);
?>
<!-- </br>
<a href="http://localhost/kmrugala/index.html">Back</a> -->
