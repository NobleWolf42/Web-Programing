<?php
  if (isset($_POST['toaddress'])) {
    $to = $_POST['toaddress'];
    $toaddr = true;
  }
  else {
    $toaddr = false;
  }
  $subject = "E-Mail from Calculator Museum";
  if (isset($_POST['msgtext'])) {
    $message = $_POST['msgtext'];
    $mssg = true;
  }
  $from = "calculatormuseum@bencarpenterit.com";
  $headers = "From:" . $from;
  if ($toaddr and $mssg) {
    mail($to,$subject,$message,$headers);
  }

  require("templates/header.html");
  require("templates/nav.php");
  if ($loggedin) {
    echo ("<td valign=\"top\" bgcolor=\"#FFCC99\" ><p>Our fine collection of calculators is of limited interest, but we like it. To get information about a calculator, select a model on the left.</p><hr /><form name=\"emailform\" action=\"index.php\" method=\"post\">
 
  <p>You can send an email to anyone using this form.</p>

  <p>To: <input type=\"text\" name=\"toaddress\" size = \"80\" value =
  \"\" /></p>

  
  <p>Message: <textarea name=\"msgtext\"></textarea>
  <input type=\"submit\" value=\"Send Email\" />
  </p></form>");
  }
  else {
    echo ("<td valign=\"top\" bgcolor=\"#FFCC99\" >Please log in to use this function.</td></tr></table>");
  }
?>
</body></html>