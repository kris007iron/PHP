<?php
for ($i = 0; $i < 10; $i++) {
    $liczby[$i] = rand() % 10;
}
header("Content-type: image/jpeg");
$rysunek = imagecreate(1000, 1000)
    or die("Biblioteka graficzna nie została zainstalowana!");
$kolorbialy = imagecolorallocate($rysunek, 255, 255, 255);
$kolorczarny = imagecolorallocate($rysunek, 0, 0, 0);
imagefill($rysunek, 0, 0, $kolorbialy);

for ($i = 0; $i < 10; $i++) {
    //make a horizontal graph wih colours from green to red graddualy
    $kolor = imagecolorallocate($rysunek, 255 - $i * 25, $i * 25, 0);
    //add text of i at the beggining and at the end
    $value = $liczby[$i];
    imagestring($rysunek, 8, 0, $i * 100 + 40, $i, $kolorczarny);
    imagefilledrectangle($rysunek, 20, $i * 100, 1000 - $value * 100, $i * 100 + 100, $kolor);
    imagestring($rysunek, 8, 1010 - $value * 100, ($i * 100) + 40, $value, $kolorczarny);
}
imagejpeg($rysunek);
?>