<?php
include 'include/connect.php';
include 'include/utils.php';
session_start();
if (!isset($_SESSION ['email'])) {
    die('not logged in');
    header("Location:signin.php");
} else  {
    $email = $_SESSION ['email']; 
}
if (isset($_SESSION['uid'])){
    $uid = $_SESSION ['uid'];
} else {
    die("User Id is not set");
}

$sql = $dbh->prepare("SELECT * FROM documents WHERE uid='$uid'");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

$usersql = $dbh->prepare("SELECT * FROM users WHERE email='$email'");
$usersql->execute();
$userresult = $usersql->fetchAll(PDO::FETCH_CLASS);

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style/reset.css">
        <link rel="stylesheet" type="text/css" href="style/mystyle.css">
        <link rel="stylesheet" type="text/css"
              href="DataTables/media/css/jquery.dataTables.css">
        <title>User Page</title> 
   </head>
    <body>
        <h2>My Documents</h2>
        <h3>Log in as: <?php echo ucfirst($userresult[0]->firstname) . " " . ucfirst($userresult[0]->lastname); ?></h3>
        <table id="maintable" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>

                    <th>ID</th>
                    <th>File Name</th>
                    <th>Expiration Date</th>
                    <th>Comments</th>
                    <th>Upload Time</th>
                    <th>File Path</th>

                </tr>
            </thead>
            <?php
            if (!empty($result)) {
                foreach ($result as $row) {
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>" . $row ['did'] . "</td>";
                    echo "<td>" . $row ['filename'] . "</td>";
                    echo "<td>" . $row ['expdate'] . "</td>";
                    echo "<td> " . $row ['comment'] . "</td>";
                    echo "<td>" . $row ['uploadTime'] . "</td>";
                    echo "<td> <a href= checkuserForm.php?filePath=" . $row ['filePath'] . ">View file</a> </td>";
                    echo " </tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="submit" id="submit" name="submit"
               value="Upload New Document" />
    </form>
    <!--Javascript At the buttom for speed-->
    <script type="text/javascript" src="script/jquery2.1.1.js"></script>
    <script type="text/javascript"
    src="DataTables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="script/main.js"></script>

</body>
</html>