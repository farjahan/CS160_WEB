<?php

include "include/connect.php";
include "SendMail.php";
if (!empty($_POST['email']) && isset($_POST['email'])) {
    $email = trim(mysqli_real_escape_string($conn, $_POST["email"]));
    if ($checkemail = $conn->prepare("SELECT * FROM users WHERE email = ? ")) {
        $checkemail->bind_param("s", $email);
        $checkemail->execute();
        $checkemail->store_result();
        if ($checkemail->num_rows == 1) {
            $bigsalt = md5(uniqid(rand(), true));
            $hash = hash("sha256", $bigsalt);

             $date = date("Y-m-d H:i:s", strtotime("+1 day"));
            if ($insert_forgot = $conn->prepare("INSERT INTO forgot (email, hash, date) VALUES(?,?,?)")) {
                $insert_forgot->bind_param("sss", $email, $hash, $date);
                $insert_forgot->execute();
            }
            if ($insert_forgot->affected_rows > 0) { 
                $to = $email;
                $subject = "PVault.com Reset Password";
                $body = "Dear Customer, <br/> <br/> You Have Forgot Your Account Password! <br/> <br/>"
                        . "Your Username is $email.  <br/><br/>"
                        . "<a href=http://localhost/CS160_WEB/changepassword.php?id=" . $hash . ">RESET YOUR PASSWORD HERE</a> <br/><br/>"
                        . "Thank you";
                send_mail($to, $subject, $body);
                echo "<span style='color:green'>Success Check Your Email </span>";
            } else {
                echo "<span style='color:red'>Reset Email Has Already Been Sent to Your Account (Try Again Tomorrow)</span>";
            }
        } else {
            echo "<span style='color:red'>Your Account Deosn't Exist</span>";
        }
    } else {
        echo $conn->error;
    }
}
?>