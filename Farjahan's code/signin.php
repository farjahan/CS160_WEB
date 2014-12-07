<!DOCTYPE html>
<html>
<head>
<title>Sign In</title>
<link rel="stylesheet" type="text/css" href="style/reset.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
       
       
<?php
function singInVaidation(){

include 'include/connect.php';
include 'include/utils.php';

session_start ();
if ($_SERVER ["REQUEST_METHOD"] == "POST") {

	
	// email and password sent from form
	$email = $_POST ['email'];
	//echo "'$email' uerentered email<b/>";
	$password = $_POST ['password'];
	//echo "'$password'user entered password<b/>";
	
	// To protect MySQL injection (more detail about MySQL injection)
		
	$userInfo = getUserInfo ( $email, $dbh );
	// If result matched $myusername and $mypassword, table row must be 1 row
	if (isset($userInfo)) {
		if ($userInfo->login_attempts >= 3) {
			echo "account is locked";
		} else {
			if (strcmp($userInfo->password, $password ) == 0) {
				// Register $myusername, $mypassword and redirect to file "login_success.php"
				resetAttemptsForUserEmail($email, $dbh);
				$_SESSION ['email'] = $email;
				$_SESSION ['uid'] = $userInfo->uid;
				
				header ( "location:main.php" );
				
				echo "login successfull";
				//todo redirect to the page
			} else {
				echo "Entered information did not match";
				incrementLoginAttemptsForUserEmail($email, $dbh);
			}
		}
	} else {
		echo "User with email $email does not exist";
	}
	ob_end_flush ();
	
}
}
?>
	
       
       
    </head>
<body>
	<div id="outter">
		<div id="top">
			<div id="leftheader">
				<a class="headlink" href="">PVault</a>
			</div>
			<div id="secondleftheader">
				<a class="headlink" href="">Main</a>
			</div>
			<div id="rightheader">
				<a class="headlink" href="index.html"> Register </a>
			</div>
		</div>
		<div id="container">
			<div id="emaillogin">
				<div id="logintitle">Sign In</div>
				<div id="register">
					<!-- This is a form for register a new accont -->
					<form method="POST" name="inputform"
						action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>">
						<!-- Email Address -->
                            
                             <?php 
    
    					singInVaidation();
   
   									 ?>
                            
                            <div>
							<input type="text" id="email" name="email" class="rinput"
								placeholder="Email Address" />
						</div>
						<!-- Password -->
						<div>
							<input type="password" id="password" name="password"
								class="rinput" placeholder="Password" />
						</div>
						<div id="butt">
							<input type="submit" class="createacc" value="Log In" />
						</div>
					</form>
				</div>
				<div class="forgot">
					<a href=""> Forgot password?</a>
				</div>
			</div>
			<div id="centerline">
				<div id="tline"></div>
				<div>
					<p class="ord">or</p>
				</div>
				<div id="bline"></div>
			</div>
			<div class="rightpanel">
				<input type="text" />
			</div>
		</div>
	</div>
	<div id="second"></div>
</body>
</html>