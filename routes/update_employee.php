<!-- update_employee.php -->

<?php

	// Connect to database
	require_once '../login.php';
	$conn = new mysqli($hn,$un,$pw,$db);
	if($conn->connect_error) die($conn->connect_error);

	session_start();

	// If a form was submitted (exapostasews, anastolh, eidikou skopou)
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		// If the employer made a form about employee's status during covid
		if(isset($_POST['employee'])){
			// Get employee's info
			$employee = $_POST['employee'];
			$duringCovid = $_POST['duringCovid'] . " από " . $_POST['begin_date_4'];

			$query = "UPDATE `Users` SET duringCovid='$duringCovid' WHERE userID='$employee'";
			$conn->query($query);
		}
		elseif(isset($_POST['onLeave'])){
			$employee = $_SESSION['logged_in_user_id'];
			$onLeave = $_POST['onLeave'];
			$onLeaveFrom = $_POST['begin_date_2'];
			$onLeaveTo = $_POST['end_date_2'];

			$query = "UPDATE `Users` SET onLeave='$onLeave',onLeaveFrom='$onLeaveFrom',onLeaveTo='$onLeaveTo' WHERE userID='$employee'";
			$conn->query($query);
		}
	}
	// If the employer wants to accept an employee's request
	else{
		$employee = $_SESSION['update_employee'];
		unset($_SESSION['update_employee']);

		// Get employee from db
		$query = "SELECT * FROM `Users` WHERE userID='$employee'";
		$result = $conn->query($query);
		if(!$result) die($conn->connect_error);

		// Accept employee's request
		$result->data_seek(0);
		$request = $result->fetch_assoc()['onLeave'];
		if($request == "Έγινε αίτημα για κανονική άδεια")
			$onLeave = "Σε κανονική άδεια";
		else if($request == "Έγινε αίτημα για αναρρωτική άδεια")
			$onLeave = "Σε αναρρωτική άδεια";
		else if($request == "Έγινε αίτημα για άδεια άνευ αποδοχών")
			$onLeave = "Σε άδεια άνευ αποδοχών";
		else if($request == "Έγινε αίτημα για άδεια ειδικού σκοπού")
			$onLeave = "Σε άδεια ειδικού σκοπού";

		$query = "UPDATE `Users` SET onLeave='$onLeave' WHERE userID='$employee'";
		$conn->query($query);
	}

	// Disconnect from db
	$conn->close();

	$_SESSION['updated_employee'] = 1;

	// Redirect
	header('Location: ../user-profile.php');
	exit();

?>