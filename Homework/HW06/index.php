<?php
    $filetypetxt = file_get_contents('filetypes.txt');
    $target_dir = "uploads/";
    $approved_dir = "approved/";
    $target_file = $target_dir . basename(@$_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $ft = pathinfo($target_file,PATHINFO_EXTENSION);
    $FileType = strtolower($ft);
    $validfiletypes = explode(',', $filetypetxt);
    $check = False;
    $delete = "";
    $approve = "";
    if (@$_GET["delete"]) {
    	$delete = $_GET["delete"];
    }
    if (@$_GET["approve"]) {
    	$approve = $_GET["approve"];
    }
    $displaymsg = False;

    if ($delete != "") {
    	unlink ("uploads/" . $delete);
    	$displaymsg = True;
    	$message = "File was sucessfully deleted.";
    }

    if ($approve != "") {
    	$displaymsg = True;
    	$destination = "approved/" . $approve;
    	$orgin = "uploads/" . $approve;
    	if (copy ($orgin, $destination)) {
    		unlink ("uploads/" . $approve);
    		$message = "File was sucessfully approved.";
    	}
    	else {
    		$message = "There was an error approving the file, please try again.";
    	}
    }

    if ($target_file) {
    		$display = True;
    		$displaymsg = True;
    	}
    else {
    	$display = False;
    }
    // Check if filetype is allowed
    if ($display) {
    	if (isset($_POST["submit"])) {
        	foreach ($validfiletypes as $value) {
            	if ($FileType == $value) {
                	$check = True;
            	}
        	}
        	if ($check !== false) {
            	$uploadOk = 1;
        	}
        	else {
            	$uploadOk = 0;
        	}
        	if ($uploadOk == 1){
            	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                	$message = "Filetype is allowed - The file " . basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            	}
            	else {
                	$message = "Sorry, there was an error uploading your file.";
            	}
        	}
        	else {
                	$message = "Filetype is not allowed.";
            	}
    	}
    }

    function listuploads() {
    	global $target_dir, $validfiletypes;
    	$uploadsarray = scandir($target_dir);
    	foreach ($uploadsarray as $value) {
            if (substr($value, 0, 1) != ".") {
            	$filesize = filesize ("uploads/" . $value)/1024;
              	echo "<tr><td><a href=\"uploads/" . $value . "\">" . $value . "</td><td>" . round($filesize, 2, PHP_ROUND_HALF_UP) . "KB</td><td><a href=\"upload.php?approve=" . $value . "\">Approve</a>" . "</td><td><a href=\"upload.php?delete=" . $value . "\">Delete</a>" . "</td></tr>";
            }
    	}
	}

	function listapproved() {
    	global $approved_dir, $validfiletypes;
    	$approvedarray = scandir($approved_dir);
    	foreach ($approvedarray as $value) {
            if (substr($value, 0, 1) != ".") {
            	$filesize = filesize ("approved/" . $value)/1024;
              	echo "<tr><td><a href=\"approved/" . $value . "\">" . $value . "</a></td><td>" . round($filesize, 2, PHP_ROUND_HALF_UP) . "KB</td></tr>";
            }
    	}
	}

	function printfiletypes() {
		global $validfiletypes;
		echo $validfiletypes[0] . ", ";
		foreach ($validfiletypes as $key => $value) {
            if ($key != 0 and $key != count($validfiletypes) - 1)
            	echo ($validfiletypes[$key] . ", ");
        }
        echo "and " . $validfiletypes[count($validfiletypes) - 1] . ". ";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Work 06 - Benjamin Carpenter</title>
    <link rel="shortcut icon" href="http://hw.cs.southern.edu/favicon.ico" mce_href="http://hw.cs.southern.edu/favicon.ico"/>
</head>
<body>
    <p><a href="/projects/bcarpenter">Home</a></p>
    <h1>File Upload</h1>
    <p>Allowed filetypes: <?php printfiletypes() ?></p>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Upload your file here:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>
    <b><?php if ($displaymsg) { echo @$message; } ?></b>
    <table><tr>
    	<tr valign="top"><table border="1">
    		<tr><td colspan="2" align="center"><h2>Library</h2></td></tr>
    		<tr>
    			<th>File Name</th>
    			<th>Size</th>
    		</tr>
    		<?php listapproved() ?>
    	</table></tr>
    	<tr valign="top"><table border="1">
			<tr><td colspan="4" align="center"><h2>Uploads</h2><br /><b style="color:red;">--For Administrative use ONLY!!!--</b></td></tr>
			<tr>
				<th>File Name</th>
				<th>Size</th>
				<th>Approve</th>
				<th>Delete</th>
			</tr>
    		<?php listuploads() ?>
    	</table></tr>
    </tr></table>
    <p><a href="/projects/bcarpenter">Home</a></p>
</body>
</html>