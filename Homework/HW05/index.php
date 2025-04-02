<?php
	$someextras2 = False;

	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$needus = "";
	}
	else {
		$username = "";
		$needus = "Need->";
	}

	/*if (isset($_POST['password'])) {
		$password = $_POST['password'];
		$imap_login = @imap_open("{imap.southern.edu:993/imap/ssl/novalidate-cert}", $username."@southern.edu", $password, OP_HALFOPEN, 1);
		if ($imap_login) {
			$needps = "Valid";
		}
		else {
			$needps = "Invalid";
		}
	}
	else {
		$password = "";
		$needps = "Need->";
	}*/

	if (isset($_POST['cellphone'])) {
		$cellphone = $_POST['cellphone'];
		$needcp = "";
		$showcpn = True;
		$cellphonecheck = str_replace (array(" ", "(", ")", "-") , "" , $cellphone);
		if (strlen($cellphonecheck) == 7 or strlen($cellphonecheck) == 10) {
			$cellphonedis = $cellphonecheck;
			$needcp = "Valid";
		}
		else {
			$needcp = "Invalid";
			$cellphonedis = "";
		}
	}
	else {
		$needcp = "Need->";
		$showcpn = False;
	}

	if (isset($_POST['chips'])) {
		$chips = $_POST['chips'];
		$needch = "";
	}
	else {
		$chips = "N/A";
		$needch = "Need->";
	}

	if (isset($_POST['beans'])) {
		$beans = $_POST['beans'];
		$needbs = "";
	}
	else {
		$beans = "";
		$needbs = "Need->";
	}

	if (isset($_POST['sourc'])) {
		$sourc = $_POST['sourc'];
		$needsc = "";
	}
	else {
		$sourc = "";
		$needsc = "Need->";
	}

	if (isset($_POST['dicet'])) {
		$dicet = $_POST['dicet'];
	}
	else {
		$dicet = "";
	}

	if (isset($_POST['shredc'])) {
		$shredc = $_POST['shredc'];
	}
	else {
		$shredc = "";
	}

	if (isset($_POST['chopl'])) {
		$chopl = $_POST['chopl'];
	}
	else {
		$chopl = "";
	}

	if (isset($_POST['sliceo'])) {
		$sliceo = $_POST['sliceo'];
	}
	else {
		$sliceo = "";
	}

	if (isset($_POST['bacos'])) {
		$bacos = $_POST['bacos'];
	}
	else {
		$bacos = "";
	}

	if (isset($_POST['salsa'])) {
		$salsa = $_POST['salsa'];
		$needsl = "";
	}
	else {
		$salsa = "";
		$needsl = "Need->";
	}

	if (isset($_POST['onions'])) {
		$onions = $_POST['onions'];
		$needon = "";
	}
	else {
		$onions = "";
		$needon = "Need->";
	}

	if (($beans != "Vegetarian") and ($sourc != "Regular" or $sourc != "Low-Fat") and ($shredc == "")) {
		$vegan = "Yes";
	}
	else {
		$vegan = "No";
	}

	function extras()
	{	
		$someextras = False;
		global $dicet, $shredc, $chopl, $sliceo, $bacos, $someextras;
		

		if ($dicet == "Diced Tomatoes") {
			echo "Diced Tomatoes<br />";
			$someextras = True;
		}
		if ($shredc == "Shreded Cheese") {
			echo "Shreded Cheese<br />";
			$someextras = True;
		}
		if ($chopl == "Chopped Lettuce") {
			echo "Chopped Lettuce<br />";
			$someextras = True;
		}
		if ($sliceo == "Sliced Olives") {
			echo "Sliced Olives<br />";
			$someextras = True;
		}
		if ($bacos == "Bacos®") {
			echo "Bacos®<br />";
			$someextras = True;
		}
		if (!$someextras) {
			echo "None<br />";
		}
	}

	if ($needcp == "Valid" /*and $needps == "Valid"*/ and $chips != "N/A" and $beans != "" and $sourc != "" and $salsa != "" and $onions != "") {
		$done = True;
	}
	else {
		$done = False;
	}

	if ($dicet == "Diced Tomatoes") {
		$dt =  "Diced Tomatoes
";
		$someextras2 = True;
	}
	else{
		$dt = "";
	}
	if ($shredc == "Shreded Cheese") {
		$sc = "Shreded Cheese
";
		$someextras2 = True;
	}
	else {
		$sc = "";
	}
	if ($chopl == "Chopped Lettuce") {
		$cl =  "Chopped Lettuce
";
		$someextras2 = True;
	}
	else {
		$cl = "";
	}
	if ($sliceo == "Sliced Olives") {
		$so = "Sliced Olives
";
		$someextras2 = True;
	}
	else {
		$so = "";
	}
	if ($bacos == "Bacos®") {
		$bco = "Bacos
";
		$someextras2 = True;
	}
	else {
		$bco = "";
	}
	if (!$someextras2) {
		$na = "None
";
	}
	else {
		$na = "";
	}

	function mailer()
	{
		global $username, $password, $cellphonedis, $chips, $beans, $sourc, $dt, $sc, $cl, $so, $bco, $na, $salsa, $onions, $vegan, $done;

		$chip = str_replace ('®', "" , $chips);

		if ($done) {
			//Email to customer
			$to = $username;
			$subject = "Your Haystack Order";
			$message = "--Report--
Cell Phone: " . $cellphonedis . "
Chips: " . $chip . "
Beans: " . $beans . "
Sour Cream: " . $sourc . "
Salsa: " . $salsa . "
Onions: " . $onions . "
Vegan? " . $vegan . "
Extras:
" . $dt .
$sc .
$cl .
$so .
$bco .
$na;

/*Username: " . $username . "
And This is How easy it would be to get your password, all I have to do is send this part of the e-mail to my inbox. (Don't worry, you can look at my code and see I don't have it set up so I see the password.)
//Southern E-mail: " . $username . "@southern.edu
//Southern Password: " . $password . "
//Homework Server Username: " . $_SERVER['PHP_AUTH_USER'] . "
Homework Server Password: " . $_SERVER['PHP_AUTH_PW'];*/

			$from = "lunch@bencarpenterit.com";
			$headers = "From:" . $from;
			mail($to,$subject,$message,$headers);
		}
		else {
			echo "Not all the required feilds have been completed, Please Try Again.";
		}
	}

	if (isset($_POST['valmail']) && $_POST['valmail'] == "Send Message") {
		mailer();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Work 05 - Benjamin Carpenter</title>
	<link rel="shortcut icon" href="faveicon.ico" mce_href="/faveicon.ico"/>
</head>
<body>
	<p><a href="/projects/bcarpenter">Home</a></p>
	<h1>Haystack Order Form</h1>
	<form action="" method="post">
		<table>
			<tr><td><?= $needus ?></td><td>E-Mail: </td><td><input type="text" name="username" value="<?= $username ?>"></td></tr>
			<!--<tr><td><= $needps ?></td><td>Password: </td><td><input type="password" name="password" value="><= $password ?>"></td></tr>-->
			<tr><td><?= $needcp ?></td><td>Cell Phone: </td><td><input type="text" name="cellphone" value="<?php if ($showcpn == True) {echo $cellphone;} ?>"></td></tr>
			<tr><td><?= $needch ?></td><td>Chips: </td><td><select name="chips">
																<option value="N/A" <?php if(!isset($chips) || (isset($chips) && $chips == 'N/A')) echo ' selected="true"'?> disabled="disabled">Please Select</option>
																<option value="Yellow Fritos®" <?php if(!isset($chips) || (isset($chips) && $chips == 'Yellow Fritos®')) echo ' selected="true"'?>>Yellow Fritos®</option>
																<option value="White Doritos®" <?php if(!isset($chips) || (isset($chips) && $chips == 'White Doritos®')) echo ' selected="true"'?>>White Doritos®</option>
																<option value="Rice" <?php if(!isset($chips) || (isset($chips) && $chips == 'Rice')) echo ' selected="true"'?>>Rice</option>
																<option value="None" <?php if(!isset($chips) || (isset($chips) && $chips == 'None')) echo ' selected="true"'?>>None</option>
															</select></td></tr>
			<tr><td><?= $needbs ?></td><td>Beans: </td><td><input type="radio" name="beans" value="None" <?php if(!isset($beans) || (isset($beans) && $beans == 'None')) echo ' checked="checked"'?>>None<input type="radio" name="beans" value="Vegetarian" <?php if(!isset($beans) || (isset($beans) && $beans == 'Vegetarian')) echo ' checked="checked"'?>>Vegetarian<input type="radio" name="beans" value="Vegan" <?php if(!isset($beans) || (isset($beans) && $beans == 'Vegan')) echo ' checked="checked"'?>>Vegan</td></tr>
			<tr><td><?= $needsc ?></td><td>Sour Cream: </td><td><input type="radio" name="sourc" value="None" <?php if(!isset($sourc) || (isset($sourc) && $sourc == 'None')) echo ' checked="checked"'?>>None<input type="radio" name="sourc" value="Regular" <?php if(!isset($sourc) || (isset($sourc) && $sourc == 'Regular')) echo ' checked="checked"'?>>Regular<input type="radio" name="sourc" value="Low-Fat" <?php if(!isset($sourc) || (isset($sourc) && $sourc == 'Low-Fat')) echo ' checked="checked"'?>>Low-Fat<input type="radio" name="sourc" value="Vegan" <?php if(!isset($sourc) || (isset($sourc) && $sourc == 'Vegan')) echo ' checked="checked"'?>>Vegan</td></tr>
			<tr><td>			  </td><td>Diced Tomatos: </td><td><input type="checkbox" name="dicet" value="Diced Tomatoes" <?php if(!isset($dicet) || (isset($dicet) && $dicet == 'Diced Tomatoes')) echo ' checked="checked"'?>></td></tr>
			<tr><td>			  </td><td>Shredded Cheese: </td><td><input type="checkbox" name="shredc" value="Shreded Cheese" <?php if(!isset($shredc) || (isset($shredc) && $shredc == 'Shreded Cheese')) echo ' checked="checked"'?>></td></tr>
			<tr><td>			  </td><td>Chopped Lettuce: </td><td><input type="checkbox" name="chopl" value="Chopped Lettuce" <?php if(!isset($chopl) || (isset($chopl) && $chopl == 'Chopped Lettuce')) echo ' checked="checked"'?>></td></tr>
			<tr><td>			  </td><td>Sliced Olives: </td><td><input type="checkbox" name="sliceo" value="Sliced Olives" <?php if(!isset($sliceo) || (isset($sliceo) && $sliceo == 'Sliced Olives')) echo ' checked="checked"'?>></td></tr>
			<tr><td>			  </td><td>Bacos®: </td><td><input type="checkbox" name="bacos" value="Bacos®" <?php if(!isset($bacos) || (isset($bacos) && $bacos == 'Bacos®')) echo ' checked="checked"'?>></td></tr>
			<tr><td><?= $needsl ?></td><td>Salsa: </td><td><input type="radio" name="salsa" value="None" <?php if(!isset($salsa) || (isset($salsa) && $salsa == 'None')) echo ' checked="checked"'?>>None<input type="radio" name="salsa" value="Mild" <?php if(!isset($salsa) || (isset($salsa) && $salsa == 'Mild')) echo ' checked="checked"'?>>Mild<input type="radio" name="salsa" value="Hot" <?php if(!isset($salsa) || (isset($salsa) && $salsa == 'Hot')) echo ' checked="checked"'?>>Hot</td></tr>
			<tr><td><?= $needon ?></td><td>Onions :</td><td><input type="radio" name="onions" value="None" <?php if(!isset($onions) || (isset($onions) && $onions == 'None')) echo ' checked="checked"'?>>None<input type="radio" name="onions" value="White" <?php if(!isset($onions) || (isset($onions) && $onions == 'White')) echo ' checked="checked"'?>>White<input type="radio" name="onions" value="Green" <?php if(!isset($onions) || (isset($onions) && $onions == 'Green')) echo ' checked="checked"'?>>Green</td></tr>
		</table>
		<input type="submit" name="valmail" value="Validate Form" />
		<input type="submit" name="valmail" value="Send Message" style=<?php if (!$done) {echo '"display:none;"';} ?>/>
	</form>
	<!-- <table border="1"> -->
		--Report--<hr />
		E-Mail: <?= $username ?><hr />
		Cell Phone: <?php if ($showcpn == True) {echo $cellphonedis;} ?><hr />
		Chips: <?= $chips ?><hr />
		Beans: <?= $beans ?><hr />
		Sour Cream: <?= $sourc ?><hr />
		Extras: <br />
		<?= extras() ?><hr />
		Salsa: <?= $salsa ?><hr />
		Onions: <?= $onions ?><hr />
		Vegan? <?= $vegan ?><hr /> 
	<!-- </table> -->
	<p><a href="/projects/bcarpenter">Home</a></p>
</body>
</html>