home.php

<?php
//$_SESSION['userID'] =null;
session_start();
include 'dbconfig.php';
 $loggedInUser = $_SESSION['userID'];
 $loggedInUserName = $_SESSION['userFname'];

 if (!isset($_SESSION['userID'])) {
  	header('location:logout.php');
  } 
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOME</title>
</head>
<body>
	<h5>Dear  <?php echo($loggedInUserName);?></h5>
<h4>Welcome to our services</h4>
<a href="logout.php">Logout</a><br>

<?php 
$query = mysqli_query($conn, "SELECT * FROM `services`");

while ($services = mysqli_fetch_array($query,MYSQLI_ASSOC)): 
$db_serviceName = $services['service_name'];
$db_serviceDesc = $services['Service_desc'];

echo '<button id="services">
	<h3>'.$db_serviceName.'</h3>
	<hr>
	<p>'.$db_serviceDesc.'</p>
</button>';
endwhile;


 ?>

</body>
</html>


 <style type="text/css">
 #services{
 	width:48%; 
 	height:200px; 
 	background:purple; 
 	padding:5px; 
 	color: white; 
 	border-radius:1px; 
 	margin-left:2px; 
 	margin-bottom: 5px;
 	font-size: 24px;
 }
 </style>