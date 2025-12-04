<?php
include("dbcon.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO aquaticCentre_v1 (firstname, lastname, Phone)
            VALUES ('$fname', '$lname', '$phone')";

    if (mysqli_query($conn, $sql)) {
        echo "Record inserted Successfully into Version 1!";
    } else {
        echo "Have an error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Member - Version 1</title>
</head>
<body>

<h2>Add New Member (Version 1)</h2>

<form method="POST">

    First Name:<br>
    <input type="text" name="firstname" required><br><br>

    Last Name:<br>
    <input type="text" name="lastname" required><br><br>

    Phone:<br>
    <input type="text" name="phone" required><br><br>

    <input type="submit" value="Submit">

</form>

</body>
</html>
