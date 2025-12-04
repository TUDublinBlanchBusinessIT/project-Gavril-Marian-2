<?php
include("dbcon.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $type  = $_POST['membership_type'];
    $price = $_POST['price'];

      /// template from Version1 but added two extra fields membership_type and price 
      /// used the lecture 4 template php and database
    $sql = "INSERT INTO aquaticCentre_v2 (firstname, lastname, Phone , membership_type, price)
            VALUES ('$fname', '$lname', '$phone','$type','$price')";

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

    Membership Type:<br>
    <select name="membership_type" required>
        <option value="Adult">Adult</option>
        <option value="Child">Child</option>
        <option value="Student">Student</option>
        <option value="Senior">Senior</option>
    </select><br><br>

    Price:<br>
    <input type="number" step="0.01" name="price" required><br><br>



    <input type="submit" value="Submit">

</form>

</body>
</html>
