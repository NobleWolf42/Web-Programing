<?php 
	include("../../sqlpassword.php");
	$db = new PDO('mysql:host=localhost;dbname=bencarpenterit;charset=utf8', $id, $password);
	$sql = "SELECT * FROM  `giftcard`";
	$response=$db->query($sql);
	$data = file_get_contents("GiftCards.txt");
	$datalines = explode(PHP_EOL, $data);
	$count = 0;
	echo '<p><a href="/projects/bcarpenter/Homework/HW09">Main Page</a></p>';
	echo '<p>This program loads the data from "GiftCards.txt"</p>';

	foreach ($datalines as $datastring){
		$acctno = substr($datastring, 10, 6);
		$holder = substr($datastring, 19, 15);
		$value = substr($datastring, 48, 7);
		$sql = "INSERT INTO `giftcard`(`acctno`,        `holder`,       `value`) VALUES (" . $acctno . ",\"" . $holder . "\"," . $value . ")";
		$response=$db->query($sql);
		if (!ctype_digit($acctno)){
			echo "Invalid Data: \"" . $datastring . "\"<br>";
			echo "The account number \"" . $acctno . "\" is invalid because it contains non-numbers<br>";
		}
		elseif (!ctype_digit($value)) {
			echo "Invalid Data: \"" . $datastring . "\"<br>";	
			echo "The value number \"" . $value . "\" is invalid because it contains non-numbers<br>";
		}
		elseif (!$response) {
			echo "Rejected Data: \"" . $datastring . "\"<br>";
			echo "Duplicate entry \"" . $acctno . "\" as account number<br>";
		}
		else {
			$count = $count + 1;
		}
	}
	include("dbdisp.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Load Database</title>
	<link rel="shortcut icon" href="faveicon.ico" mce_href="/faveicon.ico"/>
</head>
<body>
	<p>We have added <?= $count ?> rows to the table.</p>
	<table border="1">
		<tr><th>Account Number</th><th>Name</th><th>Value (In USD)</th></tr>
		<?php printgiftcarddata() ?>
	</table>
	<p><a href="/projects/bcarpenter/Homework/HW09">Main Page</a></p>
</body>
</html>