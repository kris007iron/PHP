<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "sprawadziandb";
$Imiona = [];
$Nazwiska = [];
$Doswiadzczenie = [];
$mysqli = new mysqli($hostname, $username, $password, $database);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
// $c = new mysqli("localhost", "root", null, "firma");

if (!$mysqli)
    die("Brak połączenia z bazą typie");


$sql = "SELECT * FROM sprawdzian";
$result = $mysqli->query($sql);
if ($result) {

    while ($row = $result->fetch_assoc()) {
        array_push($Imiona, $row["Imie"]);
        array_push($Nazwiska, $row["Nazwisko"]);
        array_push($Doswiadzczenie, $row["Lata_Doswiadczenia"]);
        // print_r($Imie)
        // echo "ID: " . $row["ID"] . " - Imię: " . $row["Imie"] . " - Nazwisko: " . $row["Nazwisko"] . "Data dodania: " . $row["Data dodania"] ."Staż: " . $row["Lata_Doswiadczenia"] .  "<br>";
    }
}
;
// print_r($Imie);
// print_r($Nazwiska);
// print_r($Doswiadzczenie);
// echo count($Imiona);
$mysqli->close();
$DoswiadzczenieArr = array_count_values($Doswiadzczenie);
$keys = array_keys($DoswiadzczenieArr);
sort($keys);
// print_r($keys);
// print_r($DoswiadzczenieArr);
header("Content-type: image/jpeg");
$rysunek = imagecreate(1000, 1000)
    or die("Biblioteka graficzna nie została zainstalowana!");
$kolorbialy = imagecolorallocate($rysunek, 28, 28, 28);
$kolorczarny = imagecolorallocate($rysunek, 255, 255, 255);
imagefill($rysunek, 0, 0, $kolorbialy);
// $length = count($Imie);
for ($i = 0; $i < count($DoswiadzczenieArr); $i++) {

    // $kolorslupka = imagecolorallocate($rysunek, $i * 20, 128 - $i * 10, 0);
    $kolorslupka = imagecolorallocate($rysunek, (($i * 50) % 255), ((abs(128 - $i * 30)) % 255), 255);
    imagefilledrectangle(
        $rysunek,
        120 + $DoswiadzczenieArr[$keys[$i]] * 25,
        $i * 100 + 20,
        120,
        $i * 100 + 50,
        $kolorslupka
    );
    imagestring(
        $rysunek,
        8,
        20,
        30 + $i * 100,
        $keys[$i],
        $kolorczarny
    );
    imagestring(
        $rysunek,
        8,
        130 + $DoswiadzczenieArr[$keys[$i]] * 25,
        30 + $i * 100,
        $DoswiadzczenieArr[$keys[$i]],
        $kolorczarny
    );
}
imagejpeg($rysunek);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
// $c = new mysqli("localhost", "root", null, "firma");

if (!$mysqli)
    die("Brak połączenia z bazą typie");
if (isset($_GET['Imie'], $_GET['Nazwisko'], $_GET['Data_dodania'])) {
    $Imie = $_GET['Imie'];
    $Nazwisko = $_GET['Nazwisko'];
    $DataDodania = $_GET['Data_dodania'];
    echo "Dodano pracownika: $Imie $Nazwisko";
    $mysqli->query("INSERT INTO sprawdzian (Imie, Nazwisko, Data_dodania) VALUES ('$Imie', '$Nazwisko', '$DataDodania')") or die("INSERT nie działa"); //zapytanie sql
}


$sql = "SELECT * FROM sprawdzian";


$result = $mysqli->query($sql);

echo "
  <table>
  <tr>
    <th>ID</th>
    <th>Imie</th>
    <th>Nazwisko</th>
    <th>Data dodania</th>
    <th>Staż</th>
  </tr>
  "
;

if ($result) {

    while ($row = $result->fetch_assoc()) {
        // echo "ID: " . $row["ID"] . " - Imię: " . $row["Imie"] . " - Nazwisko: " . $row["Nazwisko"] . "Data dodania: " . $row["Data dodania"] ."Staż: " . $row["Lata_Doswiadczenia"] .  "<br>";
        array_push($Imiona, $row["Imie"]);
        array_push($Nazwiska, $row["Nazwisko"]);
        array_push($Doswiadzczenie, $row["Lata_Doswiadczenia"]);
        echo "<tr>"
            . "<td>" . $row["ID"] . "</td>"
            . "<td>" . $row["Imie"] . "</td>"
            . "<td>" . $row["Nazwisko"] . "</td>"
            . "<td>" . $row["Data_dodania"] . "</td>"
            . "<td>" . $row["Lata_Doswiadczenia"] . "</td>"
            . "</tr>";
    }

    // print_r($Imiona). "<br>";
    // print_r($Nazwiska). "<br>";
    // print_r($Doswiadzczenie). "<br>";
    $result->free();
} else {
    echo "Error: " . $mysqli->error;
}
echo "</table>";
$mysqli->close();

?>
<form>

    <form method="GET">
        Imię: <input type="text" name="Imie"> <br />
        Nazwisko: <input type="text" name="Nazwisko"> <br />
        Data : <input type="date" name="Data_dodania"> <br />
        <input type="submit" value="dodaj">
    </form>
    <!-- 	imagefilledrectangle(id_rys,x1,y1,x2,y2,kolor) – rysuje prostokąt wypełniony kolorem, 
x1,y1 – współrzędne lewego górnego narożnika, 
x2,y2 – współrzędne prawego dolnego narożnika -->