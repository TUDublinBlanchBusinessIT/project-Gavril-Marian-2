<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: displayMembers_V5.php");
    exit();
}
?>

<h2>Login</h2>
<form method="POST" action="loginCheck.php">
    Username:<br>
    <input type="text" name="username" required><br><br>

    Password:<br>
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Login">
</form>
