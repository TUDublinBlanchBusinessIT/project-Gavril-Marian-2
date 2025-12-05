<?php
include("dbcon.php");


$sql = "SELECT id, firstname, lastname, phone, age FROM aquaticCentre_v2";


$result = mysqli_query($conn, $sql);

/// added two more fields ,but it's the same block of code 
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"] .
     " - Name: " . $row["firstname"] . " " . $row["lastname"] .
     " - Phone: " . $row["phone"] .
     " - Age: " . $row["age"] . "<br>";
     
    }    
} else {
    echo "0 results to present ";
}


mysqli_close($conn);
?>