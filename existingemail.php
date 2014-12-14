<?php

include 'include/connect.php';
include 'SendMail.php';

if (isset($_POST["cemail"])) {
    $email = $_POST["cemail"];
    $email = trim(mysqli_escape_string($conn, $email));

    if ($emailexistnotactive = $conn->prepare("SELECT * FROM users WHERE email=? and active=0")) {
        $emailexistnotactive->bind_param("s", $email);
        $emailexistnotactive->execute();
        $emailexistnotactive->store_result();
    } else {
        echo $emailexistnotactive->error;
    }
    if ($emailexistactive = $conn->prepare("SELECT * FROM users WHERE email=? and active=1")) {
        $emailexistactive->bind_param("s", $email);
        $emailexistactive->execute();
        $emailexistactive->store_result();
    } else {
        echo $emailexistactive->error;
    }

    if ($emailexistnotactive->num_rows > 0) {
        echo "<br/>Email Already Existed BUT NOT YET Activated Please Check your Email";
    } else
    if ($emailexistactive->num_rows > 0) {
        echo "<br/>Email Already Existed And Active Please Sign In";
    } else if ($emailexistnotactiveresult == 0 && $emailexistactiveresult == 0) {
        if (isset($_POST["fname"])) {
            $firstname = trim(mysqli_escape_string($conn, $_POST["fname"]));
        }
        if (isset($_POST["lname"])) {
            $lastname = trim(mysqli_escape_string($conn, $_POST["lname"]));
        }
        if (isset($_POST["pass"])) {
            $password = trim(mysqli_escape_string($conn, $_POST["pass"]));
        }
        //password hashing
        $bigsalt = md5(uniqid(rand(), true));
        $salt = substr($bigsalt, 0, MAX_LENGTH);
        $password = hash("sha256", $password . $salt);
        $hash = md5(uniqid(rand(), true));
        $hash = hash("sha256", $hash);
        
        $active = 0;

        if ($insertaccount = $conn->prepare("INSERT INTO users (firstname, lastname, email, password, active, hash, salt) VALUES (?,?,?,?,?,?,?)")) {
            $insertaccount->bind_param("ssssiss", $firstname, $lastname, $email, $password, $active, $hash, $salt);
            $insertaccount->execute();
            if ($insertaccount->affected_rows > 0) {
                $to = $email;
                $subject = "PVault.com Account Activation";
                $body = "Dear Customer, <br/> <br/> Your Account is Almost Ready! <br/> <br/>"
                        . "Your Username is $email.  "
                        . "<a href=http://localhost/CS160_WEB/emailactivation.php?code=" . $hash . ">ACTIVATE YOUR ACCOUNT HERE</a> <br/><br/>"
                        . "Thank you";
                send_mail($to, $subject, $body);
                echo "success";
                exit;
            } else {
                echo $insertaccount->error;
            }
        } else {
            echo $conn->error;
        }
    }
}
?>