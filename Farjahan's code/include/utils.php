<?php

function getUserInfo($userEmail, $dbh) {
	$sql = $dbh->prepare ( "SELECT * FROM users WHERE email='$userEmail'" );
	$sql->execute ();
	$result = $sql->fetchAll ( PDO::FETCH_CLASS );
	if (isset($result) && count($result) > 0) {
		return $result[0];
	}
}
function incrementLoginAttemptsForUserEmail($userEmail, $dbh) {
	$sql = $dbh->prepare ( "Update users set login_attempts = login_attempts + 1 where email = '$userEmail'" );
	$sql->execute ();
}

function resetAttemptsForUserEmail($userEmail, $dbh) {
	$sql = $dbh->prepare ( "Update users set login_attempts = 0 where email = '$userEmail'" );
	$sql->execute ();
}
?>