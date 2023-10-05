<?php
session_start();

include("connectionINPUT.php");// Include your database connection file
include("functionsINPUT.php");

// Query to retrieve data from the database
$query = "SELECT * FROM participater";
$result = mysqli_query($con, $query);

// Check if there are results
if (mysqli_num_rows($result) > 0) {
    // Loop through the results and display them
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row['user_name'] . "<br>";
        echo "Skills: " . $row['skills'] . "<br>";
        echo "Domain: " . $row['domain'] . "<br>";
        echo "linkedin: " . $row['linkedin'] . "<br>";
        echo "experience: " . $row['experience'] . "<br><br>";
    }
} else {
    echo "No records found.";
}

// Close the database connection
mysqli_close($con);
?>
