Jaki jest tówj ulubiony dzień tygodnia?
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "kmrugala";
$table = "dnitygodnia";
$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "SELECT * FROM $table";
$result = $mysqli->query($sql);
echo "<form>";
if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo "<input type='radio' name='day' value='" . $row['id'] . "'>" . $row['dzien'] . "<br>";
    }
    $result->free();
} else {
    echo "Error: " . $mysqli->error;
}
echo "<input type='submit' value='Wyślij'>";
echo "</form>";

if (isset($_GET['day'])) {
    $day = $_GET['day'];
    $sql = "UPDATE $table SET glosy = glosy + 1 WHERE id = $day";
    $result = $mysqli->query($sql);
    if ($result) {
    } else {
        echo "Error: " . $mysqli->error;
    }
}

$sql = "SELECT * FROM $table";
$result = $mysqli->query($sql);

$obrazek = imagecreate(400, 400);
$white = imagecolorallocate($obrazek, 255, 255, 255);
$black = imagecolorallocate($obrazek, 0, 0, 0);
$red = imagecolorallocate($obrazek, 255, 0, 0);

if ($result) {
    $sum = 0;
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        imagestring($obrazek, 5, 10, $i * 50 + 10, $row['dzien'], $black);
        imagefilledrectangle($obrazek, 120, $i * 50, 120 + $row['glosy'] * 10, $i * 50 + 40, $red);
        imagestring($obrazek, 5, 140 + $row['glosy'] * 10, $i * 50 + 10, $row['glosy'], $black);
        $i++;
        $sum += $row['glosy'];
    }
    imagestring($obrazek, 5, 10, $i * 50 + 10, "Suma glosow: " . $sum, $black);
    $result->free();
} else {
    echo "Error: " . $mysqli->error;
}
imagepng($obrazek, "obrazek.png");
echo "<img src='obrazek.png'>";
?>