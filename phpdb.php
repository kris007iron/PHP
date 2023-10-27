<?php
mysqli_report(MYSQLI_REPORT_OFF);
// $conn = mysqli_connect("localhost","root",null,"pracownicy_4ic");
// if(!$conn) die("Brak połączenia");

// $result = mysqli_query($conn,"SELECT imie, nazwisko FROM pracownicy");
// while($row=mysqli_fetch_array($result)){
//     echo $row[0]." ".$row[1]."</br>";
// }
// mysqli_close($conn);



//handle form and create a new record
// Path: form.php
if(isset($_GET['imie']) && isset($_GET['nazwisko'])){
    $conn=new mysqli("localhost","root",null,"pracownicy_4ic");
    $stmt=$conn->prepare("INSERT INTO pracownicy(imie,nazwisko) VALUES(?,?)");
    $stmt->bind_param("ss",$_GET['imie'],$_GET['nazwisko']);
    $stmt->execute() or die("Błąd przy dodawaniu rekordu");
    $stmt->close();
    $conn->close();    

}
$conn=new mysqli("localhost","root",null,"pracownicy_4ic");
$result = $conn->query("SELECT imie, nazwisko FROM pracownicy");
if($result->num_rows==0){
    echo "<table border=1><tr><th>Brak rekordów</th></tr>";
}else
{
    echo "<table border=1><tr><th>Imie</th><th>Nazwisko</th></tr>";
    while($row=$result->fetch_array())
    {
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
    }
}
echo "</table>";
$result->close();
$conn->close();
?>
//create a form
// Path: form.php
<form>
    <input type="text" name="imie" placeholder="Imie">
    <input type="text" name="nazwisko" placeholder="Nazwisko">
    <input type="submit" value="Wyślij">
</form>