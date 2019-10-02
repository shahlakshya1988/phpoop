<?php 
if(isset($_POST["file_upload"])){
	echo "<pre>",print_r($_FILES),"</pre><br>";
	echo "<br><br><br>";
	echo "<pre>",print_r($_FILES["myfile"]),"</pre><br>";
	echo "<br>******************<br>";
	$file_name = $_FILES["myfile"]["name"];
	$file_size = $_FILES["myfile"]["size"];
	$file_tmp_name = $_FILES["myfile"]["tmp_name"];
	$file_error = $_FILES["myfile"]["error"];
	$file_type = $_FILES["myfile"]["type"];
	$destination = __DIR__.DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR.strtolower($file_name);
	if(move_uploaded_file($file_tmp_name, $destination)){
		var_dump("File Uploaded Successfully");
	}else{
		var_dump("Error In Uploading File");
	}

}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>File Uploads</title>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<div>
			<input type="file" name="myfile" id="myfile">
		</div>
		<div>
			<input type="submit" value="Upload File" name="file_upload">
		</div>
	</form>
</body>
</html>