<!-- header.php -->
<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ΥΠΟΥΡΓΕΙΟ ΕΡΓΑΣΙΑΣ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

 	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="./stylesheets/header.css">
</head>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!--<body style="background-color:rgba(198, 198, 236, 0.8)">-->

<!-- Toggler/collapsibe Button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	<span class="navbar-toggler-icon"></span>
</button>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="height: 110px; background-color:rgb(0,149,159)">
<!-- Logo -->
<div class="col">
	<a class="navbar-brand" href="./index.php">
    	<img src="images/Logo.png" alt="Logo" style="width: 280px; border-radius:0%">
  	</a>
</div>

<!-- Toggler/collapsibe Button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	<span class="navbar-toggler-icon"></span>
</button>

<!-- Collapsible navbar - in case of smaller screen -->
<div class="collapse navbar-collapse" id="collapsibleNavbar">
	<div class="col">
		<div class="row">
			<!-- Search form -->
			<div class="col"></div>
			<div class="col input-icons" id="search-form">
	            <i class="fas fa-search"></i>
	            <a href="default.php" style="text-decoration:none;"><input class="input-field" type="text" value="Αναζήτηση"></a>
	        </div>
			<!-- Other Options -->
			<div class="col"></div>
			<ul class="navbar-nav mb-3 list-group list-group-horizontal" id="other-options">
				<?php if(!isset($_SESSION['logged_in_user_id'])){ ?>
					<li class="nav-item">
			    		<a class="nav-link" href="./sundesh.php" style="font-size: 87%;">ΣΥΝΔΕΣΗ</a>
					</li>
				<?php }else{ ?>
					<li class="nav-item">
						<a class="nav-link" href="./user-profile.php" style="font-size: 87%;" data-toggle="tooltip" title="Προβολή Προφίλ" data-template="<div class='tooltip' role='tooltip'><div class='tooltip-inner'></div></div>" data-placement="left">
			    			<?php echo $_SESSION['username']; ?>&nbsp;<i class="fas fa-user-circle"></i></a>
						<!-- Tooltip -->
						<script>
						    $(document).ready(function(){
						        $('[data-toggle="tooltip"]').tooltip();
							});
						</script>
					</li>
				<?php }
				if(!isset($_SESSION['logged_in_user_id'])){ ?>
					<li class="nav-item">
				    	<a class="nav-link" href="./registration.php" style="font-size: 87%;">|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ΕΓΓΡΑΦΗ</a>
			    	</li>
				<?php }else{ ?>
					<li class="nav-item">
				    	<a class="nav-link" href="./routes/logout.php" style="font-size: 87%;">|&nbsp;&nbsp;ΑΠΟΣΥΝΔΕΣΗ</a>
			    	</li>
				<?php } ?>
		   		<li class="nav-item">
		   			<a class="nav-link" href="epikoinwnia.php" style="font-size: 87%;">|&nbsp;&nbsp;&nbsp;ΕΠΙΚΟΙΝΩΝΙΑ</a>
			    </li>
				<li class="nav-item">
		   			<a class="nav-link" href="default.php" style="font-size: 87%;">|&nbsp;&nbsp;&nbsp;English&nbsp;<i class="fa fa-language"></i></a>
			    </li>
			</ul>
		</div>

		<div class="row">
			<!-- Dropdowns -->
			<ul class="navbar-nav" id="myDropdown">
				<li class="nav-item dropdown">
			    	<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="font-weight: bold;">&nbsp;&nbsp;ΕΡΓΑΖΟΜΕΝΟΙ</a>
		      		<div class="dropdown-menu">
		       			<a class="dropdown-item" href="default.php">ΑΜΟΙΒΕΣ / ΔΩΡΑ / ΑΔΕΙΕΣ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
				        <a class="dropdown-item" href="default.php">ΥΠΟΛΟΓΙΣΜΟΣ ΩΡΟΜΙΣΘΙΟΥ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
				        <a class="dropdown-item" href="default.php">ΥΠΕΡΕΡΓΑΣΙΑ / ΑΠΟΖΗΜΙΩΣΕΙΣ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
				        <a class="dropdown-item" href="default.php">ΘΕΜΑΤΑ ΑΣΦΑΛΙΣΗΣ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
		       			<a class="dropdown-item" href="default.php">ΓΙΑ ΝΕΟΥΣ ΕΡΓΑΖΟΜΕΝΟΥΣ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
				        <a class="dropdown-item" href="#">COVID-19 & ΕΝΑΛΛΑΚΤΙΚΟΙ ΤΡΟΠΟΙ ΕΡΓΑΣΙΑΣ</a>
				        <!-- Border line for small screen -->
					    <hr id="smScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.5); width: 55%;">
		   			</div>
			    </li>
		   		<li class="nav-item dropdown">
			    	<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="font-weight: bold;">&nbsp;&nbsp;ΕΡΓΟΔΟΤΕΣ</a>
		      		<div class="dropdown-menu">
				        <a class="dropdown-item" href="default.php">ΥΠΟΧΡΕΩΣΕΙΣ ΕΡΓΟΔΟΤΩΝ - ΠΛΗΡΟΦΟΡΙΑΚΟ ΣΥΣΤΗΜΑ ΕΡΓΑΝΗ</a>
		       			<!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
		       			<a class="dropdown-item" href="default.php">ΕΠΙΧΟΡΗΓΗΣΕΙΣ & ΕΠΕΝΔΥΣΕΙΣ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
		       			<a class="dropdown-item" href="default.php">ΥΠΟΛΟΓΙΣΜΟΣ ΑΣΦΑΛΙΣΤΙΚΩΝ ΕΙΣΦΟΡΩΝ ΕΠΙΧΕΙΡΗΣΗΣ</a>
		       			<!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
		       			<a class="dropdown-item" href="default.php">ΑΣΦΑΛΕΙΑ & ΥΓΕΙΑ ΣΤΗΝ ΕΡΓΑΣΙΑ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
				        <a class="dropdown-item" href="./covid.php">COVID-19 & ΕΠΙΧΕΙΡΗΣΕΙΣ</a>
				        <!-- Border line for small screen -->
					    <hr id="smScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.5); width: 65%;">
		   			</div>
			    </li>
				<li class="nav-item dropdown">
			    	<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="font-weight: bold;">&nbsp;&nbsp;ΑΝΕΡΓΟΙ</a>
		   			<div class="dropdown-menu">
			        	<a class="dropdown-item" href="default.php">ΘΕΣΕΙΣ ΕΡΓΑΣΙΑΣ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
		        		<a class="dropdown-item" href="default.php">ΕΠΙΔΟΜΑΤΑ ΑΝΕΡΓΙΑΣ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
				        <a class="dropdown-item" href="default.php">ΠΡΟΓΡΑΜΜΑΤΑ ΚΑΤΑΡΤΗΣΗΣ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
		       			<a class="dropdown-item" href="default.php">ΚΟΙΝΩΦΕΛΗΣ ΕΡΓΑΣΙΑ</a>
				        <!-- Border line for small screen -->
					    <hr id="smScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.5); width: 55%;">
		   			</div>
		    	</li>
		    	<li class="nav-item dropdown">
				    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="font-weight: bold;">&nbsp;&nbsp;ΣΥΝΤΑΞΙΟΥΧΟΙ</a>
		   			<div class="dropdown-menu">
				        <a class="dropdown-item" href="default.php">ΝΕΑ ΓΙΑ ΤΙΣ ΣΥΝΤΑΞΕΙΣ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
		       			<a class="dropdown-item" href="default.php">ΕΠΙΔΟΜΑ ΑΛΛΗΛΕΓΓΥΗΣ ΓΙΑ ΑΝΑΣΦΑΛΙΣΤΟΥΣ ΥΠΕΡΗΛΙΚΕΣ</a>
				        <!-- Border line for small screen -->
					    <hr id="smScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.5); width: 55%;">
		   			</div>
		    	</li>
				<li class="nav-item dropdown">
			    	<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="font-weight: bold;">COVID-19</a>
		      		<div class="dropdown-menu">
				        <a class="dropdown-item" href="./covid.php">ΣΤΟ ΧΩΡΟ ΕΡΓΑΣΙΑΣ: ΟΔΗΓΙΕΣ & ΜΕΤΡΑ ΠΡΟΛΗΨΗΣ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
		       			<a class="dropdown-item" href="#">ΕΝΑΛΛΑΚΤΙΚΟΙ ΤΡΟΠΟΙ ΕΡΓΑΣΙΑΣ & ΕΙΔΙΚΕΣ ΑΔΕΙΕΣ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
				        <a class="dropdown-item" href="default.php">ΕΠΙΧΕΙΡΗΣΕΙΣ: ΕΠΙΔΟΜΑΤΑ / ΤΡΟΠΟΙ ΛΕΙΤΟΥΡΓΙΑΣ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
				        <a class="dropdown-item" href="default.php">ΕYΠΑΘΕΙΣ ΟΜΑΔΕΣ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
		       			<a class="dropdown-item" href="default.php">ΤΕΛΕΥΤΑΙΕΣ ΥΠΟΥΡΓΙΚΕΣ ΑΠΟΦΑΣΕΙΣ</a>
				        <!-- Border line for small screen -->
					    <hr id="smScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.5); width: 55%;">
		   			</div>
			    </li>
		   		<li class="nav-item dropdown">
			    	<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="font-weight: bold;">&nbsp;&nbsp;ΥΠΟΥΡΓΕΙΟ</a>
		      		<div class="dropdown-menu">
				        <a class="dropdown-item" href="default.php">ΤΜΗΜΑΤΑ & ΟΡΓΑΝΩΣΗ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
		       			<a class="dropdown-item" href="default.php">ΝΕΑ & ΑΝΑΚΟΙΝΩΣΕΙΣ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
		       			<a class="dropdown-item" href="default.php">ΑΣΦΑΛΙΣΤΙΚΟΙ ΦΟΡΕΙΣ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
		       			<a class="dropdown-item" href="default.php">ΔΡΑΣΕΙΣ ΕΝΤΑΞΗΣ ΓΙΑ ΕΥΑΛΩΤΕΣ ΟΜΑΔΕΣ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
		       			<a class="dropdown-item" href="default.php">ΔΙΕΘΝΗ ΘΕΜΑΤΑ & ΕΡΓΑΣΙΑ</a>
				        <!-- Border line for large screen -->
				        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
		       			<a class="dropdown-item" href="default.php">ΣΥΧΝΕΣ ΕΡΩΤΗΣΕΙΣ</a>
				        <!-- Border line for small screen -->
					    <hr id="smScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.5); width: 65%;">
		   			</div>
			    </li>
			</ul>
		</div>
	</div>
</div>
</nav>

<br><br><br><br>