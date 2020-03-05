<?php
  require("templates/header.html");
?>
<?php
  require("templates/nav.php");
?>
<?php
	if ($loggedin) {
		echo "<td valign=\"top\" width=\"632\"><p><img src=\"images/SlideRule_small.JPG\" alt=\"Slide Rule\"  /></p><p>For years the mark of engineers and scientists, the slide rule was replaced by electronic calculators beginning with the HP 35. HP legend says it that Bill Hewlett went to the design lab and asked for something that would replace a slide rule but fit in his shirt pocket (which a 12-inch slide rule could not). One of the engineers calmly walked up to Bill and measured his pocket.</p></td></tr></table>";
	}
	else {
   		echo ("<td valign=\"top\" bgcolor=\"#FFCC99\" >Please log in to use this function.</td></tr></table>");
	}
?>

</body></html>