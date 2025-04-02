<?php
	include("dbdisp.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Work 09 - Benjamin Carpenter</title>
	<link rel="shortcut icon" href="/faveicon.ico" mce_href="/faveicon.ico"/>
</head>
<body>
	<p><a href="/projects/bcarpenter">Home</a></p>
	<h1>The Gift of Data</h1>
	<a href="clear.php">Clear</a>
	<a href="dbload.php">Load</a>
	<a href="dbdel.php">Delete Selected Records</a>
	<a href="dbupdate.php">Update Records</a>
	<table border="1">
		<tr><th>Account Number</th><th>Name</th><th>Value (In USD)</th></tr>
		<?php printgiftcarddata() ?>
	</table>
	<p><a href="/projects/bcarpenter">Home</a></p>
</body>
</html>