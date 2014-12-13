
<<<<<<< Updated upstream
<?php
  $user = "root";
  $pass = "password";
=======
$conn = new mysqli($server, $username, $pass, $database);
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$hash = md5(uniqid(rand(), true));


// NEED TO BE ADDED LATER
$baseurl = "";
>>>>>>> Stashed changes

        $dbh = new PDO('mysql:host=localhost;dbname=PVault', $user, $pass, array(
            PDO::ATTR_PERSISTENT => true
        ));
?>
        

        