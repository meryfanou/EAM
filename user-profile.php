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

<?php

	// If the user is an employer and has just updated an employee's info, show a message
	if(isset($_SESSION['updated_employee']) && ($_SESSION['updated_employee'] == 1)){
		print "<div class=\"alert\" style=\"background-color: #A0DAA9; border-color:seagreen; color:#264E36;\">";
    	print "<strong>Οι αλλαγές αποθηκεύτηκαν με επιτυχία!</strong>";
    	print "</div>";

	    unset($_SESSION['updated_employee']);
	}

	// If the user is an employee and has just made a request to the employer(s), show a message
	if(isset($_SESSION['made_request']) && $_SESSION['made_request'] == 1){
		print "<div class=\"alert\" style=\"background-color: #A0DAA9; border-color:seagreen; color:#264E36;\">";
    	print "<strong>Το αίτημά σας υποβλήθηκε με επιτυχία! Ο εργοδότης σας θα ενημερωθεί για αυτό και θα αποφασίσει για την αποδοχή του.</strong>";
    	print "</div>";

	    unset($_SESSION['made_request']);
	}

	// If the user has just updated his/her profile, show a message
	if(isset($_SESSION['updated_profile']) && $_SESSION['updated_profile'] == 1){
		print "<div class=\"alert\" style=\"background-color: #A0DAA9; border-color:seagreen; color:#264E36;\">";
    	print "<strong>Οι αλλαγές αποθηκεύτηκαν με επιτυχία!</strong>";
    	print "</div>";

	    unset($_SESSION['updated_profile']);
	}

?>

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
			if(!$value || $value=='') continue;

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
						if(!$entpr_value || $entpr_value=='') continue;

						$entpr_info[$entpr_key] = $entpr_value;
					}
				}
			}

			$user_info[$key] = $value;
		}
	}

	// If the connected user is an employer, store the info of all employees as well
	if($user_info['userType'] == 'Εργοδότης'){
		$users = "`Users`";
		$entprs = "`Enterprises`";
		$enterpriseID = $user_info['enterpriseID'];
		$query = "SELECT $users.* FROM $users, $entprs WHERE $entprs.enterpriseID='$enterpriseID' AND $users.enterpriseID=$entprs.enterpriseID AND $users.userType='Εργαζόμενος'";
		$employees = $conn->query($query);
		if(!$employees) die($conn->error);
	}

	// Disconnect from db
	$conn->close();
?>

<br><br>
<!-- User profile -->
<div class="row flex-container">
	<div class="flex-content">
		<div class="row">
			<!-- Icon -->
			<div class="col-sm-1">
				<img src="https://cdn0.iconfinder.com/data/icons/google-material-design-3-0/48/ic_account_box_48px-128.png" alt="Το προφίλ μου" class="">
			</div>
			<!-- Name -->
			<div class="col">
		    	<h4><?php echo $user_info['firstName'] . " " . $user_info['lastName']; ?><br>
		    		<small><i><?php echo $user_info['userType']; ?></i></small></h4>
		    </div>
			<div class="col"></div>
			<!-- Buttons -->
			<div class="col-md-5 float-right">
		    	<a href="./edit_profile.php"><input type="button" class="edit-button btn-sm" value="Επεξεργασία"></a>
			    <a href="./routes/logout.php"><input type="button" class="logout-button btn-sm" value="Αποσύνδεση"></a>
			</div>
	    </div>
		<hr style="border-top: 2px solid rgba(0,0,0,0);">
	    <div class="row">
	    	<div class="col">
	    		<br><h5><u>Προσωπικά Στοιχεία</u></h5>
	    	</div>
	    	<div class="col">
	    		<br><h5><u>Στοιχεία Εργασίας</u></h5>
	    	</div>
	    </div>
		<div class="row">
			<!-- Proswpika Stoixeia -->
			<div class="col" style="padding-right: 5%; padding-left: 3%">
   				<br><p><b>e-mail: </b><?php echo $user_info['email']; ?></p>
   				<p><b>Α.Φ.Μ.: </b><?php echo $user_info['AFM']; ?></p>
   				<p><b>Διεύθυνση Κατοικίας: </b><?php echo $user_info['address']; ?></p>
   				<p><b>Δήμος: </b><?php echo $user_info['municipality']; ?></p>
   				<p><b>Τ.Κ.: </b><?php echo $user_info['PC']; ?></p>
   				<p><b>Ημερομηνία Γέννησης: </b><?php echo $user_info['birthDate']; ?></p>
   				<p><b>Σταθερό τηλέφωνο: </b><?php echo $user_info['phoneNumber']; ?></p>
   				<?php if(isset($user_info['cellphoneNumber'])){ ?>
   					<p><b>Κινητό Τηλέφωνο: </b><?php echo $user_info['cellphoneNumber']; ?></p>
   				<?php } ?>
   				<?php if(isset($user_info['children'])){ ?>
   					<p><b>Γονέας τέκνων κάτω των 12 ετών: </b><?php echo $user_info['children']; ?></p>
   				<?php } ?>
   			</div>
			<div class="col-sm-1" style="border-left: 1px solid rgb(0,139,139);"></div>
			<!-- Stoixeia Ergasias -->
			<div class="col" style="padding-left: -1%;">
   				<br>
   				<?php if(isset($user_info['profession'])){ ?>
   					<p><b>Επάγγελμα: </b><?php echo $user_info['profession']; ?></p>
   				<?php } ?>
   				<!-- If it is an employer -->
				<?php if($user_info['userType'] == 'Εργοδότης'){ ?>
   					<p><b>Α.Μ.Ε.: </b><?php echo $user_info['AME']; ?></p>
   				<?php } ?>
   				<!-- If the user works in an enterprise -->
   				<?php if(isset($user_info['enterpriseID'])){ ?>
   					<p><b>Όνομα Επιχείρησης: </b><?php echo $entpr_info['name']; ?></p>
   					<p><b>Α.Φ.Μ. Επιχείρησης: </b><?php echo $entpr_info['AFM']; ?></p>
   					<p><b>Διεύθυνση Επιχείρησης: </b><?php echo $entpr_info['address']; ?></p>
   					<p><b>Δήμος: </b><?php echo $entpr_info['municipality']; ?></p>
   					<p><b>Τ.Κ.: </b><?php echo $entpr_info['PC']; ?></p>
	   				<?php if(isset($entpr_info['duringCovid'])){ ?>
	   					<p><b>Κατάσταση επιχείρησης λόγω Covid-19: </b><?php echo $entpr_info['duringCovid']; ?></p>
	   				<?php }
   				}
   				if(isset($user_info['enterpriseNumber'])){ ?>
   					<p><b>Τηλέφωνο Εργασίας: </b><?php echo $user_info['enterpriseNumber']; ?></p>
   				<?php } ?>
   				<?php if(isset($user_info['insuranceFund'])){ ?>
   					<p><b>Ασφαλιστικό Ταμείο: </b><?php echo $user_info['insuranceFund']; ?></p>
   				<?php }
   				// If it is an employee
   				if($user_info['userType'] == "Εργαζόμενος"){ ?>
   					<br><b><u>Από τον Εργοδότη:</u></b><br><br>
	   				<?php if(isset($user_info['duringCovid'])){ ?>
   						<div style="text-indent:8%;"><p><b>Εν μέσω Covid-19: </b><?php echo $user_info['duringCovid']; ?></p></div>
   					<?php }
   					if(isset($user_info['onLeave']) && $user_info['onLeave'] != "Δεν έχει γίνει κάποιο αίτημα"){ ?>
   						<div style="text-indent:8%;"><p><b>Άδεια: </b><?php echo $user_info['onLeave'] . " από " . $user_info['onLeaveFrom'] . " έως " . $user_info['onLeaveTo']; ?></p></div>
   					<?php } else { ?>
   						<div style="text-indent:8%;"><p><b>Άδεια: </b>Δεν έχει γίνει κάποιο αίτημα</p></div>
	   				<?php } ?>
   				<?php }
   				// If it is an employer
   				if($user_info['userType'] == "Εργοδότης"){ ?>
   					<p style="display: inline-block; line-height: 0.8;"><b style="line-height: 1.3;">Απαλλαγές Ασφαλιστικών Εισφορών λόγω Covid-19: </b><br><br>
   					<a href="./default.php" id="msform">
						<button class="action-button" style="width:110px; margin:0; margin-left: 25%;">Υπολογισμός</button></a></p>
   				<?php } ?>
   			</div>
   		</div>

   		<!-- If it is an amployer -->
   		<?php if($user_info['userType'] == "Εργοδότης"){ ?>
   		<br><br><br><div class="jumbotron" style="padding: 5px 5px 25px 10px;">
		    <div class="row">
	    		<div class="col"></div>
	    		<div class="col">
	    			<br><h5><u>Λίστα Εργαζομένων</u></h5><br>
	    		</div>
	    		<div class="col"></div>
		    </div>
		    <!-- List of employees -->
	    	<ul>
	    		<!-- For each employee -->
	    		<?php foreach($employees as $employee){ ?>
				<li>
					<button class="showEmployee" type="button" data-toggle="collapse" data-target="#employeeInfo" style="border:none; background-color:transparent;">
						<h5><?php echo $employee['firstName'] . " " . $employee['lastName']; ?></h5>
					</button>
					<div class="collapse" id="employeeInfo">
						<div class="row">
							<div class="col">
						    	<br><h6><u>Προσωπικά Στοιχεία</u></h6>
					   			<br><p><b>e-mail: </b><?php echo $employee['email']; ?></p>
								<p><b>Διεύθυνση Κατοικίας: </b><?php echo $employee['address']; ?></p>
					   			<p><b>Ημερομηνία Γέννησης: </b><?php echo $employee['birthDate']; ?></p>
								<p><b>Σταθερό τηλέφωνο: </b><?php echo $employee['phoneNumber']; ?></p>
								<?php if(isset($employee['cellphoneNumber'])){ ?>
								   	<p><b>Κινητό Τηλέφωνο: </b><?php echo $employee['cellphoneNumber']; ?></p>
								<?php } ?>
						   		<?php if(isset($employee['children'])){ ?>
							   		<p><b>Γονέας τέκνων κάτω των 12 ετών: </b><?php echo $employee['children']; ?></p>
							   	<?php } ?>
							  		<br>
   								</div>
								<div class="col" style="border-left: 1px solid rgb(0,139,139); width:85%; padding-left:3%;">
							    	<br><h6><u>Στοιχεία Εργασίας</u></h6><br>
									<?php if(isset($employee['profession'])){ ?>
								   		<p><b>Επάγγελμα: </b><?php echo $employee['profession']; ?></p>
								   	<?php }
							   		if(isset($employee['enterpriseNumber']) && $employee['enterpriseNumber'] != ''){ ?>
							   			<p><b>Τηλέφωνο Εργασίας: </b><?php echo $employee['enterpriseNumber']; ?></p>
								   	<?php }
								   	if(isset($employee['insuranceFund'])){ ?>
										<p><b>Ασφαλιστικό Ταμείο: </b><?php echo $employee['insuranceFund']; ?></p>
									<?php }
									if(isset($employee['duringCovid'])){
										$_SESSION['update_employee'] = $employee['userID']; ?>
										<br><p><b>Εν μέσω Covid-19: </b><?php echo $employee['duringCovid']; ?></p>
										<div style="text-indent:8%;"><b>Δήλωση για: </b></div>
										<?php if($employee['duringCovid'] == "Δια ζώσης εργασία"){ ?>
											<a href="./exapostasews.php" id="msform">
												<button class="action-button" style="margin-left:5%">Εξ' αποστάσεως εργασία</button></a>
											<a href="./anastolh.php" id="msform">
												<button class="action-button" style="margin-left:5%">Αναστολή εργασίας</button></a>
										<?php } else if(!strncmp($employee['duringCovid'],"Εξ αποστάσεως εργασία",21)){ ?>
											<a href="default.php" id="msform">
												<button class="action-button" style="margin-left:5%">Δια ζώσης εργασία</button></a>
											<a href="./anastolh.php" id="msform">
												<button class="action-button" style="margin-left:5%">Αναστολή εργασίας</button></a>
										<?php } else if(!strncmp($employee['duringCovid'],"Σε αναστολή",11)){ ?>
											<a href="default.php" id="msform">
												<button class="action-button" style="margin-left:5%">Δια ζώσης εργασία</button></a>
											<a href="./exapostasews.php" id="msform">
												<button class="action-button" style="margin-left:5%">Εξ' αποστάσεως εργασία</button></a>
										<?php } ?>
									<?php }
									if(isset($employee['onLeave'])){ ?>
										<?php if($employee['onLeave'] == "Δεν έχει γίνει κάποιο αίτημα"){ ?>
											<br><br><p><b>Άδεια: </b><?php echo $employee['onLeave']; ?></p>
										<?php } else { ?>
											<br><br><p><b>Άδεια: </b><?php echo $employee['onLeave'] . " από " . $employee['onLeaveFrom'] . " έως " . $employee['onLeaveTo']; ?></p>
										<?php }
										// If the employee has made a request
										if($employee['onLeave'] == "Έγινε αίτημα για κανονική άδεια" || $employee['onLeave'] == "Έγινε αίτημα για αναρρωτική άδεια" || $employee['onLeave'] == "Έγινε αίτημα για άδεια άνευ αποδοχών" || $employee['onLeave'] == "Έγινε αίτημα για άδεια ειδικού σκοπού"){
											$_SESSION['update_employee'] = $employee['userID'];
										?>
											<a href="./routes/update_employee.php" id="msform">
												<button class="action-button" style="margin-left:5%">Αποδοχή Αιτήματος</button></a>
		                        		<?php } ?>
									<?php } ?>
								</div>
							</div>
						</div>
					</li>
				<?php } ?>
			</ul>
		</div>
   		<?php } ?>
	</div>
</div>

<script>

	$(".showEmployee").click(function(){
        $("#employeeInfo").collapse('toggle');
    });

</script>

<?php include './footer.php' ?>