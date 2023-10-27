<?php
mysqli_report(MYSQLI_REPORT_OFF);
// $conn = mysqli_connect("localhost","root",null,"pracownicy_4ic");
// if(!$conn) die("Brak połączenia");

// $result = mysqli_query($conn,"SELECT imie, nazwisko FROM pracownicy");
// while($row=mysqli_fetch_array($result)){
//     echo $row[0]." ".$row[1]."</br>";
// }
// mysqli_close($conn);

$conn=new mysqli("localhost","root",null,"pracownicy_4ic");
$result = $conn->query("SELECT imie, nazwisko FROM pracownicy");
echo "<table border=1><tr><th>Imie</th><th>Nazwisko</th></tr>";
while($row=$result->fetch_array())
{
    echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
}
$result->close();
$conn->close();
?>
