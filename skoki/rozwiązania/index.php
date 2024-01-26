<?php
$conn=new mysqli('localhost','root','','skoki');
$conn->query('SET NAMES UTF8;');
if(isset($_GET['id']))
{
	$rs=$conn->query('SELECT imie,nazwisko,skok1,skok2,punkty 
	FROM zawodnicy z INNER JOIN wyniki w 
	ON z.ID_zawodnika=w.ID_zawodnika 
	WHERE ID_konkursu='.$_GET['id']);	
	while($rec=$rs->fetch_array())
	{
		for($i=0;$i<5;$i++)
			echo $rec[$i].' ';
		echo '<br>';
	}
}
else
{
	$rs=$conn->query('SELECT * FROM konkursy;');	
	while($rec=$rs->fetch_array())
	{
		echo '<a href="?id='.$rec[0].'">'.$rec['Miejsce'].' '.$rec['Data'].'</a><br>';
	}
}
	?>