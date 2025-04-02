<?php 
	include("dbdisp.php");
	$sql = "SELECT * FROM  `giftcard`";
	$response=$db->query($sql);
	$data = file_get_contents("updates.txt");
	$datalines = explode(PHP_EOL, $data);
	$count = 0;
	echo '<p><a href="/projects/bcarpenter/Homework/HW09">Main Page</a></p>';
	echo '<p>This program updates the database with the data from "updates.txt"</p>';

	foreach ($datalines as $datastring){
		$acctno = substr($datastring, 0, 6);
		$valuetoadd = substr($datastring, 6, 6);
		print "We need to update account number " . $acctno . ".<br>";
    	$sql1 = "SELECT * FROM `giftcard` WHERE `acctno` = ? LIMIT 1";
    	$res1 = $db->prepare($sql1);
    	$res1->execute(array($acctno));
    	print "Looking for " . $acctno . "<br>";
    	if ($res1->rowCount()>0) {
    		foreach($res1 as $res1r) {
   	    		$newbal = $res1r['value'] + $valuetoadd;
   	    		echo "Adding " . $valuetoadd . "($" . number_format((float)$valuetoadd/100, 2, '.', ',') . ") to the current balence of " . $res1r['value'] . "($" . number_format((float)$res1r['value']/100, 2, '.', ',') . ") for a total of " . $newbal . "($" . number_format((float)$newbal/100, 2, '.', ',') . ")<br>";
        		$sql2 = "UPDATE `giftcard` SET `value` = ? WHERE `acctno` = ? LIMIT 1";
        		$res2 = $db->prepare($sql2);
        		$res2->execute(array($newbal,$acctno));
        		if ($res2->rowCount()<>1) {
            		print "This value has alredy been updated.<br>";
         		}
    			else {
       				print "Update Sucessful!<br>";
       				$count = $count + 1;
    			}
    		}
    	}
    	else {
    		print "No such account number as " . $acctno . ".<br>";
    	}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Database</title>
	<link rel="shortcut icon" href="faveicon.ico" mce_href="/faveicon.ico"/>
</head>
<body>
	<p>We have update the balences for <?= $count ?> accounts.</p>
	<table border="1">
		<tr><th>Account Number</th><th>Name</th><th>Value (In USD)</th></tr>
		<?php printgiftcarddata() ?>
	</table>
	<p><a href="/projects/bcarpenter/Homework/HW09">Main Page</a></p>
</body>
</html>