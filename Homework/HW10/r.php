<?php
	$cookie_name = "calculatormuseum";
  	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$cookie_value = $username;
	    setcookie($cookie_name, $cookie_value, time() + (60), "/");
	}
	else {
		$username = "";
		$cookie_value = "fail" . $username;
	    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	}	

	/*if (isset($_POST['password'])) {
	    $password = $_POST['password'];
	    $imap_login = @imap_open("{imap.southern.edu:993/imap/ssl/novalidate-cert}", $username."@southern.edu", $password, OP_HALFOPEN, 1);
		if ($imap_login) {
	    	$cookie_value = $username;
	    	setcookie($cookie_name, $cookie_value, time() + (60), "/");
	    }
	    else {
	    	$cookie_value = "fail" . $username;
	    	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	    }
	}*/
	if (isset($_POST["logout"])) {
	    $cookie_value = "";
	    setcookie($cookie_name, $cookie_value, time() + (0), "/");
	}
?>
<script>window.location.replace("index.php");</script>