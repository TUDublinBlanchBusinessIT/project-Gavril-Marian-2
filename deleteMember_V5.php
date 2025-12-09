<?php
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
