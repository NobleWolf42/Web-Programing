<?php
	$cookie_name = "calculatormuseum";
	$loginfail = False;
	if(!isset($_COOKIE[$cookie_name])) {
		$loggedin = false;
	}
	else {
		$usernamefromcookietf = $_COOKIE[$cookie_name];
		if (substr($usernamefromcookietf, 0, 4) == "fail") {
			$loginfail = true;
			$loggedin = false;
			$usernamefromcookie = substr($_COOKIE[$cookie_name], 4);
		}
		else {
			$loginfail = false;
			$loggedin = true;
			$usernamefromcookie = $_COOKIE[$cookie_name];
		}
	}

	echo "<tr><td valign=\"top\" align=\"center\" bgcolor=\"#FFFF33\">";
	if ($_SERVER['HTTPS']) {
		echo ("It is " . date("g:i A") . "<br />" . date("F j, Y"));
		if ($loggedin) {
			echo ("<form name=\"loginform\"action='r.php' method='post'>Logged in as<br>" . $usernamefromcookie . "<br><input name='logout' type='submit' value='Log Out'></form><br><br><a href=\"index.php\">Home</a><br /><br /><a href=\"hp12c.php\">HP 12C</a><br /><a href=\"Abacus.php\">Abacus</a><br /><a href=\"hp35.php\">HP 35</a><br /><a href=\"SlideRule.php\">Slide Rule</a><br />");
		}
		elseif ($loginfail) {
			echo ("<br><br><h2 color=\"red\">Invalid Login</h2><br><br><form name=\"loginform\" action='r.php' method='post'>Please Log In<br>Username:<br><input type='text' name='username' value='" . $usernamefromcookie . "'><br><br><br>Password (For This Example Can Be Blank):<br><input type='password' name='password'><br><input name='login' type='submit' value='Log In'></form>");
		}
		else {
			echo ("<br><br><form name=\"loginform\" action='r.php' method='post'>Please Log In<br>Username:<br><input type='text' name='username'><br><br><br>Password (For this example can be left blank):<br><input type='password' name='password'><br><input name='login' type='submit' value='Log In'></form>");
		}
	}
	else {
    	echo ("Please click here to enable a secure connection: <a href=\"https://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "\">Secure Page</a></td>");
	}
?>