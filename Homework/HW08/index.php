<?php
	include("../../sqlpassword.php");
	$db = new PDO('mysql:host=localhost;dbname=bencarpenterit;charset=utf8', $id, $password);
	$sortbyyear = False;

	if (isset($_GET['sort'])) {
		$sort = $_GET['sort'];
	}
	else {
		$sort = 'ID';
	}

	if ($sort == "ID") {
		$sql = "SELECT * FROM `cars` ORDER BY `cars`.`id` ASC";
	}
	elseif ($sort == "Make") {
		$sql = "SELECT * FROM `cars` ORDER BY `cars`.`make` ASC";
	}
	elseif ($sort == "Model") {
		$sql = "SELECT * FROM `cars` ORDER BY `cars`.`model` ASC";
	}
	elseif ($sort == "Year") {
		$sql = "SELECT * FROM `cars` ORDER BY `cars`.`year` ASC";
		$sortbyyear = True;
	}
	
	$response=$db->query($sql);

	function sqlget() {
		global $response, $sortbyyear;
		if ($sortbyyear) {
			foreach ($response as $row) {
				if ($row['year'] != "") {
					echo "<tr><td>" . $row['id'] . "</td><td>" . $row['make'] . "</td><td>" . $row['model'] . "</td><td>" . $row['year'] . "</td><td><img src=\"images/" . $row['image'] . "\"></td></tr>";
				}
			}
		}
		else {
			foreach ($response as $row) {
				echo "<tr><td>" . $row['id'] . "</td><td>" . $row['make'] . "</td><td>" . $row['model'] . "</td><td>" . $row['year'] . "</td><td><img src=\"images/" . $row['image'] . "\"></td></tr>";
			}	
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Work 08 - Benjamin Carpenter</title>
	<link rel="shortcut icon" href="/faveicon.ico" mce_href="/faveicon.ico"/>
</head>
<body>
	<p><a href="/projects/bcarpenter">Home</a></p>
	<h1>An Array of Toy Cars</h1>
	<table border="1">
		<tr><th><a href="?sort=ID">ID</a></th><th><a href="?sort=Make">Make</a></th><th><a href="?sort=Model">Model</a></th><th><a href="?sort=Year">Year</a></th><th>Picture</th></tr>
		<?php sqlget() ?>
	</table>
	<p><a href="/projects/bcarpenter">Home</a></p>
</body>
</html>