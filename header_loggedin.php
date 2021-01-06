<!DOCTYPE html>
<html lang="en">
<head>
	<title>ΥΠΟΥΡΓΕΙΟ ΕΡΓΑΣΙΑΣ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

 	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
	<link rel="stylesheet" href="./stylesheets/header.css">
</head>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

<body style="background-color:rgba(198, 198, 236, 0.8)">

<!-- Toggler/collapsibe Button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	<span class="navbar-toggler-icon"></span>
</button>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-info navbar-light fixed-top" style="height: 110px;">
<!-- Logo -->
<div class="col">
	<a class="navbar-brand" href="./index.php">
    	<img src="Logo.png" alt="Logo" style="height: 110px; width: 250px; border-radius:0%"><!-- or 50% ?? -->
  	</a>
</div>

<!-- Toggler/collapsibe Button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	<span class="navbar-toggler-icon"></span>
</button>

<!-- Collapsible navbar - in case of smaller screen -->
<div class="collapse navbar-collapse" id="collapsibleNavbar">
<!-- Dropdowns -->
<div class="col">
	<ul class="navbar-nav" style="position: relative; margin-left: -3%; margin-top: 8%;">
		<li class="nav-item dropdown">
	    	<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="font-weight: bold;">&nbsp;&nbsp;ΕΡΓΑΖΟΜΕΝΟΙ</a>
      		<div class="dropdown-menu">
		        <a class="dropdown-item" href="#">COVID-19 ΚΑΙ ΕΡΓΑΖΟΜΕΝΟΙ</a>
		        <!-- Border line for large screen -->
		        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
       			<a class="dropdown-item" href="#">ΑΜΟΙΒΕΣ / ΔΩΡΑ / ΑΔΕΙΕΣ</a>
		        <!-- Border line for small screen -->
			    <hr id="smScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.5); width: 55%;">
   			</div>
	    </li>
   		<li class="nav-item dropdown">
	    	<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="font-weight: bold;">&nbsp;&nbsp;ΕΡΓΟΔΟΤΕΣ</a>
      		<div class="dropdown-menu">
		        <a class="dropdown-item" href="#">COVID-19 ΚΑΙ ΕΡΓΟΔΟΤΕΣ</a>
		        <!-- Border line for large screen -->
		        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
       			<a class="dropdown-item" href="#">ΥΠΟΛΟΓΙΣΜΟΣ ΑΣΦΑΛΙΣΤΙΚΩΝ ΕΙΣΦΟΡΩΝ ΕΠΙΧΕΙΡΗΣΗΣ</a>
		        <!-- Border line for small screen -->
			    <hr id="smScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.5); width: 65%;">
   			</div>
	    </li>
		<li class="nav-item dropdown">
	    	<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="font-weight: bold;">&nbsp;&nbsp;ΑΝΕΡΓΟΙ</a>
   			<div class="dropdown-menu">
	        	<a class="dropdown-item" href="#">ΘΕΣΕΙΣ ΕΡΓΑΣΙΑΣ</a>
		        <!-- Border line for large screen -->
		        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
        		<a class="dropdown-item" href="#">ΕΠΙΔΟΜΑΤΑ</a>
		        <!-- Border line for large screen -->
		        <hr id="lgScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.6); width: 80%;">
		        <a class="dropdown-item" href="#">ΕΥΚΑΙΡΙΕΣ ΚΑΤΑΡΤΗΣΗΣ</a>
		        <!-- Border line for small screen -->
			    <hr id="smScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.5); width: 55%;">
   			</div>
    	</li>
    	<li class="nav-item dropdown">
		    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="font-weight: bold;">&nbsp;&nbsp;ΣΥΝΤΑΞΙΟΥΧΟΙ</a>
   			<div class="dropdown-menu">
		        <a class="dropdown-item" href="#">ΝΕΑ ΓΙΑ ΤΙΣ ΣΥΝΤΑΞΕΙΣ</a>
		        <!-- Border line for small screen -->
			    <hr id="smScreen" style="border-top: 2px solid rgba(0, 0, 0, 0.5); width: 55%;">
   			</div>
    	</li>
	</ul>
</div>

<!-- Other Options -->
<div class="col">
	<ul class="navbar-nav mb-3 list-group list-group-horizontal" style="position: relative; margin-right: -5%;">
		<li class="nav-item">
	    	<a class="nav-link" href="#" style="font-size: 87%;">ΚΑΛΩΣΗΡΘΑΤΕ</a>
		</li>
   		<li class="nav-item">
   			<a class="nav-link" href="#" style="font-size: 87%;">|&nbsp;&nbsp;&nbsp;ΕΠΙΚΟΙΝΩΝΙΑ</a>
	    </li>
		<li class="nav-item">
   			<a class="nav-link" href="#" style="font-size: 87%;">|&nbsp;&nbsp;&nbsp;English&nbsp;<i class="fa fa-language"></i></a>
	    </li>
	</ul>

	<!-- Search form -->
	<div class="row"><div class="col-md-3"></div><div class="col">
  		<form class="form-inline" action="" style="width: 250px;">
  			<div class="input-group input-group-sm mb-2">
				<input type="text" class="form-control" placeholder="Search">
				<div class="input-group-append input-group-sm">
		    		<button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
		  		</div>
			</div>
		</form>
	</div></div>
</div>
</div>
</nav>

<br><br><br><br>