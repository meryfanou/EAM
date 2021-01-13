<!-- user-profile.php -->
<?php include './header.php' ?>

<link rel="stylesheet" href="./stylesheets/user-profile.css">
<body style="background-color:rgba(198, 198, 236, 0.5);">

<!-- Breadcrumb -->
<div class="sticky">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home" style="padding:4%;display:inline;"></i>Αρχική</a></li>
       	<li class="breadcrumb-item active" aria-current="page">Προφίλ</li>
      </ol>
	</nav>
</div>

<?php 	 // Get user's info from db

	// Connect to database
	require_once './login.php';
	$conn = new mysqli($hn,$un,$pw,$db);
	if($conn->connect_error) die($conn->connect_error);

	// Get user's info from db
	$userID = $_SESSION['logged_in_user_id'];
	$query = "SELECT * FROM `Users` WHERE userID='$userID'";
	$user = $conn->query($query);
	if(!$user) die($conn->error);

	// Store user's info in array
	foreach ($user as $item){
		foreach ($item as $key => $value){
			// Skip userID and username - already in $_SESSION. Also ignore password
			if($key == "userID" || $key == "username" || $key == "password") continue;
			// If key's value is empty, continue
			if(!$value) continue;

			// If the user is employer/employee  in an enterprise, store interprise's info as well
			if($key == "enterpriseID"){
				// Get enterprise from db
				$query = "SELECT * FROM `Enterprises` WHERE enterpriseID='$value'";
				$enterprise = $conn->query($query);
				if(!$enterprise) die($conn->error);

				foreach ($enterprise as $record){
					foreach ($record as $entpr_key => $entpr_value){
						// Skip enterpriseID
						if($entpr_key == "enterpriseID") continue;
						// If key's value is empty, continue
						if(!$entpr_value) continue;

						$entpr_info[$entpr_key] = $entpr_value;
					}
				}
			}

			$user_info[$key] = $value;
		}
	}

	// Disconnect from db
	$conn->close();
?>

<br><br>
<div class="row flex-container">
	<div class="flex-content">
		<div class="row">
			<div class="col-sm-1">
				<img src="https://cdn0.iconfinder.com/data/icons/google-material-design-3-0/48/ic_account_box_48px-128.png" alt="Το προφίλ μου" class="rounded-circle">
			</div>
			<div class="col">
		    	<h4><?php echo $user_info['firstName'] . " " . $user_info['lastName']; ?><br>
		    		<small><i><?php echo $user_info['userType']; ?></i></small></h4>
		    </div>
			<div class="col-sm-3"></div>
			<div class="col">
		    	<input type="button" class="edit-button" value="Επεξεργασία">
			    <input type="button" class="logout-button" value="Αποσύνδεση">
			</div>
		    <!-- <div class="col-md-4"></div> -->
	    </div>
		<hr class="float-left" style="border-top: 2px solid rgb(0,139,139); width: 60%;">
		<div class="row">
			<div class="col">
   				<br><p>Lorem ipsum...</p>
   			</div>
			<div class="col-sm-1">
				<br><vr id="xs-screen" style="border-left: 1px solid rgba(0,0,0,0.4); width: 60%;">
			</div>
			<div class="col">
   				<br><p>Lorem ipsum...</p>
   			</div>
   		</div>
	</div>
</div>


<?php include './footer.php' ?>