<?php
$conn = mysqli_connect("localhost", "root", null, "pracownicy_4ic");
mysqli_query($conn, "UPDATE entries SET number = number + 1 WHERE id = 1");
echo "Liczba wejść na stronę: " . mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM entries"))[1];
mysqli_close($conn);
?>