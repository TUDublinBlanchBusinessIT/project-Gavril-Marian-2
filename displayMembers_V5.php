<?php

session_start();

if (!isset($_SESSION['username'])) {
    echo "<h3>You must log in to view this page.</h3>";
    echo "<a href='login.php'>Go to Login</a>";
    exit;
}

if (!isset($_SESSION['lastAccessed'])) {
    $_SESSION['lastAccessed'] = time();
}

if ($_SESSION['lastAccessed'] < (time() - 60)) {
    session_destroy();
    echo "You were inactive for too long. Your session has ended.";
    exit;
} else {
   
    $_SESSION['lastAccessed'] = time();
}



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

<h2>Members List (Version 5)</h2>

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
        <th>Edit</th>
        <th>Delete</th>

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

            <td>
                <a href="editMember_V5.php?id=<?= $row['id'] ?>">
                    <button>Edit</button>
                </a>
            </td>

            <td>
                <a href="deleteMember_V5.php?id=<?= $row['id'] ?>" 
                   onclick="return confirm('Please confirm that you want to delete this member?');">
                    <button>Delete</button>
                </a>
            </td>
        </tr>

        
<?php 
}
?>
</table>

<?php mysqli_close($conn); ?>

<br><br>
<a href="addNewMember_V4.php">Add New Member</a>
<a href="logout.php"><button>Log out</button></a>
