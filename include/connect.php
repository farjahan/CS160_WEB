<?php

define("MAX_LENGTH", 6);
$server = "localhost";
$dbusername = "root";
$dbpass = "mysql";
$database = "PVault";
date_default_timezone_set('America/Los_Angeles');

$conn = new mysqli($server, $dbusername, $dbpass, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

try {
    $dbh = new PDO("mysql:host=$server;dbname=$database", $dbusername, $dbpass);
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
        