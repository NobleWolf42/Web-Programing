<?php
	include("../../sqlpassword.php");
	$db = new PDO('mysql:host=localhost;dbname=bencarpenterit;charset=utf8', $id, $password);
	
	function printgiftcarddata() {
		global $id, $password, $db;
		$sql = "SELECT * FROM  `giftcard`";
		$response=$db->query($sql);
		foreach ($response as $row) {
			$value = $row['value']/100;
			echo "<tr><td>" . $row['acctno'] . "</td><td>" . $row['holder'] . "</td><td>$" . number_format((float)$value, 2, '.', ',') . "</td></tr>";
		}	
	}
?>