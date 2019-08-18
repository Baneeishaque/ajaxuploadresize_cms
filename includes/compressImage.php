<?php
//Compress Image 
function compressImage($ext,$uploadedfile)
{
	if($ext=="jpg" || $ext=="jpeg" )
	{
	$src = imagecreatefromjpeg($uploadedfile);
	}
	else if($ext=="png")
	{
	$src = imagecreatefrompng($uploadedfile);
	}
	else if($ext=="gif")
	{
	$src = imagecreatefromgif($uploadedfile);
	}
	else
	{
	$src = imagecreatefrombmp($uploadedfile);
	}
																	
	list($width,$height)=getimagesize($uploadedfile);
	$tmp=imagecreatetruecolor(1920,804);
	imagecopyresampled($tmp,$src,0,0,0,0,1920,804,$width,$height);
	$filename = "uploads/bg1.jpg";
	imagejpeg($tmp,$filename,100);
	imagedestroy($tmp);
}
?>