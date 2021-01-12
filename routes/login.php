<!-- login.php -->

<?php

	// Connect to database
	require_once '../login.php';
	$conn = new mysqli($hn,$un,$pw,$db);
	if($conn->connect_error) die($conn->connect_error);

	// Get user's input from login form
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Initialize variables
		$username = $password = "";

		if(isset($_POST['username']))
			$username = $_POST['username'];
		if(isset($_POST['password']))
			$password = $_POST['password'];
	}

	// Get user's info from db
	$query = "SELECT * FROM `Users` WHERE username='$username' AND password='$password'";
	$user = $conn->query($query);
	if(!$user) die($conn->error);

	// Add user's info to $_SESSION, so that it can be accessed by other pages too
	session_start();

	// User id
	$user->data_seek(0);
	$_SESSION['logged_in_user_id'] = intval($user->fetch_assoc()['userID']);
	// Username
	$user->data_seek(0);
	$_SESSION['username'] = $user->fetch_assoc()['username'];
	// First name
	$user->data_seek(0);
	$_SESSION['firstName'] = $user->fetch_assoc()['firstName'];
	// Last name
	$user->data_seek(0);
	$_SESSION['lastName'] = $user->fetch_assoc()['lastName'];
	// A.F.M.
	$user->data_seek(0);
	$_SESSION['afm'] = $user->fetch_assoc()['afm'];
	// E-mail
	$user->data_seek(0);
	$_SESSION['email'] = $user->fetch_assoc()['email'];
	// Address
	$user->data_seek(0);
	$_SESSION['address'] = $user->fetch_assoc()['address'];
	// Date of birth
	$user->data_seek(0);
	$_SESSION['birthDate'] = $user->fetch_assoc()['birthDate'];
	// Phone number
	$user->data_seek(0);
	$_SESSION['phoneNumber'] = $user->fetch_assoc()['phoneNumber'];
	// Cellphone number
	if(isset($user->fetch_assoc()['cellphoneNumber'])){
		$user->data_seek(0);
		$_SESSION['cellphoneNumber'] = $user->fetch_assoc()['cellphoneNumber'];
	}
	// Whether is a parent of children under 12 years old or not (gia thn adeia eidikou skopou)
	if(isset($user->fetch_assoc()['children'])){
		$user->data_seek(0);
		$_SESSION['children'] = $user->fetch_assoc()['children'];
	}
	$user->data_seek(0);
	$_SESSION['userType'] = $user->fetch_assoc()['userType'];
	// Profession (for employer or employee)
	if(isset($user->fetch_assoc()['profession'])){
		$user->data_seek(0);
		$_SESSION['profession'] = $user->fetch_assoc()['profession'];
	}
	// Name of enterprise (for employer)
	if(isset($user->fetch_assoc()['enterpriseName'])){
		$user->data_seek(0);
		$_SESSION['enterpriseName'] = $user->fetch_assoc()['enterpriseName'];
	}
	// Address of enterprise (for employer)
	if(isset($user->fetch_assoc()['enterpriseAddress'])){
		$user->data_seek(0);
		$_SESSION['enterpriseAddress'] = $user->fetch_assoc()['enterpriseAddress'];
	}
	// Status of enterprise during covid (for employer)
	if(isset($user->fetch_assoc()['enterpriseStatus'])){
		$user->data_seek(0);
		$_SESSION['enterpriseStatus'] = $user->fetch_assoc()['enterpriseStatus'];
	}
	// ID of enterprise (for employer or employee)
	if(isset($user->fetch_assoc()['enterpriseID'])){
		$user->data_seek(0);
		$_SESSION['enterpriseID'] = intval($user->fetch_assoc()['enterpriseID']);
	}
	// Phone number of enterprise (for employer or employee)
	if(isset($user->fetch_assoc()['enterpriseNumber'])){
		$user->data_seek(0);
		$_SESSION['enterpriseNumber'] = $user->fetch_assoc()['enterpriseNumber'];
	}
	// Insurance fund
	if(isset($user->fetch_assoc()['fund'])){
		$user->data_seek(0);
		$_SESSION['fund'] = $user->fetch_assoc()['fund'];
	}


	// Disconnect from db
	$conn->close();

	// Redirect
	header('Location: ../index.php');
	exit();
?>