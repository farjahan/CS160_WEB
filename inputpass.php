<?php
session_start();
include 'include/connect.php';
$email = trim(mysqli_real_escape_string($conn, $_SESSION['forgotemal']));


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($update_email_password = $conn->prepare("UPDATE users SET password = ? , salt = ? WHERE email = ? ")) {
        if (!empty($_POST['password']) && isset($_POST['password'])) {
            $mypass = trim(mysqli_real_escape_string($conn, $_POST['password']));
        }
        if (!empty($_POST['cpassword']) && isset($_POST['cpassword'])) {
            $cpass = trim(mysqli_real_escape_string($conn, $_POST['cpassword']));
        }
        if ($mypass == $cpass) {
            echo $mypass;
            $bigsalt = md5(uniqid(rand(), true));
            $salt = substr($bigsalt, 0, MAX_LENGTH);
            $mypass = hash("sha256", $mypass . $salt);
            
            $update_email_password->bind_param("sss", $mypass, $salt, $email);
            $update_email_password->execute();
            if ($update_email_password->affected_rows == 1) {
                $result = "Update Successful";
                session_unset();
                session_destroy(); 
                header("Refresh:5; url=signin.php");
            } else {
                $result = "Update Failed" . $update_email_password->error;
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Change Your Password</title>
    </head>
    <body>
        <form id="changepass" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" > 
            <p>Reset Password for <?php echo $email ?></p>
            <label for="password">New Password</label>
            <input type="password" id="password" class="rinput" name="password" required> <br/> 
            <label for="cpassword">Confirm New Password</label>
            <input type="password" id="cpassword" class="rinput" name="cpassword" required><br/>
            <input type="submit" id="submit" name="submit" value="Save New Password">
        </form>
        <p class="passwarning"><?php echo $result ?> </p>
        <script src="script/jquery2.1.1.js"></script>
        <script>

            $(document).ready(function () {
                $("#changepass").submit(function (event) {
                    var p1 = $("#password").val();
                    var p2 = $("#cpassword").val();
                    if (p1 != p2)
                    {
                        event.preventDefault();
                        $(".passwarning").html("Password Mismatch");
                        $(".passwarning").css("color", "red");
                        $("#password").css("border", "1px solid RED");
                        $("#cpassword").css("border", "1px solid RED");
                        $("#password").val("");
                        $("#cpassword").val("");
                    } else {
                        var password = $("#password").val();
                    }
                });

                $("input").focus(function () {
                    $(this).css("border", "1px solid #c0c8c9");
                });
            });


        </script> 
    </body>
</html>