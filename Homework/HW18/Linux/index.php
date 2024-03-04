<?php
	include 'dechours.php';
	$remote = $_SERVER["REMOTE_ADDR"];
	$server = $_SERVER["SERVER_ADDR"];
	$clienthostname = gethostbyaddr($remote);
	$serverhostname = $_SERVER["HTTP_HOST"];
	$localctime = localtime(time(), False);
	$localhour = $localctime[2];
	$mintohr = 150;
	$localmin = $localctime[1];

	if (substr($remote, 0, 4) == 10.9) {
		$saunetwork = " ";
	}
	else {
		$saunetwork = " NOT ";
	}

	function factoring()
	{
	 	for ($a=3; $a < 100; $a++) { 
			$bary = array();
			for ($b=$a-1; $b > 1; $b--) { 
				if ($b < 10) {
					if ($a % $b == 0) {
						array_push($bary, $b);
					}
				}
			}
			if (count($bary) == 0) {
				print "<p>" . $a . " is a prime number." . "</p>";
			}
			elseif (count($bary) == 1) {
				print "<p>" . $a . " has the following factor: " . join($bary) . "</p>";
			}
			elseif (count($bary) == 2) {
				print "<p>" . $a . " has the following factors: " . $bary[0] . " and " . $bary[1] . "</p>";
			}
			else {
				print "<p>" . $a . " has the following factors: " . join(array_slice($bary, 0, -1), ", ") . ", and " . $bary[count($bary) - 1] . "</p>";
			}
		}
	}

	function servervalues()
	{
		foreach ($_SERVER as $x => $xval) {
			print("<p>" . $x . " = " . $xval . "</p>");
		}
	}

	function currenttime()
	{
		global $localctime, $localhour;
		if ($localhour == 0) {
			$chrs = 12;
			$ampm = "AM";
		}
		elseif ($localhour < 12) {
			$chrs = $localhour;
			$ampm = "AM";
		}
		elseif ($localhour == 12) {
			$chrs = $localhour;
			$ampm = "PM";
		}
		else {
			$chrs = $localhour - 12;
			$ampm = "PM";
		}
		if ($localctime[1] < 10) {
			print $chrs . ":0" . $localctime[1] . " " . $ampm;
		}
		else {
			print $chrs . ":" . $localctime[1] . " " . $ampm;
		}
	}

	function currenthrs()
	{
		global $localctime, $localhour;
		$ctime = $localctime[1]+($localhour*60);
		dechours($ctime);
	}
	
	function compassheading()
	{
		global $localctime;
		$min = $localctime[1]+($localctime[0]/60);
		if ($min <= 5.625 and $min > 1.875) {
			$chead = "NNE";
			$cheadtxt = "North North East";
		}
		elseif ($min <= 9.375 and $min > 5.625) {
			$chead = "NE";
			$cheadtxt = "North East";
		}
		elseif ($min <= 13.125 and $min > 9.375) {
			$chead = "ENE";
			$cheadtxt = "East North East";
		}
		elseif ($min <= 16.875 and $min > 13.125) {
			$chead = "E";
			$cheadtxt = "East";
		}
		elseif ($min <= 20.625 and $min > 16.875) {
			$chead = "ESE";
			$cheadtxt = "East South East";
		}
		elseif ($min <= 24.375 and $min > 20.625) {
			$chead = "SE";
			$cheadtxt = "South East";
		}
		elseif ($min <= 28.125 and $min > 24.375) {
			$chead = "SSE";
			$cheadtxt = "South South East";
		}
		elseif ($min <= 31.875 and $min > 28.125) {
			$chead = "S";
			$cheadtxt = "South";
		}
		elseif ($min <= 35.625 and $min > 31.875) {
			$chead = "SSW";
			$cheadtxt = "South South West";
		}
		elseif ($min <= 39.375 and $min > 35.625) {
			$chead = "SW";
			$cheadtxt = "South West";
		}
		elseif ($min <= 43.125 and $min > 39.375) {
			$chead = "WSW";
			$cheadtxt = "West South West";
		}
		elseif ($min <= 46.875 and $min > 43.125) {
			$chead = "W";
			$cheadtxt = "West";
		}
		elseif ($min <= 50.625 and $min > 46.875) {
			$chead = "WNW";
			$cheadtxt = "West North West";
		}
		elseif ($min <= 54.375 and $min > 50.625) {
			$chead = "NW";
			$cheadtxt = "North West";
		}
		elseif ($min <= 58.125 and $min > 54.375) {
			$chead = "NNW";
			$cheadtxt = "North North West";
		}
		else {
			$chead = "N";
			$cheadtxt = "North";
		}
		print "The Compass Heading Is: " . $chead . " (" . $cheadtxt . ").";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Work 02 - Benjamin Carpenter</title>
	<link rel="shortcut icon" href="http://hw.cs.southern.edu/favicon.ico" mce_href="http://hw.cs.southern.edu/favicon.ico"/>
</head>
<body>
	<p><a href="/projects/bcarpenter">Home</a></p>
	<h1>Where Am I ?</h1>
	<ol>
		<h2><li>Wireless Check</li></h2>
			<!--<p>Your client is <= $remote ?> and its hostname is <= $clienthostname ?></p>-->
			<!--<p>The server is <= $server ?> and its hostname is <= $serverhostname ?.</p>-->
			<p>The server's hostname is <?= $serverhostname ?></p>
			<p>You are<?= $saunetwork ?>on the SAU wireless network</p>
		<h2><li>Factoring</li></h2>
			<?php factoring() ?>
		<!--<h2><li>Server Array</li></h2>
			<= servervalues() ?>-->
		<h2><li>Decimal Hours</li></h2>
			<p><?= $mintohr ?> minutes is <?php dechours($mintohr) ?> decimal hours.</p>
		<h2><li>Current Time</li></h2>
			<p>The current time, <?php currenttime() ?> translates to <?php currenthrs() ?> decimal hours.</p>
		<h2><li>Compass Heading</li></h2>
			<p>The Current Time Is: <?php currenttime() ?></p>
			<p>The Current Decimal Hours Is: <?php currenthrs() ?></p>
			<p><?php compassheading() ?></p>
	</ol>
	<p><a href="/projects/bcarpenter">Home</a></p>
</body>
</html>