<?php
include ("dbcon.php");

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$phone = $_POST['phone'];

$sql = "Insert into members (firstname,lastname,phone)
VALUES ('$fname' , '$lname', '$phone')";

if (mysqli_query($conn, $sql)) {
    echo "Record inserted Succesfully!";
} else {
    echo "Have an error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
