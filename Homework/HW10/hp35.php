<?php
  require("templates/header.html");
?>
<?php
  require("templates/nav.php");
?>
<?php
	if ($loggedin) {
		echo "<td valign=\"top\" width=\"632\"><p><img src=\"images/HP35_3.JPG\" alt=\"HP 35 Calculator\"  /></p><p>The HP 35 was the first hand-held scientific calculator. At $395 in 1971, it cost the economic equivalent of $2,000 today. It was not programmable and took up to two seconds for some functions. Battery life was less than four hours. The processor was rated in kilohertz.</p></td></tr></table>";
	}
	else {
    	echo ("<td valign=\"top\" bgcolor=\"#FFCC99\" >Please log in to use this function.</td></tr></table>");
	}
?>
</body></html>