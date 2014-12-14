<?php

$server = "localhost";
$username = "tapakorn";
$pass = "tapakorn";
$database = "PVault";

$conn = new mysqli($server, $username, $pass, $database);
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

?>
        