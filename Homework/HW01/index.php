<?php
	// Variables
	$years = 70;
	$days = $years * 365.242;
	$mps = 186000;
	$sec = 60;
	$traveled = $sec * $mps;
	$mpy = $mps*60*60*24*365.242;
	$star = $mpy * 4.2421;
	$bosinan_days = array(
		"Nedjelja",
		"Ponedeljak",
		"Utorak",
		"Sijeda",
		"Čxetvrtak",
		"Petak",
		"Subota"
	);
	$spanish_days = array(
		"Domingo",
		"Lunes",
		"Martes",
		"Miércoles",
		"Jueves",
		"Viernes",
		"Sábado"
	);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Work 01 - Benjamin Carpenter</title>
	<link rel="shortcut icon" href="faveicon.ico" mce_href="/faveicon.ico"/>
</head>
<body>
	<p><a href="/projects/bcarpenter">Home</a></p>
	<h1>Who Am I? (Basic PHP)</h1>
	<ol>
		<!--<li><p>Your Client IP Address is:<= $_SERVER['REMOTE_ADDR'] ?></p></li>
		<li><p>Your Server IP Address is:<= $_SERVER['SERVER_ADDR'] ?></p></li>-->
		<li><p>We can print a <?= '"' ?> by enclosing it in single quotes.</p></li>
		<li><p>We can print a <?= "\"" ?> by escaping it.</p></li>
		<li><p>A lifetime of <?= $years ?> years has <?= $days ?> days.</p></li>
		<li><p>A light beam travels <?= $traveled ?> miles in <?= $sec ?> seconds.</p></li>
		<li><p>Alpha Proxima is <?= $star ?> miles away.</p></li>
		<li><p>The Bosnian days of the week are: <?= join(array_slice($bosinan_days, 0, -1), ", ") ?>, and <?= $bosinan_days[count($bosinan_days) - 1] ?>.</p></li>
		<li><p>The Spanish days of the week are: <?= join(array_slice($spanish_days, 0, -1), ", ") ?>, and <?= $spanish_days[count($spanish_days) - 1] ?>.</p></li>
	</ol>
	<p><a href="/projects/bcarpenter">Home</a></p>
</body>
</html>