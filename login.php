<!-- Notes:
1.This script can be used to login a user who has registered.
2. Login only requires that you pick two sets of data from users that is username and password
3.You are going to store the sent data from the form using variables ($user and $pass)
4. Then you need to make a connection to DB by just including the Database connection strings
5. Then you need to use SELECT query to fetch (find) matching data in the data using username
6. Perform logical comparison to check if sent data is equal and same as the stored data
7. Your users table must have username and password columns for this code to work
8. Check if user exist
Here we go....  -->

<?php
session_start(); 
include 'dbconfig.php'; //This will handle database connection

// checklogin
if (isset($_SESSION['userID'])) {
	header('location:home.php');
} 


if (isset($_POST['login'])) {
	
	//STEP 1: store sent data from the form
	$user = $_POST['username'];
	$pass = $_POST['password'];

	// STEP 2: check if fields are empty

	if (empty($user) || empty($pass)) {
		// STEP 3: prompt user to fill all fields.
		$response = "<p id ='danger'>Please provide all details</p>";
	}else{
		// STEP 4: continue to run Database Query
		$sql = "SELECT * FROM tbl_users WHERE username = '$user'";
		$query = mysqli_query($conn, $sql); 

		// STEP 5: check if query is run successfully


		//check if user exist
		$count = mysqli_num_rows($query);
		if ($count > 0) {
			if($query == true){
		// STEP 6: use foreach loop to display data from the Database 
			foreach ($query as $key => $loginValue) {
				// echo Database values...
				$db_password =$loginValue['password'];
				$db_id =$loginValue['id'];
				$db_user_fname = $loginValue['firstname'];
				$db_user_lname = $loginValue['lastname'];
				$db_user_mobile = $loginValue['mobile'];
			}
		// STEP 7 : compare database value with user sent data
		 if ($pass == $db_password) {
		  	$response = "<p id ='success'>Login was successful </p>";
		  	// redirect page
		  	$_SESSION['userID'] = $db_id;
		  	$_SESSION['userFname'] = $db_user_fname;
		  	$_SESSION['userLname'] = $db_user_lname;
		  	$_SESSION['userMobile'] = $db_user_mobile;
		  	
		  	//header('location:home.php');
		  }else{
		  	$response = "<p id ='danger'>Login Failed</p>";
		  }
		}else{
			$response = "<p id ='danger'>No record</p>";
		}

		 
		}
	}


}else{
	$response = "Login to continue...";
}

// $query = mysqli_query($conn, "SELECT * FROM tbl_users WHERE username = '$user'");

// foreach ($query as $key => $dbvalues) {
// 	$db_user = $dbvalues['username'];
// 	$db_user_fname = $dbvalues['firstname'];
// 	$db_user_lname = $dbvalues['lastname'];
// 	$db_user_mobile = $dbvalues['mobile'];
// }

// //join firstname and lastname 
// $db_user_fullname = $db_user_fname." ".$db_user_lname;
// echo "WELCOME BACK". $db_user_fullname;

// using While loop
// while ($dbvalues =mysqli_fetch_array($query,MYSQLI_ASSOC)):
// 	$db_user = $dbvalues['username'];
// 	$db_user_fname = $dbvalues['firstname'];
// 	$db_user_lname = $dbvalues['lastname'];
// 	$db_user_mobile = $dbvalues['mobile'];
// endwhile;
// $db_user_fullname = $db_user_fname." ".$db_user_lname;
// echo "WELCOME BACK". $db_user_fullname;
?>

<form action="" method="post">
	<h3>LOGIN HERE</h3>
	<p id="response"><?php if (isset($response)) {
		echo($response);
	} ?></p>
	<input type="text" name="username" placeholder="Username" required><br><br>
	<input type="text" name="password" placeholder="Password" required><br><br>
	<input type="submit" name="login" value="Log In">
</form>

<style type="text/css">
	#danger{
		color: red;
	}
	#success{
		color: white;
		background: green;
		padding: 20px;
		transition: 1sec;
		width: 100%;
	}
	
</style>