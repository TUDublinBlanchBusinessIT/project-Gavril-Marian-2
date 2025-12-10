<?php
session_start();
include("dbcon.php");

$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    
    $_SESSION['username'] = $user;
    $_SESSION['lastAccessed'] = time();  // template from lecture 9 Sessions and cookies

    header("Location: displayMembers_V5.php");
    exit();

} else {
    echo "Incorrect username or password. <a href='login.php'>Try again</a>";
}
?>
