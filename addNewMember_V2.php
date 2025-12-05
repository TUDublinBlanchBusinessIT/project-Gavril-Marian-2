<?php
include("dbcon.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $age   = $_POST['age'];
   


      /// template from Version1 but added new extra field age and  
      /// used the lecture 4 template php and database
    $sql = "INSERT INTO aquaticCentre_v2 (firstname, lastname, phone , age)
            VALUES ('$fname', '$lname', '$phone','$age')";

    if (mysqli_query($conn, $sql)) {
        echo "Record inserted Successfully into Version 2!";
    } else {
        echo "Have an error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<form method="POST">

    First Name:<br>
    <input type="text" name="firstname" required><br><br>

    Last Name:<br>
    <input type="text" name="lastname" required><br><br>

    Phone:<br>
    <input type="text" name="phone" required><br><br>

    Age:<br>
    <input type="number" name="age" required><br><br>

    <input type="submit" value="Submit">

</form>

</body>
</html>
