<?php
    include_once('connect.php');
    if(isset($_POST["email"]))
    {
        $email = trim(mysqli_escape_string($conn, $_POST["email"]));
        $sql = "SELECT * FROM users WHERE email='$email'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        if($row > 0)
        {
            echo '<span style="color:RED;">Email Already Existed</span>';
        }
    }
?>