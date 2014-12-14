<?php

include 'include/connect.php';
include 'SendEmail.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $perror = 0;
    if (isset($_POST["fname"])) {
        $firstname = trim(mysqli_escape_string($conn, $_POST["fname"]));
    }
    if (isset($_POST["lname"])) {
        $lastname = trim(mysqli_escape_string($conn, $_POST["lname"]));
    }
    if (isset($_POST["email"])) {
        $email = trim(mysqli_escape_string($conn, $_POST["email"]));
    }
    if (isset($_POST["password"])) {
        $password = trim(mysqli_escape_string($conn, $_POST["password"]));
    }
    if (isset($_POST["cpassword"])) {
        $cpassword = trim(mysqli_escape_string($conn, $_POST["cpasswor"]));
    }
    if ($password != $cpassword) {
        $perror = 1;
    } else {
        $password = md5($password);
    }
    $active = 0;
    
//    Check for existing user
    $verify_email = "SELECT * FROM usrs WHERE email ='$email' and active = 1";
    $qresult = mysqli_query($con,$verify_email);
    if (!$qresult)
    {
        header("Refresh: 5; url=index.php");
    }
    
    if (!$perror && mysqli_num_rows($qresult) == 0) {
        $hash = md5(uniqid(rand(), true));
        $insertsql = "INSERT INTO users (firstname, lastname, email, password, active, hash) VALUES ('$firstname', '$lastname', '$email', '$password', '$active', '$hash')";
        if ($conn->query($insertsql) === TRUE) {
            echo "New record created successfully";
//            Sending Email
            $to = $email;
            $subject = "PVault.com Account Activation";
            $body = "Dear Customer, <br/> <br/> Your Account is Almost Ready! <br/> <br/>"
                    . "Your Username is $email."
                    . "<a href='" . $baseurl . "/activation/" . $hash . "'>ACTIVATE YOUR ACCOUNT HERE</a> <br/><br/> "
                    . "Thank you";
            send_mail($to, $subject, $body);
            
            header("Refresh: 5; url=checkemail.php");
            
        } else {
            echo "Error: " . $insertsql . "<br>" . $conn->error;
        }
    }
}
?> 