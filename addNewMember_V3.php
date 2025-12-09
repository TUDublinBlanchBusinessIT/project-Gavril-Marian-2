<?php
include("dbcon.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];   ///the same template from v2 but added the membership_type
    $phone = $_POST['phone'];
    $age   = $_POST['age'];
    $membership_type_id = $_POST['membership_type_id'];


    $sql = "INSERT INTO aquaticCentre_v3 (firstname, lastname, phone , age, membership_type_id)
            VALUES ('$fname', '$lname', '$phone','$age',$membership_type_id)";

    if (mysqli_query($conn, $sql)) {
        echo "Record inserted Successfully into Version 3!";
    } else {
        echo "Have an error: " . mysqli_error($conn);
    }

}

/// using this we are getting the membership types for each category
$sql = "SELECT * FROM membership_types";
$result = mysqli_query($conn, $sql);
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


     Membership Type:<br>
    <select name="membership_type_id" required>
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id'] . "'>";   /// Added a dropdown section
                echo $row['type_name'] . " (" . $row['price'] . " €)";
                echo "</option>";
            }

        ?>
    </select>
    <br><br>
                                     
    <input type="submit" value="Submit">
    <a href="displayMembers_V3.php">
    <button type="button">View Members List</button>
</a>

</form>
<?php
mysqli_close($conn);
?>
</body>
</html>
