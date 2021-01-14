<!-- update_employee.php -->

<?php

	// Connect to database
	require_once '../login.php';
	$conn = new mysqli($hn,$un,$pw,$db);
	if($conn->connect_error) die($conn->connect_error);

	// Get user's input from registration form
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		// Get employee's id in db
		$employee = $_POST['employee'];

		$onLeave = $_POST['onLeave'];
		if(isset($_POST['duringCovid']))
			$duringCovid = $_POST['duringCovid'];
		else
			$duringCovid = '';
	}

	$query = "UPDATE `Users` SET onLeave='$onLeave', duringCovid='$duringCovid' WHERE userID='$employee'";
	$conn->query($query);

	// Disconnect from db
	$conn->close();

	session_start();
	$_SESSION['updated_employee'] = 1;

	// Redirect
	header('Location: ../user-profile.php');
	exit();

?>