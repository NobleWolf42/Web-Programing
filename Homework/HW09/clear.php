<?php 
	include("../../sqlpassword.php");
	$db = new PDO('mysql:host=localhost;dbname=bencarpenterit;charset=utf8', $id, $password);
	$sql = "SELECT * FROM  `giftcard`";
	$response=$db->query($sql);
	echo '<p><a href="/projects/bcarpenter/Homework/HW09">Main Page</a></p>';
	echo '<p>This program clears all data.</p>';
	$sql = "TRUNCATE TABLE `giftcard`";
	$response=$db->query($sql);
	if (!$response) {
		echo "There was an error clearing the table.<br>";
	}
	else {
		echo "Clearing the table was completed sucessfully.<br>";
	}
	include("dbdisp.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Clear Database</title>
	<link rel="shortcut icon" href="faveicon.ico" mce_href="/faveicon.ico"/>
</head>
<body>
	<table border="1">
		<tr><th>Account Number</th><th>Name</th><th>Value (In USD)</th></tr>
		<?php printgiftcarddata() ?>
	</table>
	<p><a href="/projects/bcarpenter/Homework/HW09">Main Page</a></p>
</body>
</html>