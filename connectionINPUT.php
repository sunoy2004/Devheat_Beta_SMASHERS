<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "MAYANK";
$dbname = "inputforindividual";

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>