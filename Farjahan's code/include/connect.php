<?php
  $user = "root";
  $pass = "password";

        $dbh = new PDO ( 'mysql:host=localhost;dbname=PVault', $user, $pass, array (
		PDO::ATTR_PERSISTENT => true 
) );
?>
        