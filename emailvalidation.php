<?php
    include 'include/connection.php';
    if(!empty($_GET["code"]) && isset($_GET["code"]))
    {
        $code = trim(mysqli_real_escape_string($_GET["code"]));
        $checkext = "SELECT email FROM users WHERE hash = '$code'";
        if (mysqli_num_rows($checkext) > 0)
        {
            $checkatv = "SELECT email FROM users WHERE hash= '$code' and active = '0'";
            $checkstatus = mysqli_query($conn, $checkatv);
            if(mysqli_num_rows($checkstatus) == 1)
            {
                $update_query = "UPDATE users SET active ='1' WHERE hash = '$code'";
                mysqli_query($conn, $update_query);
              
            } else {
                echo "You account is already activated";
            }
        }
    }
        

?>
