<?php
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
