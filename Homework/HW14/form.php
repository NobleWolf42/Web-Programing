<?php
	if (isset($_POST['regname'])) {
		$regname = $_POST['regname'];
	}
	else {
		$regname = "";
	}

	if (isset($_POST['spouse'])) {
		$spouse = $_POST['spouse'];
	}
	else {
		$spouse = "";
	}

	if (isset($_POST['adr1'])) {
		$adr1 = $_POST['adr1'];
	}
	else {
		$adr1 = "";
	}

	if (isset($_POST['adr2'])) {
		$adr2 = $_POST['adr2'];
	}
	else {
		$adr2 = "";
	}

	if (isset($_POST['city'])) {
		$city = $_POST['city'];
	}
	else {
		$city = "";
	}

	if (isset($_POST['state'])) {
		$state = $_POST['state'];
	}
	else {
		$state = "";
	}

	if (isset($_POST['zip'])) {
		$zip = $_POST['zip'];
	}
	else {
		$zip = "";
	}

	if (isset($_POST['cellnum'])) {
		$cellnum = $_POST['cellnum'];
	}
	else {
		$cellnum = "";
	}

	if (isset($_POST['email'])) {
		$email = $_POST['email'];
	}
	else {
		$email = "";
	}

	if (isset($_POST['email2'])) {
		$email2 = $_POST['email2'];
	}
	else {
		$email2 = "";
	}

	if (isset($_POST['conf']) == "ME") {
		$conf = "ME";
	}
	elseif (isset($_POST['conf']) == "YL") {
		$conf = "YL";
	}
	elseif (isset($_POST['conf']) == "DA") {
		$conf = "DA";
	}
	else {
		$conf = "";
	}

	if (isset($_POST['residence']) == "LO") {
		$residence = "LO";
	}
	elseif ($conf == "ME") {
		$residence = "LO";
	}
	elseif (isset($_POST['residence']) == "CM") {
		$residence = "CM";
	}
	else {
		$residence = "";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Work 14 - Benjamin Carpenter</title>
	<link rel="shortcut icon" href="faveicon.ico" mce_href="/faveicon.ico"/>
	<script language="JavaScript" src="script10.js"></script>
	<link rel="stylesheet" type="text/css" href="script03.css" />
</head>
<body>
	<p><a href="/projects/bcarpenter">Home</a></p>
	<h1>Validating a Form</h1>
	<form action="form.php" method="post">
		<label for="conf">
			Conference: <input type="radio" id="conf1" name="conf" onclick="selectLO()" value="ME" class="radio" <?php if ($conf == "ME") {echo 'checked';} ?> />
			Marriage Enhancement<input type="radio" id="conf2" name="conf" value="YL" class="radio" <?php if ($conf == "YL") {echo 'checked';} ?> />
			Youth Leadership<input type="radio" id="conf3" name="conf" value="DA" class="radio" <?php if ($conf == "DA") {echo 'checked';} ?>/>Donor Appreciation
		</label>
		<p><label for="regname">Registrant Name: 
  			<input type="text" size="30" name="regname" id="regname" class="reqd" value="<?= $regname ?>" />
   		</label></p>
   		<p><label for="residence">
   			Accomidations: <input type="radio" id="residence1" name="residence" value="CM" class="radio" <?php if ($residence == "CM") {echo 'checked';} ?> />
			Commuter<input type="radio" id="residence2" name="residence" value="LO" class="radio" <?php if ($residence == "LO") {echo 'checked';} ?> />Lodge
   		</label></p>
   		<p><label for="spouse">Spouse: 
  			<input type="text" size="30" name="spouse" id="spouse" value="<?= $spouse ?>"/>
   		</label></p>
   		<p><label for="adr1">Address Line 1: 
  			<input type="text" size="40" name="adr1" id="adr1" class="reqd" value="<?= $adr1 ?>" />
   		</label></p>
   		<p><label for="adr2">Address Line 2: 
  			<input type="text" size="40" name="adr2" id="adr2" value="<?= $adr2 ?>"/>
   		</label></p>
   		<p><label for="city">City: 
  			<input type="text" name="city" id="city" size="30" class="reqd" value="<?= $city ?>"/>
   		</label></p>
   		<p><label for="state">State: 
  			<input type="text" size="2" name="state" id="state" class="isState" value="<?= $state ?>"/>
   		</label></p>
   		<p><label for="zip">Zip: 
  			<input type="text" size="5" name="zip" id="zip" class="isZip" value="<?= $zip ?>"/>
   		</label></p>
   		<p><label for="cellnum">Cellphone Number: 
  			<input type="text" size="10" name="cellnum" id="cellnum" class="isCell" value="<?= $cellnum ?>" />
   		</label></p>
		<p><label for="email">Email Address:
			<input type="text" id="email1" name="email" size="50" class="email" value="<?= $email ?>"/>
  		</label></p>
		<p><label for="email2">Re-enter Email Address:
			<input type="text" id="email2" name="email2" size="50" class="email2" value="<?= $email2 ?>"/>
  		</label></p>
		<input type="submit" value="Submit Registration" />
		<button type="button" onclick="clearform()">Clear Form</button>
	</form>
</body></html>