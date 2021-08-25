<?php

$dbhost = 'localhost:3306';
$dbuser = 'phpadmin';
$dbpass = 'phpadmin';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'reserva');


if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Print host information
echo "Connect Successfully. "."<br>";

?>