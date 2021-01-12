<!-- registration_success.php -->
<?php session_start() ?>
<?php include './header.php' ?>

<link rel="stylesheet" href="./stylesheets/form.css">
<body style="background-color:rgba(198, 198, 236, 0.5)">

<!-- Breadcrumb -->
<div class="sticky">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home" style="padding:4%;display:inline;"></i>Αρχική</a></li>
        <li class="breadcrumb-item active" aria-current="page">Εγγραφή</li>
    </ol>
    </nav>
</div>
<br>

<!-- Show registration was successfull -->
<div class="d-xl-flex">
	<fieldset>
        <div class="form-card">
            <h3 class="fs-title">Καλωσήρθατε!</h3><br><br>
            <div class="row justify-content-center">
                <div class="col-3"> <img src="https://cdn4.iconfinder.com/data/icons/developer-2/100/developer-solid-1-18-512.png" class="fit-image" style="width: 100px; height: 100px;"> </div>
            </div> <br><br>
            <div class="row justify-content-center">
                <div class="col text-center">
                    <h5>Η εγγραφή σας ολοκληρώθηκε με επιτυχία</h5>
                    <!-- Profile -->
                    <a href="user-profile.php" id="msform">
                    	<input type="button" class="action-button" value="Προβολή Προφίλ" style="width: 135px;">
                    </a>
                </div>
            </div>
        </div>
    </fieldset>
</div>


<?php include './footer.php' ?>