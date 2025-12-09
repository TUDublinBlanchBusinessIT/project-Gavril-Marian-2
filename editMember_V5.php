<?php
include("dbcon.php");

$id = $_GET['id'];

$sql = "SELECT * FROM aquaticCentre_v3 WHERE id = $id";
$result = mysqli_query($conn, $sql);
$member = mysqli_fetch_assoc($result);

$typeSql = "SELECT * FROM membership_types";
$typeResult = mysqli_query($conn, $typeSql);
?>

<h2>Edit Member (Version 5)</h2>

<form method="POST" action="updateMember_V5.php">

    <input type="hidden" name="id" value="<?= $member['id'] ?>">

    First Name:<br>
    <input type="text" name="firstname" value="<?= $member['firstname'] ?>" required><br><br>

    Last Name:<br>
    <input type="text" name="lastname" value="<?= $member['lastname'] ?>" required><br><br>

    Phone:<br>
    <input type="text" name="phone" value="<?= $member['phone'] ?>" required><br><br>

    Age:<br>
    <input type="number" name="age" value="<?= $member['age'] ?>" required><br><br>

    Membership Type:<br>
    <select name="membership_type_id" required>
        <?php
            while ($row = mysqli_fetch_assoc($typeResult)) {

                
                $selected = ($row['id'] == $member['membership_type_id']) ? "selected" : "";

                echo "<option value='" . $row['id'] . "' $selected>";
                echo $row['type_name'] . " (" . $row['price'] . " €)";
                echo "</option>";
            }
        ?>
    </select>
    <br><br>

    Swimming Skill Level (1–10):<br>
    <input type="range" name="skill_level" min="1" max="10" 
           value="<?= $member['skill_level'] ?>"><br><br>

    Registration Date:<br>
    <input type="date" name="registration_date" 
           value="<?= $member['registration_date'] ?>" required><br><br>

    <input type="submit" value="Save Changes">

</form>

<br>
<a href="displayMembers_V5.php"><button>Cancel</button></a>

<?php mysqli_close($conn); ?>
