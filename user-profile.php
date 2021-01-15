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
	if(isset($_SESSION['updated_employee']) && $_SESSION['updated_employee'] == 1){
		print "<div class=\"alert\" style=\"background-color: #A0DAA9; border-color:seagreen; color:#264E36;\">";
    	print "<strong>Οι αλλαγές αποθηκεύτηκαν με επιτυχία!</strong>";
    	print "</div>";

	    unset($_SESSION['updated_employee']);
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
   				<!-- If the user works in an enterprise -->
   				<?php if(isset($user_info['enterpriseID'])){ ?>
   					<p><b>Όνομα Επιχείρησης: </b><?php echo $entpr_info['name']; ?></p>
   					<p><b>Διεύθυνση Επιχείρησης: </b><?php echo $entpr_info['address']; ?></p>
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
   					<div style="line-height: 0.8;">
   						<br><b><u>Από τον Εργοδότη:</u></b><br><br>
	   					<?php if(isset($user_info['duringCovid'])){ ?>
   							<div style="text-indent:8%;"><p><b>Εν μέσω Covid-19: </b><?php echo $user_info['duringCovid']; ?></p></div>
   						<?php }
   						if(isset($user_info['onLeave'])){ ?>
   							<div style="text-indent:8%;"><p><b>Άδεια: </b><?php echo $user_info['onLeave']; ?></p></div>
   						<?php } else { ?>
   							<div style="text-indent:8%;"><p><b>Άδεια: </b>Δεν έχει γίνει κάποιο αίτημα</p></div>
	   					<?php } ?>
	   				</div>
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
								   	<?php } ?>
								   	<!-- The employer can edit few of the employee's info -->
								    <form role="form" data-toggle="validator" class="form-inline justify-content-center" id="msform"
								    	method="POST" action="./routes/update_employee.php">
        								<fieldset style="align-self: center;">
                        					<hr style="border-top: 1px solid #2C3E50; width: 85%;">
								            <input type="hidden" name="employee" value="<?php echo $employee['userID']; ?>">
                							<div class="form-group" style="display: table-row;">
								                <div style="display: table-cell;overflow: auto;">
								                    <label for="duringCovid" class="form-control-label">
								                       	<b>Εν μέσω Covid-19: </b>
								                    </label>
                       								<select name="duringCovid" class="custom-select" id="duringCovid"
                       									style="width:300px;">
														<?php if(!isset($employee['duringCovid'])){ ?>
                       										<option selected></option>
                        									<option value="Δια ζώσης εργασία">Δια ζώσης εργασία</option>
                        									<option value="Εξ' αποστάσεως εργασία">Εξ' αποστάσεως εργασία</option>
                        									<option value="Σε αναστολή">Σε αναστολή</option>
                        								<?php } else { ?>
                        									<option></option>
                        									<?php if($employee['duringCovid'] == "Δια ζώσης εργασία"){ ?>
                        										<option value="Δια ζώσης εργασία" selected>Δια ζώσης εργασία</option>
	                        								<?php } else { ?>
	                        									<option value="Δια ζώσης εργασία">Δια ζώσης εργασία</option>
	                       									<?php }
	                       									if($employee['duringCovid'] == "Εξ' αποστάσεως εργασία"){ ?>
                       											<option value="Εξ' αποστάσεως εργασία" selected>
                       												Εξ' αποστάσεως εργασία</option>
	                       									<?php } else { ?>
	                       										<option value="Εξ' αποστάσεως εργασία">Εξ' αποστάσεως εργασία</option>
	                       									<?php }
	                       									if($employee['duringCovid'] == "Σε αναστολή"){ ?>
                        										<option value="Σε αναστολή" selected>Σε αναστολή</option>
	                       									<?php } else { ?>
	                       										<option value="Σε αναστολή">Σε αναστολή</option>
	                       								<?php }
	                       								} ?>
                       								</select>
								                </div>
								            </div><br>
								            <div class="form-group" style="display: table-row;">
								                <div style="display: table-cell;overflow: auto;">
								                    <label for="onLeave" class="form-control-label">
								                       	<b>Άδεια: </b>
									                </label>
                        							<select name="onLeave" class="custom-select" id="onLeave" style="width:300px;">
														<?php if(!isset($employee['onLeave'])){ ?>
                       										<option value="Δεν έχει γίνει κάποιο αίτημα" selected>
                       											Δεν έχει γίνει κάποιο αίτημα</option>
                       										<option value="Σε κανονική άδεια">Σε κανονική άδεια</option>
                       										<option value="Σε αναρρωτική άδεια">Σε αναρρωτική άδεια</option>
                       										<option value="Σε άδεια άνευ αποδοχών">
                       											Σε άδεια άνευ αποδοχών</option>
                      										<option value="Σε άδεια ειδικού σκοπού">
                    											Σε άδεια ειδικού σκοπού</option>
                       									<?php } else { ?>
                       										<option value="Δεν έχει γίνει κάποιο αίτημα">
                       											Δεν έχει γίνει κάποιο αίτημα</option>
                       										<?php if($employee['onLeave'] == "Σε κανονική άδεια"){ ?>
                       											<option value="Σε κανονική άδεια" selected>
                       												Σε κανονική άδεια</option>
	                       									<?php } else ?>	<option value="Σε κανονική άδεια">
	                       											Σε κανονική άδεια</option>
	                       									<?php if($employee['onLeave'] == "Σε αναρρωτική άδεια"){ ?>
                        										<option value="Σε αναρρωτική άδεια" selected>
                       												Σε αναρρωτική άδεια</option>
	                       									<?php } else ?>	<option value="Σε αναρρωτική άδεια">
	                  											Σε αναρρωτική άδεια</option>
	                       									<?php if($employee['onLeave'] == "Σε άδεια άνευ αποδοχών"){ ?>
                       											<option value="Σε άδεια άνευ αποδοχών" selected>
                        											Σε άδεια άνευ αποδοχών</option>
	                        								<?php } else ?>	<option value="Σε άδεια άνευ αποδοχών">
	                        										Σε άδεια άνευ αποδοχών</option>
	                        								<?php if($employee['onLeave'] == "Σε άδεια ειδικού σκοπού"){ ?>
                        										<option value="Σε άδεια ειδικού σκοπού" selected>
                        											Σε άδεια ειδικού σκοπού</option>
	                        								<?php } else ?>	<option value="Σε άδεια ειδικού σκοπού">
	                        										Σε άδεια ειδικού σκοπού</option>
	                        							<?php } ?>
                        							</select>
								                </div>
								            </div><br>
								            <button type="submit" class="action-button">Αποθήκευση Αλλαγών</button>
                       						<hr style="border-top: 1px solid #2C3E50; width: 80%;">
									   	</fieldset>
								   	</form>
							   		<?php if(isset($employee['enterpriseNumber'])){ ?>
							   			<p><b>Τηλέφωνο Εργασίας: </b><?php echo $employee['enterpriseNumber']; ?></p>
								   	<?php } ?>
								   	<?php if(isset($employee['insuranceFund'])){ ?>
										<p><b>Ασφαλιστικό Ταμείο: </b><?php echo $employee['insuranceFund']; ?></p>
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