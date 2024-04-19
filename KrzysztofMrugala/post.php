<?php
$db = new mysqli("localhost", "root", "", "stacje_narciarskie");
if($db->connect_error){
    die("Connection failed: " . $db->connect_error);
}
if(isset($_POST["imie"]) && isset($_POST["opinia"]) && isset($_POST["id"])){
        $sql = "INSERT INTO opinie (id_stacji, imie, opinia) VALUES (" . $_POST["id"] . ", '" . $_POST["imie"] . "', '" . $_POST["opinia"] . "')";
        $db->query($sql);
        //return to main page
        header("Location: index.php");
    }