<?php
session_start();

include("connectionINPUT.php");// Include your database connection file
include("functionINPUT.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Get search inputs from the form
    $user_name = mysqli_real_escape_string($con, $_POST['user_name']);
    $skills = mysqli_real_escape_string($con, $_POST['skills']);
    $domain = mysqli_real_escape_string($con, $_POST['domain']);

    // Query to search for users based on name, skills, and domain
    $query = "SELECT * FROM participater WHERE user_name LIKE '%$user_name%' AND skills LIKE '%$skills%' AND domain LIKE '%$domain%'";
    $result = mysqli_query($con, $query);

   // Generate HTML table for search results
   if (mysqli_num_rows($result) > 0) {
    echo '<table class="styled-table">';
    echo '<thead><tr><th>Name</th><th>Skills</th><th>Domain</th><th>linkedin</th><th>experience in years</th></tr></thead>';
    echo '<tbody>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['user_name'] . '</td>';
        echo '<td>' . $row['skills'] . '</td>';
        echo '<td>' . $row['domain'] . '</td>';
        echo '<td>' . $row['linkedin'] . '</td>';
        echo '<td>' . $row['experience'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}  else {
        echo "No matching records found.";
    }

    // Close the database connection
    mysqli_close($con);
}
?>
