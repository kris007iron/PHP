<?php
//maka a login page utilizing session and displaying something only for logged youser
session_start();
if (isset($_POST["login"])) {
    $_SESSION["login"] = $_POST["login"];
}
if (isset($_SESSION["login"])) {
    echo "Witaj " . $_SESSION["login"] . "!<br>";
    echo "Twoja sesja trwa już " . (time() - $_SESSION["time"]) . " sekund.";
} else {
    echo "<form action='login.php' method='post'>";
    echo "Login: <input type='text' name='login'><br>";
    echo "Password: <input type='text' name='password'><br>";
    echo "<input type='submit' value='Zaloguj'>";
    echo "</form>";
}
$_SESSION["time"] = time();
$_SESSION["entry"] = $_SESSION["entry"] + 1;
echo "Liczba wejść na stronę: " . $_SESSION["entry"];
//get login and hashed password from database
$conn = mysqli_connect("localhost", "root", null, "pracownicy_4ic");
$result = mysqli_query($conn, "SELECT * FROM users WHERE login = '" . $_POST["login"] . "'");
$row = mysqli_fetch_array($result);
$login = $row[0];
$password = $row[1];
mysqli_close($conn);
//check if login and password are correct
if (isset($_POST["login"]) && isset($_POST["password"])) {
    if ($_POST["login"] == $login && sha1($_POST["password"]) == $password) {
        $_SESSION["login"] = $_POST["login"];
    } else {
        echo "Niepoprawny login lub hasło!";
    }
} else if (
    isset($_POST["login"]) && isset($_POST[
        "password"]) == false
) {
    echo "Wpisz hasło!";
} else if (
    isset($_POST["login"]) && isset($_POST[
        "password"]) == false
) {
    echo "Wpisz login!";
}
$_SESSION["login"] = $_POST["login"];

?>