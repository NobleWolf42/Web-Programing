<?php
	$an = $_POST['anumber'];
	$bn = $_POST['bnumber'];
	$cn = $_POST['cnumber'];
	$dn = $_POST['dnumber'];
	$ann = $an;
	$bnn = $bn;
	$cnn = $cn;
	$dnn = $dn;
	$ipnum = 0;
	$bcnum = -1;
	$iparray = array();
	$bcarray = array();
	$abi = "";
	$bbi = "";
	$cbi = "";
	$dbi = "";
	$snbi2 = "";
	$bcbi = "";
	$lbi = "";
	$hbi = "";
	$subnet = $_POST['subnet'];
	$sn1 = 255;
	$sn2 = 255;
	$sn3 = 255;
	$sn4 = substr($subnet, 12);
	$snn4 = $sn4;
	$snbi1 = "111111111111111111111111";
	$usefularray = array(128,64,32,16,8,4,2,1);


	foreach ($usefularray as $bispot) {
		if ($ann >= $bispot) {
			$abi .= 1;
			$ann = $ann - $bispot;
		}
		else {
			$abi .= 0;
		}
	}

	foreach ($usefularray as $bispot) {
		if ($bnn >= $bispot) {
			$bbi .= 1;
			$bnn = $bnn - $bispot;
		}
		else {
			$bbi .= 0;
		}
	}
	
	foreach ($usefularray as $bispot) {
		if ($cnn >= $bispot) {
			$cbi .= 1;
			$cnn = $cnn - $bispot;
		}
		else {
			$cbi .= 0;
		}
	}

	foreach ($usefularray as $bispot) {
		if ($dnn >= $bispot) {
			$dbi .= 1;
			$dnn = $dnn - $bispot;
		}
		else {
			$dbi .= 0;
		}
	}


	foreach ($usefularray as $bispot) {
		if ($snn4 >= $bispot) {
			$snbi2 .= 1;
			$snn4 = $snn4 - $bispot;
		}
		else {
			$snbi2 .= 0;
		}
	}


	if ($subnet == "255.255.255.0") {
		$useips = 254;
		$bcend = 255;
	}
	else if ($subnet == "255.255.255.128") {
		$useips = 126;
	}
	else if ($subnet == "255.255.255.192") {
		$useips = 62;
	}
	else if ($subnet == "255.255.255.224") {
		$useips = 30;
	}
	else if ($subnet == "255.255.255.240") {
		$useips = 14;
	}
	else if ($subnet == "255.255.255.248") {
		$useips = 6;
	}
	else if ($subnet == "255.255.255.252") {
		$useips = 2;
	}

	$snval = $useips + 2;

	if ($snval != 256) {
		while ($ipnum < 256) {
			$ipnum = $ipnum + $snval;
			array_push($iparray, $ipnum);
		}
		while ($bcnum < 255) {
			$bcnum = $bcnum + $snval;
			array_push($bcarray, $bcnum);
		}
		foreach ($iparray as $key => $value) {
			if (!isset($bcend)) {
				if ($dn < $value) {
					$bcend = $bcarray[$key];
				}
			}
		}
	}


	$highend = $bcend - 1;
	$lowend = $highend - ($useips - 1);
	$bcend2 = $bcend;
	$highend2 = $highend;
	$lowend2 = $lowend;

	
	foreach ($usefularray as $bispot) {
		if ($bcend2 >= $bispot) {
			$bcbi .= 1;
			$bcend2 = $bcend2 - $bispot;
		}
		else {
			$bcbi .= 0;
		}
	}
	
	
	foreach ($usefularray as $bispot) {
		if ($lowend2 >= $bispot) {
			$lbi .= 1;
			$lowend2 = $lowend2 - $bispot;
		}
		else {
			$lbi .= 0;
		}
	}

	
	foreach ($usefularray as $bispot) {
		if ($highend2 >= $bispot) {
			$hbi .= 1;
			$highend2 = $highend2 - $bispot;
		}
		else {
			$hbi .= 0;
		}
	}
	

	$addrDD = $an . "." . $bn . "." . $cn . "." . $dn;
	$snmDD = $subnet;
	$bcastDD = $an . "." . $bn . "." . $cn . "." . $bcend;
	$lowDD = $an . "." . $bn . "." . $cn . "." . $lowend;
	$highDD = $an . "." . $bn . "." . $cn . "." . $highend;

	$addrDec = ($an * 16777216) + ($bn * 65536) + ($cn * 256) + ($dn);
	$snmDec = ($sn1 * 16777216) + ($sn2 * 65536) + ($sn3 * 256) + ($sn4);
	$bcastDec = ($an * 16777216) + ($bn * 65536) + ($cn * 256) + ($bcend);
	$lowDec = ($an * 16777216) + ($bn * 65536) + ($cn * 256) + ($lowend);
	$highDec = ($an * 16777216) + ($bn * 65536) + ($cn * 256) + ($highend);

	$addrHex = dechex($addrDec);
	$snmHex = dechex($snmDec);
	$bcastHex = dechex($bcastDec);
	$lowHex = dechex($lowDec);
	$highHex = dechex($highDec);
	
	$addrBi = $abi . $bbi . $cbi . $dbi;
	$snmBi = $snbi1 . $snbi2;
	$bcastBi = $abi . $bbi . $cbi . $bcbi;
	$lowBi = $abi . $bbi . $cbi . $lbi;
	$highBi = $abi . $bbi . $cbi . $hbi;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Work 03 - Benjamin Carpenter</title>
	<link rel="shortcut icon" href="faveicon.ico" mce_href="/faveicon.ico"/>
</head>
<body>
	<p><a href="/projects/bcarpenter">Home</a></p>
	<h1>IP Calculator</h1>
	<form action="submit.php" method="post">
		<p>IP Address: 
		<input type="number" min="0" max="255" name="anumber" value=<?= $an ?>>.
		<input type="number" min="0" max="255" name="bnumber" value=<?= $bn ?>>.
		<input type="number" min="0" max="255" name="cnumber" value=<?= $cn ?>>.
		<input type="number" min="0" max="255" name="dnumber" value=<?= $dn ?>>
		</p>
		<p>Subnet Size: 
			<input type="radio" name="subnet" value="255.255.255.0" <?php if(!isset($subnet) || (isset($subnet) && $subnet == '255.255.255.0')) echo ' checked="checked"'?>> /24</input>
            <input type="radio" name="subnet" value="255.255.255.128" <?php if(!isset($subnet) || (isset($subnet) && $subnet == '255.255.255.128')) echo ' checked="checked"'?>> /25</input>
            <input type="radio" name="subnet" value="255.255.255.192" <?php if(!isset($subnet) || (isset($subnet) && $subnet == '255.255.255.192')) echo ' checked="checked"'?>> /26</input>
            <input type="radio" name="subnet" value="255.255.255.224" <?php if(!isset($subnet) || (isset($subnet) && $subnet == '255.255.255.224')) echo ' checked="checked"'?>> /27</input>
            <input type="radio" name="subnet" value="255.255.255.240" <?php if(!isset($subnet) || (isset($subnet) && $subnet == '255.255.255.240')) echo ' checked="checked"'?>> /28</input>
            <input type="radio" name="subnet" value="255.255.255.248" <?php if(!isset($subnet) || (isset($subnet) && $subnet == '255.255.255.248')) echo ' checked="checked"'?>> /29</input>
            <input type="radio" name="subnet" value="255.255.255.252" <?php if(!isset($subnet) || (isset($subnet) && $subnet == '255.255.255.252')) echo ' checked="checked"'?>> /30</input>
        </p>
		<p><input type="submit" value="Caculate" /></p>
		<table border="2">
			<tr><th></th><th>Decimal</th><th>Hex</th><th>Binary</th><th>Dotted Decimal</th></tr>
			<tr><th>Address</th><td><?= $addrDec ?></td><td><?= $addrHex ?></td><td><?= $addrBi ?></td><td><?= $addrDD ?></td></tr>
			<tr><th>Subnet Mask</th><td><?= $snmDec ?></td><td><?= $snmHex ?></td><td><?= $snmBi ?></td><td><?= $snmDD ?></td></tr>
			<tr><th>Broadcast</th><td><?= $bcastDec ?></td><td><?= $bcastHex ?></td><td><?= $bcastBi ?></td><td><?= $bcastDD ?></td></tr>
			<tr><th>Lowest</th><td><?= $lowDec ?></td><td><?= $lowHex ?></td><td><?= $lowBi ?></td><td><?= $lowDD ?></td></tr>
			<tr><th>Highest</th><td><?= $highDec ?></td><td><?= $highHex ?></td><td><?= $highBi ?></td><td><?= $highDD ?></td></tr>
		</table>
	</form>
	<p>The Number of Useable IP's is: <?= $useips ?></p>
	<p><a href="/projects/bcarpenter">Home</a></p>
</body>
</html>