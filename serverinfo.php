<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Server Info</title>
	<link rel="shortcut icon" href="http://hw.cs.southern.edu/favicon.ico" mce_href="http://hw.cs.southern.edu/favicon.ico"/>
</head>
<body>
	<a href="/bcarpenter">Home</a>
	<?php
		foreach ($_SERVER as $x => $xval) {
			print("<p>" . $x . " = " . $xval . "</p>");
		}
	?>
	<a href="/bcarpenter">Home</a>
</body>
</html>