<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php?msg=Please log in first");
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

$id = $_POST['id'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$membership_type_id = $_POST['membership_type_id'];
$skill_level = $_POST['skill_level'];
$reg_date = $_POST['registration_date'];

$sql = "UPDATE aquaticCentre_v3 SET
        firstname = '$fname',
        lastname = '$lname',
        phone = '$phone',
        age = '$age',
        membership_type_id = $membership_type_id,
        skill_level = '$skill_level',
        registration_date = '$reg_date'
        WHERE id = $id";

mysqli_query($conn, $sql);
mysqli_close($conn);

header("Location: displayMembers_V5.php");

exit();

?>
