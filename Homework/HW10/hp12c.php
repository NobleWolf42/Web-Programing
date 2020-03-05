<?php
  require("templates/header.html");
?>
<?php
  require("templates/nav.php");
?>
<?php
	if ($loggedin) {
		echo "<td valign=\"top\" width=\"632\"><p><img src=\"images/12c_small.jpg\" alt=\"HP 12C Calculator\" /></p><p>The HP 12C has been in continuous production longer than any other calculator, largely because it is often the standard for business school finance courses. Its price has held steady over the years.</p></td></tr></table>";
	}
  	else {
    	echo ("<td valign=\"top\" bgcolor=\"#FFCC99\" >Please log in to use this function.</td></tr></table>");
  	}
 ?>
</body></html>