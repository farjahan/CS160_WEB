<?php

include 'include/connect.php';
if (!empty($_GET["code"]) && isset($_GET["code"])) {
    $code = trim(mysqli_real_escape_string($conn, $_GET["code"]));
    if ($checkvalidemail = $conn->prepare("SELECT email FROM users WHERE hash = ? and active=0")) {
        $checkvalidemail->bind_param("s", $code);
        $checkvalidemail->execute();
        $checkvalidemail->store_result();
    }

    if ($checkvalidemail->num_rows == 1) {
        $update_query = $conn->prepare("UPDATE users SET active ='1' WHERE hash = ?");
        if ($update_query) {
            $update_query->bind_param("s", $code);
            $update_query->execute();
            if ($update_query->affected_rows == 1) {
                echo "Account Activated\n";
                echo "You Will Be Redirect to Sign In page in 3 seconds";
                mkdir("documents/$code");
                header("Refresh: 3; url=signin.php");
            } else {
                echo "Account Failed to Activate";
            }
        } else {
            echo $update_query->error;
        }
    } else {
        echo "Please Register for a new account or your account is already activated";
    }
}
?>
