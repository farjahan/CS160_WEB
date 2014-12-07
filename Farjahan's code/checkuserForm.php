<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Upload Document</title>
<link rel="stylesheet" type="text/css" href="style/reset.css">
<link rel="stylesheet" type="text/css" href="style/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
</head>
<body>



<?php
include 'include/connect.php';
include 'include/utils.php';
session_start ();
if (! isset ( $_SESSION ['email'] )) {
	die ( 'not logged in' );
}

$email = $_SESSION ['email'];

if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	$password = $_POST ["password"];
	$fileinfo=$_POST["filePath"];
	$userInfo = getUserInfo ( $email, $dbh );
	if (isset($userInfo)) {
		if ($userInfo->login_attempts >= 3) {
			echo "account is locked";
		} else {
			if (strcmp($userInfo->password, $password ) == 0) {
				// Register $myusername, $mypassword and redirect to file "login_success.php"
				resetAttemptsForUserEmail($email, $dbh);
				$_SESSION ['email'] = $email;
				
					
				header ("location:readfile.php?filePath=$fileinfo");
					
				echo "login successfull";
				//todo redirect to the page
			} else {
				echo "Entered information did not match <b/><b/>";
				incrementLoginAttemptsForUserEmail($email, $dbh);
			}
		}
	} else {
		echo "User with email $email does not exist";
	}
	ob_end_flush ();
		
}
?>




<form id="form" method="post" enctype="multipart/form-data"
		action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	
			<?php 
			
			$filePath =$_GET['filePath'];
			?>

			
	<input type='hidden' name="filePath" value=" <?php echo $filePath; ?> " />		
 	<label>Enter Your Password: <input id="password" name="password">
		</label> <input type=submit value="submit"><br />




	</form>
	<!--Javascript-->
	<script type="text/javascript" src="script/jquery2.1.1.js"></script>
	<script type="text/javascript"
		src="DataTables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="script/jquery-ui.js"></script>
	<script type="text/javascript" src="script/main.js"></script>
</body>

</html>
