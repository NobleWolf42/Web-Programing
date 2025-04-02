<?php
	$carsdocument = file_get_contents("cars.txt");
	$carlines = explode(PHP_EOL, $carsdocument);
	$id = array();
	$make = array();
	$model = array();
	$year = array();
	$picture = array();
	foreach ($carlines as $line) {
		$linearray = explode(";", $line);
		array_push($id, $linearray[0]);
		array_push($make, $linearray[1]);
		array_push($model, $linearray[2]);
		array_push($year, $linearray[3]);
		array_push($picture, $linearray[4]);
	}

	if (isset($_GET['sort'])) {
		$sort =  $_GET['sort'];
	}
	else {
		$sort = "ID";
	}


	function sortedtable() {
		global $sort, $id, $make, $model, $year, $picture;

		if ($sort == "ID") {
			asort($id);
			foreach ($id as $key => $value) {
				echo "<tr><td>" . $id[$key] . "</td><td>" . $make[$key] . "</td><td>" . $model[$key] . "</td><td>" . $year[$key] . "</td><td><img src=\"images/" . $picture[$key] . "\"></td></tr>";
			}
		}
		elseif ($sort == "Make") {
			asort($make);
			foreach ($make as $key => $value) {
				echo "<tr><td>" . $id[$key] . "</td><td>" . $make[$key] . "</td><td>" . $model[$key] . "</td><td>" . $year[$key] . "</td><td><img src=\"images/" . $picture[$key] . "\"></td></tr>";
			}
		}
		elseif ($sort == "Model") {
			asort($model);
			foreach ($model as $key => $value) {
				echo "<tr><td>" . $id[$key] . "</td><td>" . $make[$key] . "</td><td>" . $model[$key] . "</td><td>" . $year[$key] . "</td><td><img src=\"images/" . $picture[$key] . "\"></td></tr>";
			}
		}
		elseif ($sort == "Year") {
			asort($year);
			foreach ($year as $key => $value) {
				if ($value != "") {
					echo "<tr><td>" . $id[$key] . "</td><td>" . $make[$key] . "</td><td>" . $model[$key] . "</td><td>" . $year[$key] . "</td><td><img src=\"images/" . $picture[$key] . "\"></td></tr>";
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Work 07 - Benjamin Carpenter</title>
	<link rel="shortcut icon" href="/faveicon.ico" mce_href="/faveicon.ico"/>
</head>
<body>
	<p><a href="/projects/bcarpenter">Home</a></p>
	<h1>An Array of Toy Cars</h1>
	<table border="1">
		<tr><th><a href="?sort=ID">ID</a></th><th><a href="?sort=Make">Make</a></th><th><a href="?sort=Model">Model</a></th><th><a href="?sort=Year">Year</a></th><th>Picture</th></tr>
		<?php sortedtable() ?>
	</table>
	<p><a href="/projects/bcarpenter">Home</a></p>
</body>
</html>