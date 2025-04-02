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
		<input type="number" min="0" max="255" name="anumber" value=47>.
		<input type="number" min="0" max="255" name="bnumber" value=220>.
		<input type="number" min="0" max="255" name="cnumber" value=11>.
		<input type="number" min="0" max="255" name="dnumber" value=4>
		</p>
		<p>Subnet Size: 
			<input type="radio" name="subnet" value="255.255.255.0" checked="checked"> /24</input>
            <input type="radio" name="subnet" value="255.255.255.128"> /25</input>
            <input type="radio" name="subnet" value="255.255.255.192"> /26</input>
            <input type="radio" name="subnet" value="255.255.255.224"> /27</input>
            <input type="radio" name="subnet" value="255.255.255.240"> /28</input>
            <input type="radio" name="subnet" value="255.255.255.248"> /29</input>
            <input type="radio" name="subnet" value="255.255.255.252"> /30</input>
        </p>
		<p><input type="submit" value="Caculate" /></p>
	</form>
	<table border="2">
		<tr><th></th><th>Decimal</th><th>Hex</th><th>Binary</th><th>Dotted Decimal</th></tr>
		<tr><th>Address</th><td>802949892</td><td>2fdc0b04</td><td>00101111110111000000101100000100</td><td>47.220.11.4</td></tr>
		<tr><th>Subnet Mask</th><td>4294967040</td><td>ffffff00</td><td>11111111111111111111111100000000</td><td>255.255.255.0</td></tr>
		<tr><th>Broadcast</th><td>802950143</td><td>2fdc0bff</td><td>00101111110111000000101111111111</td><td>47.220.11.255</td></tr>
		<tr><th>Lowest</th><td>802949889</td><td>2fdc0b01</td><td>00101111110111000000101100000001</td><td>47.220.11.1</td></tr>
		<tr><th>Highest</th><td>802950142</td><td>2fdc0bfe</td><td>00101111110111000000101111111110</td><td>47.220.11.254</td></tr>
	</table>
	<p>The Number of Useable IP's is: 254</p>
	<p><a href="/projects/bcarpenter">Home</a></p>
</body>
</html>