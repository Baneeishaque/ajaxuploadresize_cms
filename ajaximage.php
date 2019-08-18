<?php
error_reporting(0);

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP","PSD");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
	include_once 'includes/getExtension.php';
	$imagename = $_FILES['photoimg']['name'];
	$size = $_FILES['photoimg']['size'];			
	if(strlen($imagename))
	{
		$ext = strtolower(getExtension($imagename));
		if(in_array($ext,$valid_formats))
		{
		
				$uploadedfile = $_FILES['photoimg']['tmp_name'];
				include 'includes/compressImage.php';
				compressImage($ext,$uploadedfile);		
		}
		else
		echo "Invalid file format..";	
	}
	else
	echo "Please select image..!";
	exit;
}
?>