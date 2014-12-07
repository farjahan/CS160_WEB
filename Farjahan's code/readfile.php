<?php
include 'include/connect.php';
include 'include/utils.php';
session_start ();
if (! isset ( $_SESSION ['email'] )) {
	die ( 'not logged in' );
}
$Path = trim ( $_GET ['filePath'], ' ' );
$path_parts = pathinfo ( "$Path" );
$directoryName = $path_parts ['dirname'];
$FileName = $path_parts ['filename'];
$FileExtension = $path_parts ['extension'];
$Base = $path_parts ['basename'];

// check user password/pin to view image/documents

// header( "refresh: 5; url= checkuserPassword.php" );

if ($FileExtension == "pdf") {
	
	$file = "$Path";
	$fp = fopen ( $file, "r" );
	
	header ( "Cache-Control: maxage=1" );
	header ( "Pragma: public" );
	header ( "Content-type: application/pdf" );
	header ( "Content-Disposition: inline; filename=" . $myFileName . "" );
	header ( "Content-Description: PHP Generated Data" );
	header ( "Content-Transfer-Encoding: binary" );
	header ( 'Content-Length:' . filesize ( $file ) );
	ob_clean ();
	flush ();
	while ( ! feof ( $fp ) ) {
		$buff = fread ( $fp, 1024 );
		print $buff;
	}
} else if ($FileExtension == "jpg") {
	$imagepath = "$Path";
	
	$image = imagecreatefromjpeg ( $imagepath );
	
	// get image height
	
	$imgheight = imagesy ( $image );
	
	// allocate color for image caption (white)
	
	$color = imagecolorallocate ( $image, 255, 255, 255 );
	
	// Add text to image bottom
	
	imagestring ( $image, 5, 100, $imgheight - 50, "September 2005", $color );
	
	header ( 'Content-Type: image/jpeg' );
	
	imagejpeg ( $image );
}

?>










