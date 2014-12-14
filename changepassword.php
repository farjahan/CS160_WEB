<?php
session_start();
include "include/connect.php";
if (!empty($_GET['id']) && isset($_GET['id'])){
    $resetid = trim(mysqli_real_escape_string($conn, $_GET['id']));
    $now = date("Y-m-d H:i:s", time());
    
    if ($resetemail = $conn->prepare("SELECT email FROM forgot WHERE hash = ? and date > ? "))
    {
        $resetemail->bind_param("ss", $resetid, $now);
        $resetemail->execute();
        $resetemail->store_result();
    } else {
        echo $conn->error;
    }
    if ($resetemail->num_rows == 1) {
        $resetemail->bind_result($email);
        $resetemail->fetch();
        $_SESSION['forgotemal'] = $email;
        header("Location: inputpass.php");
        
    } else {
        echo "Link Expired. Please Reset Your Password Again. <br/>";
        echo "<a href='forgot.php'>Reset Password</a>";
    }
}
?>