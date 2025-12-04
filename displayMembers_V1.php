<?php
include("dbcon.php");


$sql = "SELECT id, firstname, lastname, phone FROM aquaticCentre_v1";


$result = mysqli_query($conn, $sql);

/// code got from lecture 4 php and Databases
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