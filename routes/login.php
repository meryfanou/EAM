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

	// Add user's basic info to $_SESSION, so that it can be accessed by other pages too
	session_start();

	// User id
	$user->data_seek(0);
	$_SESSION['logged_in_user_id'] = intval($user->fetch_assoc()['userID']);
	// Username
	$user->data_seek(0);
	$_SESSION['username'] = $user->fetch_assoc()['username'];


	// Disconnect from db
	$conn->close();

	// Redirect
	if(!isset($_SESSION['eidikou_skopou'])){
		header('Location: ../index.php');
	}
	elseif($_SESSION['eidikou_skopou'] == 1){
		header('Location: ../eidikou_skopou.php');
		$_SESSION['eidikou_skopou'] = 0;
	}

	exit();
?>