<?php
include 'include/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["fname"])) {
        $firstname = $_POST["fname"];
    }
    if (isset($_POST["lname"])) {
        $lastname = $_POST["lname"];
    }
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }
    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }
//    if (isset($_POST["pin"]))
//    {
//        $pin = $_POST["pin"];
//    } else
//    {
//        $pin = "";
//    }
    $active = 0;

    $insertsql = "INSERT INTO users (firstname, lastname, email, password, active)
VALUES ('$firstname', '$lastname', '$email', '$password', '$active')";
    if ($conn->query($insertsql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertsql . "<br>" . $conn->error;
    }
}
?> 