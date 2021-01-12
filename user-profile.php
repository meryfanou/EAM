<!-- user-profile.php -->
<?php include './header_loggedin.php' ?>

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

<br><br>
<div class="row flex-container">
	<div class="flex-content">
		<div class="row">
			<div class="col">
  				<img src="images/carousel2.png" alt="John Doe" class="rounded-circle">
  			</div>
			<div class="col">
		    	<br><br><h4>ONOMA <br><small><small><i>IDIOTHTA</i></small></small></h4>
		    </div>
		    <dir class="col-md-4"></dir>
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