<!-- registration.php -->

<?php
	// connect to database
	require_once '../login.php';
	$conn = new mysqli($hn,$un,$pw,$db);
	if($conn->connect_error) die($conn->connect_error);

	// Get user's input from registration form
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Initialize variables
		$username= $password= $firstName= $lastName= $afm= $email= $address= $birthDate= $phoneNumber= $cellphoneNumber= $children= "";
		$userType= $profession= $enterpriseName= $enterpriseAddress= $enterpriseStatus= $enterpriseID= $enterpriseNumber= $fund= "";

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

	// Get highest userID in db.
	$query = "SELECT userID FROM `Users`";
	$userIDs = $conn->query($query);
	if(!$userIDs) die($conn->error);
	$max_userID = 0;
	for ($i=0; $i<$userIDs->num_rows; $i++) {
		$userIDs->data_seek($i);
		$curr = intval($userIDs->fetch_assoc()['userID']);
		if($curr > $max_userID){
			$max_userID = $curr;
		}
	}
	// Set the next userID in db
	$userID = $max_userID + 1;

	if($userType == "Εργοδότης"){
		// Get highest enterpriseID in db
		$query = "SELECT enterpriseID FROM `Enterprises`";
		$ids = $conn->query($query);
		if(!$ids) die($conn->error);
		$max_id = 0;
		for ($i=0; $i<$ids->num_rows; $i++) {
			$ids->data_seek($i);
			$curr = intval($ids->fetch_assoc()['enterpriseID']);
			if($curr > $max_id){
				$max_id = $curr;
			}
		}
		// Set the next enterpriseID in db
		$enterpriseID = $max_id + 1;

		// Add employer's enterprise in db
		$query = "INSERT INTO `Enterprises` (enterpriseID, name, address, duringCovid) VALUES ('$enterpriseID', '$enterpriseName', '$enterpriseAddress', '$enterpriseStatus')";
		$result = $conn->query($query);
		if(!$result) die($conn->error);
	}

	// Add new user in db
	$query = "INSERT INTO `Users` (userID, username, password, firstName, lastName, afm, email, address, birthDate, phoneNumber, cellphoneNumber, children, userType, profession, enterpriseID, enterpriseNumber, insuranceFund) VALUES ('$userID', '$username', '$password', '$firstName', '$lastName', '$afm', '$email', '$address', '$birthDate', '$phoneNumber', '$cellphoneNumber', '$children', '$userType', '$profession', '$enterpriseID', '$enterpriseNumber', '$fund')";
	$result = $conn->query($query);
	if(!$result) die($conn->error);

	// Disconnect from db
	$conn->close();
	// Redirect
	header('Location: ../registration_success.php');
	exit();
?>