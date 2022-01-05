<?php

	// echo "<pre>";
	// echo print_r($_FILES);
	// echo "</pre>";

	$filesize = $_FILES['photo']['size'];
	$filename = $_FILES['photo']['name'];

	// validation
	if ($_FILES['photo']['error'] > 0) {
		echo "error";
		exit;
	}
	// file size validation
	if ($_FILES['photo']['size'] > 2097152) {
		die('File size should be less than 2mb');
	}

	// file type validation
	$extensions = array("png", "jpg", "gif", "svg", "jpeg");

	// get the file extension
	$file_ext = explode(".", $filename); // convert string to array
	$file_ext = end($file_ext); // get the last element of the array

	// check if the file extension is valid
	if (in_array(strtolower($file_ext), $extensions) === false) {
		echo "Invalid file format";
		exit;
	}

	// temporary filename
	$tmp_dir_filename = $_FILES['photo']['tmp_name'];

	// destination dir
	$targetdir = "uploads/";
	$destination = $targetdir.$filename;

	// to move file from tmp to destination
	if(move_uploaded_file($tmp_dir_filename, $destination)){
		echo "File was successfully uploaded";
	}
	else{
		echo "Oops!, something happened";
	}

?>