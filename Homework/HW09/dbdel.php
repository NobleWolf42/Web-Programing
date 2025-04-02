<?php 
	include("../../sqlpassword.php");
	$db = new PDO('mysql:host=localhost;dbname=bencarpenterit;charset=utf8', $id, $password);
	$sql = "SELECT * FROM  `giftcard`";
	$response = $db->query($sql);
	$data = file_get_contents("delnums.txt");
	$datalines = explode(PHP_EOL, $data);
	$count = 0;
	echo '<p><a href="/projects/bcarpenter/Homework/HW09">Main Page</a></p>';
	echo '<p>This program deletes the data from "delnums.txt"</p>';

	foreach ($datalines as $acctno){
		print "We need to delete account number " . $acctno . "<br>";
    	$sql1 = "SELECT * FROM `giftcard` WHERE `acctno` = ? LIMIT 0, 30";
    	$res1 = $db->prepare($sql1);
    	$res1->execute(array($acctno));
    	print "Looking for " . $acctno . "<br>";
    	if ($res1->rowCount()>0) {
    		foreach($res1 as $res1r) {
   	    		$accttodel = $acctno;
        		$sql2 = "DELETE FROM `giftcard` WHERE `acctno` = ?";
        		$res2 = $db->prepare($sql2);
        		$res2->execute(array($accttodel));
        		if ($res2->rowCount()<>1) {
            		print "There was an error.<br>";
         		}
    			else {
       				print "Delete Sucessful!<br>";
       				$count = $count + 1;
    			}
    		}
    	}
    	else {
    		print "No such account number as " . $acctno . ".<br>";
    	}
	}
		
	include("dbdisp.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Delete Selected Entries</title>
	<link rel="shortcut icon" href="/faveicon.ico" mce_href="/faveicon.ico"/>
</head>
<body>
	<p>We have deleted <?= $count ?> accounts from the table.</p>
	<table border="1">
		<tr><th>Account Number</th><th>Name</th><th>Value (In USD)</th></tr>
		<?php printgiftcarddata() ?>
	</table>
	<p><a href="/projects/bcarpenter/Homework/HW09">Main Page</a></p>
</body>
</html>