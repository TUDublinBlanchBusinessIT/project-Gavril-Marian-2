<?php
include("dbcon.php");


$sql = "SELECT id, firstname, lastname, phone FROM members";


$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"] .
             " - Name: " . $row["firstname"] . " " . $row["lastname"] .
             " - Phone: " . $row["phone"] . "<br>";
    }

} else {
    echo "0 results to present ";
}


mysqli_close($conn);
?>