<?php
session_start();
if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	include 'include/connect.php';
	$filename = $_POST ["filename"];
	$inputDate = $_POST ["expdate"];
	$expdate = date("Y-m-d", strtotime($inputDate));
	echo "$expdate ";
	
	$comment = $_POST ["comment"];
	//please change pathinfo
	$target_dir = "documents/";
	$filePath = $target_dir . basename ( $_FILES ["uploadfile"] ["name"] );
	$uploadOk = 1;
	echo "$filePath";
	if (file_exists ( $filePath )) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES ["uploadfile"] ["size"] > 10000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	echo "<br/>";
	echo $_FILES ['uploadfile'] ['tmp_name'];
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file ( $_FILES ["uploadfile"] ["tmp_name"], $filePath )) {
			echo "The file " . basename ( $_FILES ["uploadfile"] ["name"] ) . " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
        }
	date_default_timezone_set ( "America/Los_Angeles" );
	$t = time ();
	$uploadTime = (date ( "Y-m-d H:i:s", $t ));
	$uid = $_SESSION['uid'];
	$stmt = $dbh->prepare ( "INSERT INTO documents (uid, filename,expdate,comment,uploadTime,filePath) VALUES (?,?,?,?,?,?)" );
        $stmt->bindParam ( 1, $uid);
	$stmt->bindParam ( 2, $filename );
	$stmt->bindParam ( 3, $expdate );
	$stmt->bindParam ( 4, $comment );
	$stmt->bindParam ( 5, $uploadTime );
	$stmt->bindParam ( 6, $filePath );
	$stmt->execute ();
	
}

header( "refresh: 5; url= main.php" );

?>