<?php
  require("templates/header.html");
?>
<?php
  require("templates/nav.php");
?>
<?php
	if ($loggedin) {
		echo "<td valign=\"top\" width=\"632\"><p><img src=\"images/Abacus_small.JPG\" alt=\"Abacus picture\" /></p><p>The abacus has been used for many hundreds of years. This is a Chinese abacus - a Japanese version has only one row of beads in the upper section. The abacus is descended from a counting board in which small rocks were manipulated along grooves in wood or stone.</p></td></tr></table>";
	}
	else {
    	echo ("<td valign=\"top\" bgcolor=\"#FFCC99\" >Please log in to use this function.</td></tr></table>");
  	}
?>

</body></html>