<?php
//Start Database connection script

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "lifelegacy"; // use your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{

	echo "";
}
// End Database connection

 ?>