<?php
include("dbcon.php");

$sql = "
SELECT 
    aquaticCentre_v3.id,
    aquaticCentre_v3.firstname,
    aquaticCentre_v3.lastname,
    aquaticCentre_v3.phone,
    aquaticCentre_v3.age,
    aquaticCentre_v3.skill_level,
    aquaticCentre_v3.registration_date,
    membership_types.type_name,
    membership_types.price
FROM aquaticCentre_v3
JOIN membership_types
    ON aquaticCentre_v3.membership_type_id = membership_types.id
";

$result = mysqli_query($conn, $sql);
?>

<h2>Members List (Version 4)</h2>

<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Phone</th>
        <th>Age</th>
        <th>Membership Type</th>
        <th>Price (€)</th>
        <th>Skill Level</th>
        <th>Registration Date</th>

    </tr>

<?php 

while ($row = mysqli_fetch_assoc($result)) {
?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['firstname'] . " " . $row['lastname'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['age'] ?></td>
            <td><?= $row['type_name'] ?></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['skill_level'] ?></td>
            <td><?= $row['registration_date'] ?></td>
        </tr>
<?php 
}
?>
</table>

<?php mysqli_close($conn); ?>

<br><br>
<a href="addNewMember_V3.php">Add New Member</a>
