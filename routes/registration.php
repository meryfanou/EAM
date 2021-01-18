<!-- routes/registration.php -->

<?php
	// Connect to database
	require_once '../login.php';
	$conn = new mysqli($hn,$un,$pw,$db);
	if($conn->connect_error) die($conn->connect_error);

	// Get user's input from registration form
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Initialize variables
		$username= $password= $firstName= $lastName= $afm= $email= $address= $birthDate= $phoneNumber= $cellphoneNumber= $children='';
		$municipality = $pc = $ame = $enterpriseAFM = $enterpriseMunicipality = $enterprisePC = $onLeave = $duringCovid = '';
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
		if(isset($_POST['municipality']))
			$municipality = $_POST['municipality'];
		if(isset($_POST['pc']))
			$pc = $_POST['pc'];
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
		if(isset($_POST['ame']))
			$ame = $_POST['ame'];
		if(isset($_POST['enterpriseName']))
			$enterpriseName = $_POST['enterpriseName'];
		if(isset($_POST['enterpriseAFM']))
			$enterpriseAFM = $_POST['enterpriseAFM'];
		if(isset($_POST['enterpriseAddress']))
			$enterpriseAddress = $_POST['enterpriseAddress'];
		if(isset($_POST['enterpriseMunicipality']))
			$enterpriseMunicipality = $_POST['enterpriseMunicipality'];
		if(isset($_POST['enterprisePC']))
			$enterprisePC = $_POST['enterprisePC'];
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

	// An employer will also have an enterprise
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
		$query = "INSERT INTO `Enterprises` (enterpriseID, name, AFM, address, PC, municipality, duringCovid) VALUES ('$enterpriseID', '$enterpriseName', '$enterpriseAFM', '$enterpriseAddress', '$enterprisePC', '$enterpriseMunicipality', '$enterpriseStatus')";
		$result = $conn->query($query);
		if(!$result) die($conn->error);
	}

	// By default info for an employee
	if($userType == "Εργαζόμενος"){
		$onLeave = "Δεν έχει γίνει κάποιο αίτημα";
		$duringCovid = "Δια ζώσης εργασία";
	}

	// Add new user in db
	$query = "INSERT INTO `Users` (userID, username, password, firstName, lastName, afm, email, address, municipality, pc, birthDate, phoneNumber, cellphoneNumber, children, userType, profession, AME, enterpriseID, enterpriseNumber, insuranceFund, onLeave, duringCovid) VALUES ('$userID', '$username', '$password', '$firstName', '$lastName', '$afm', '$email', '$address', '$municipality', '$pc', '$birthDate', '$phoneNumber', '$cellphoneNumber', '$children', '$userType', '$profession', '$ame', '$enterpriseID', '$enterpriseNumber', '$fund', '$onLeave', '$duringCovid')";
	$result = $conn->query($query);
	if(!$result) die($conn->error);

	// Disconnect from db
	$conn->close();

	// Add user's id and username to $_SESSION, so that it can be accessed by other pages too
	session_start();
	$_SESSION['logged_in_user_id'] = $userID;
	$_SESSION['username'] = $username;

	// Redirect
	if(!isset($_SESSION['eidikou_skopou'])){
		header('Location: ../users/registration_success.php');
	}
	elseif($_SESSION['eidikou_skopou'] == 1){
		header('Location: ../forms/eidikou_skopou.php');
		$_SESSION['eidikou_skopou'] = -1;
	}

	exit();
?>