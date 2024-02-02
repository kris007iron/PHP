<?php
$conn = new mysqli('localhost', 'root', '', 'skoki');
$conn->query('SET NAMES UTF8;'); // polski
if (isset($_GET['id'])) {
	$rs = $conn->query('SELECT imie,nazwisko,skok1,skok2,punkty 
	FROM zawodnicy z INNER JOIN wyniki w 
	ON z.ID_zawodnika=w.ID_zawodnika  
	WHERE ID_konkursu=' . $_GET['id']); // po id
	echo '<table>';
	while ($rec = $rs->fetch_array()) {
		echo '<tr>';
		for ($i = 0; $i < 5; $i++) {
			echo '<td>';
			echo $rec[$i] . ' ';
			echo '</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
} else {
	$rs = $conn->query('SELECT * FROM konkursy;');
	while ($rec = $rs->fetch_array()) {
		echo '<a href="?id=' . $rec[0] . '">' . $rec['Miejsce'] . ' ' . $rec['Data'] . '</a><br>';
	}
}
?>