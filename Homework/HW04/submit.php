<?php
	include 'bookindex.php';


	$reference = $_GET['reference'];
	$bookcheck = substr($reference, 0, 2);

	if (strtolower(substr($reference, 0, 15)) == "song of solomon"){
		$explodedhuh = explode(" ", $reference);
		$explodedbook = array("song of solomon", $explodedhuh['3']);
		$booknamedis = substr($reference, 0, 15);
	}
	else {
		if (!strpos($bookcheck, ' ')) {
			$explodedbook = explode(" ", $reference, 2);
			$booknamedis = $explodedbook['0'];
		}
		else {
			$bkpt1 = substr($reference, 0, 1);
			$bkpt2 = explode(" ", $reference);
			$bkex2 = explode(" ", substr($reference, 2), 2);
			$explodedbook = array(
				$bkpt1 . $bkpt2['1'],
				$bkex2['1'],
				);
			$booknamedis = $bkpt1 . " " .$bkpt2['1'];
		}
	}

	$bookname = $explodedbook['0'];
	$booknamel = strtolower($bookname);
	
	if (!strpos($explodedbook['1'], ':')) {
    	die('The Verse You Entered was Invalid, Please Make Sure You Entered a ":" and <a href="index.php">Try Again</a>.');
	}
	else {
		$explodednumbers = explode(":", str_replace(" ", "", $explodedbook['1']));
		$chapter = $explodednumbers['0'];
		$verse = $explodednumbers['1'];
	}
	

	if (!array_key_exists ($booknamel, $books)) {
		die('The Name of The Book You Entered was Invalid, Please <a href="index.php">Try Again</a>.');
	}
	else {
		$booknum = $books[$booknamel];
		if ($booknum < 10) {
			$book = 0 . $booknum;
		}
		else {
			$book = $booknum;
		}
		$versetxt = @implode('', file('http://hw.cs.southern.edu/Bible/b' . $book . '_' . $chapter . '_' . $verse . '.htm'));
	}

	$referencedis = $booknamedis . " " . $chapter . ":" . $verse;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Work 04 - Benjamin Carpenter</title>
	<link rel="shortcut icon" href="http://hw.cs.southern.edu/favicon.ico" mce_href="http://hw.cs.southern.edu/favicon.ico"/>
</head>
<body>
	<p><a href="/projects/bcarpenter">Home</a></p>
	<h1>Bible Text Lookup</h1>
	<h3>Form</h3>
	<p>Please Input a Bible Reference (make sure to spell out the book, place a space inbetween the book and chapter, and a colon inbetween the chapter and verse) and the verse will be returned below.</p>
	<form action="submit.php" method="sticky">
		<p>Bible Reference: <input type="text" name="reference" value=<?= '"' . $referencedis . '"' ?>></p>
		<p><input type="submit" value="Submit Query" /></p>
	</form>
	<h3>Bible Text</h3>
	<p><?= $referencedis . " - " . '"' . $versetxt . '"' ?></p>
	<p><a href="/projects/bcarpenter">Home</a></p>
</body>
</html>