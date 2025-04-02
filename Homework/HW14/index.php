<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Work 14 - Benjamin Carpenter</title>
	<link rel="shortcut icon" href="faveicon.ico" mce_href="/faveicon.ico"/>
	<SCRIPT language="JavaScript" SRC="script10.js"></SCRIPT>
	<link rel="stylesheet" type="text/css" href="script03.css" />
</head>
<body>
	<p><a href="/projects/bcarpenter">Home</a></p>
	<h1>Validating a Form</h1>
	<form action="form.php" method="post">
		<label for="conf">
			Conference: <input type="radio" id="conf1" name="conf" onclick="selectLO()" value="ME" class="radio"  />
			Marriage Enhancement<input type="radio" id="conf2" name="conf" value="YL" class="radio"  />
			Youth Leadership<input type="radio" id="conf3" name="conf" value="DA" class="radio" />Donor Appreciation
		</label>
		<p><label for="regname">Registrant Name: 
  			<input type="text" size="30" name="regname" id="regname" class="reqd" value="" />
   		</label></p>
   		<p><label for="residence">
   			Accomidations: <input type="radio" id="residence1" name="residence" value="CM" class="radio"  />
			Commuter<input type="radio" id="residence2" name="residence" value="LO" class="radio"  />Lodge
   		</label></p>
   		<p><label for="spouse">Spouse: 
  			<input type="text" size="30" name="spouse" id="spouse" value=""/>
   		</label></p>
   		<p><label for="adr1">Address Line 1: 
  			<input type="text" size="40" name="adr1" id="adr1" class="reqd" value="" />
   		</label></p>
   		<p><label for="adr2">Address Line 2: 
  			<input type="text" size="40" name="adr2" id="adr2" value=""/>
   		</label></p>
   		<p><label for="city">City: 
  			<input type="text" name="city" id="city" size="30" class="reqd" value=""/>
   		</label></p>
   		<p><label for="state">State: 
  			<input type="text" size="2" name="state" id="state" class="isState" value=""/>
   		</label></p>
   		<p><label for="zip">Zip: 
  			<input type="text" size="5" name="zip" id="zip" class="isZip" value=""/>
   		</label></p>
   		<p><label for="cellnum">Cellphone Number: 
  			<input type="text" size="10" name="cellnum" id="cellnum" class="isCell" value="" />
   		</label></p>
		<p><label for="email">Email Address:
			<input type="text" id="email1" name="email" size="50" class="email" value=""/>
  		</label></p>
		<p><label for="email2">Re-enter Email Address:
			<input type="text" id="email2" name="email2" size="50" class="email2" value=""/>
  		</label></p>
		<input type="submit" value="Submit Registration" />
		<button type="button" onclick="clearform()">Clear Form</button>
	</form>
</body></html>