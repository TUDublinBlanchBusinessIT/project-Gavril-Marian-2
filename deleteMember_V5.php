<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<h3>You must log in to view this page.</h3>";
    echo "<a href='login.php'>Go to Login</a>";
    exit;
}

if (!isset($_SESSION['lastAccessed'])) {
    $_SESSION['lastAccessed'] = time();
}

if ($_SESSION['lastAccessed'] < (time() - 60)) {
    session_destroy();
    echo "You were inactive for too long. Your session has ended.";
    exit;
}

$_SESSION['lastAccessed'] = time();

include("dbcon.php");

$id = $_GET['id'];  

$sql = "DELETE FROM aquaticCentre_v3 WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Member deleted successfully!";
} else {
    echo "Error deleting member: " . mysqli_error($conn);
}
mysqli_close($conn);
header("Location: displayMembers_V5.php");
exit();
?>
