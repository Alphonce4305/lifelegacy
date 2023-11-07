 <?php 
date_default_timezone_set('Africa/Nairobi');
if (!empty($_POST['submit'])) {
	// form is submited
	//echo "Form submited";
	//store form data
	$Firstname = $_POST['fname'];
	$Lastname = $_POST['lname'];
	$Mobile = $_POST['mobile'];
	$Gender = $_POST['gender'];
	$county = $_POST['countries'];
	// $Username = $_POST['username'];
	// $Password = $_POST['password'];

if (empty($Firstname) || empty($Lastname) || empty($Mobile) || empty($Gender)) {
	echo "Please provide all fields";
}else{
	
// check if user exist
	$checkUserSQL= "SELECT * FROM tbl_users WHERE username = '$Username' OR mobile = '$Mobile' OR email ='$Email'";
	$checkQuery = mysqli_query($conn,$checkUserSQL);

	$countRecords = mysqli_num_rows($checkQuery);

	if ($countRecords > 0) {
		$response = "<p id = 'danger'>User details already exist</p>";
	}elseif ($countRecords == 0) {
		//Save in the DB
	$sql = "INSERT INTO `tbl_users`(`firstname`, `lastname`, `gender`, `mobile`) VALUES ('$Firstname','$Lastname','$Gender','$Mobile')";
	if(mysqli_query($conn,$sql) == true){
		echo "Registration successfull";
	}else{
		echo "Something went wrong. Please try again..!";
	}
	}


	
}

}else{
	echo "Please submit your form";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIGN UP</title>
</head>
<body>


<form action="" method="post">
	<h2>SIGN UP FORM</h2>
	<input type="text" placeholder="Firstname" name="fname"><br><br>
	<input type="text" placeholder="Lastname" name="lname"><br><br>
	<input type="text" placeholder="Mobile" name="mobile"><br><br>
	<input type="text" placeholder="e.g M" name="gender"><br><br>

	<select name="countries">
		<optgroup>
			<option value="">Select your Country</option>
			<option value="KE">Kenya</option>
			<option value="TZ">Tanzania</option>
			<option value="UG">Uganda</option>
			<option value="ZIM">Zimbabwe</option>
			<option value="SS">South Sudan</option>
		</optgroup>
	</select>
<br><br>

	<input type="radio" name="gender" value="Male">
		<label>Male</label>
	<input type="radio" name="gender" value="Female">
	<label>Female</label>
	<input type="radio" name="gender" value="Others">
	<label>Others</label>
<br>

<input type="checkbox" name="terms" checked><label>Remember me</label>
	<!-- <input type="text" placeholder="Username" name="username"><br><br>
	<input type="password" placeholder="Password" name="password"><br> --><br>
	<input type="submit" value="Register" name="submit">
	<p>Read our <a href="#">Privacy policy</a></p>
</form>
</body>
</html>


CARDBOARD KINGS
192.168.100.35/cardboardkings/