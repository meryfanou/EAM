<!-- routes/edit_profile.php -->

<?php
	// Connect to database
	require_once '../login.php';
	$conn = new mysqli($hn,$un,$pw,$db);
	if($conn->connect_error) die($conn->connect_error);

	// Get user's input from registration form
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Initialize variables
		$username= $password= $firstName= $lastName= $afm= $email= $address= $birthDate= $phoneNumber= $cellphoneNumber= $children='';
		$userType= $profession= $enterpriseName= $enterpriseAddress= $enterpriseStatus= $enterpriseID= $enterpriseNumber= $fund= '';

		if(isset($_POST['username']))
			$username = $_POST['username'];
		if(isset($_POST['password']) && isset($_POST['confirm-pwd']) && $_POST['password'] == $_POST['confirm-pwd'])
			$password = $_POST['password'];
		if(isset($_POST['firstName']))
			$firstName = $_POST['firstName'];
		if(isset($_POST['lastName']))
			$lastName = $_POST['lastName'];
		if(isset($_POST['afm']))
			$afm = $_POST['afm'];
		if(isset($_POST['email']))
			$email = $_POST['email'];
		if(isset($_POST['address']))
			$address = $_POST['address'];
		if(isset($_POST['birthDate']))
			$birthDate = $_POST['birthDate'];
		if(isset($_POST['phoneNumber']))
			$phoneNumber = $_POST['phoneNumber'];
		if(isset($_POST['cellphoneNumber']))
			$cellphoneNumber = $_POST['cellphoneNumber'];
		if(isset($_POST['children']))
			$children = $_POST['children'];
		if(isset($_POST['userType']))
			$userType = $_POST['userType'];
		if(isset($_POST['profession']))
			$profession = $_POST['profession'];
		if(isset($_POST['enterpriseName']))
			$enterpriseName = $_POST['enterpriseName'];
		if(isset($_POST['enterpriseAddress']))
			$enterpriseAddress = $_POST['enterpriseAddress'];
		if(isset($_POST['enterpriseStatus']))
			$enterpriseStatus = $_POST['enterpriseStatus'];
		if(isset($_POST['enterprise']))
			$enterpriseID = intval($_POST['enterprise']);
		if(isset($_POST['enterpriseNumber']))
			$enterpriseNumber = $_POST['enterpriseNumber'];
		if(isset($_POST['fund']))
			$fund = $_POST['fund'];
	}

	session_start();

	if($userType == "Εργοδότης"){
		// Get enterprise's id
		$enterpriseID = $_SESSION['enterpriseID'];

		// Update enterprise's info in db
		$query = "UPDATE `Enterprises` SET name='$enterpriseName', address='$enterpriseAddress', duringCovid='$enterpriseStatus' WHERE enterpriseID='$enterpriseID'";
		$conn->query($query);

		unset($_SESSION['enterpriseID']);
	}

	$userID = $_SESSION['logged_in_user_id'];

	// Update user's info in db
	$query = "UPDATE `Users` SET username='$username', password='$password', firstName='$firstName', lastName='$lastName', AFM='$afm', email='$email', address='$address', birthDate='$birthDate', phoneNumber='$phoneNumber', cellphoneNumber='$cellphoneNumber', children='$children', userType='$userType', profession='$profession', enterpriseID='$enterpriseID', enterpriseNumber='$enterpriseNumber', insuranceFund='$fund' WHERE userID='$userID'";
	$conn->query($query);

	$_SESSION['updated_profile'] = 1;

	// Redirect
	header('Location: ../users/user-profile.php');
	exit();

?>