<!-- forms/form_success.php -->
<?php include '../public/header.php' ?>

<link rel="stylesheet" href="../stylesheets/form.css">
<body style="background-color:rgba(198, 198, 236, 0.5)">

<!-- Breadcrumb -->
<div class="sticky">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../info/index.php"><i class="fas fa-home" style="padding:4%;display:inline;"></i>Αρχική</a></li>
        <!-- If an employee made a request -->
        <?php if(isset($_SESSION['made_request']) && $_SESSION['made_request'] == 1){ ?>
            <li class="breadcrumb-item"><a href="#">Covid-19 & Εργαζόμενοι</a></li>
            <li class="breadcrumb-item active" aria-current="page">Αίτηση Άδειας ειδικού σκοπού</li>
        <!-- If the employer editted an employee's info -->
        <?php } elseif(isset($_SESSION['updated_employee']) && $_SESSION['updated_employee'] == 1){ ?>
            <li class="breadcrumb-item"><a href="../users/user-profile.php">Προφίλ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Δήλωση κατάστασης εργασίας εργαζομένου </li>
        <?php } ?>
    </ol>
    </nav>
</div>
<br>

<!-- Show form submit was successfull -->
<div class="d-xl-flex">
	<fieldset>
        <div class="form-card">
            <div class="row justify-content-center">
                <div class="col-3"> <img src="https://cdn4.iconfinder.com/data/icons/developer-2/100/developer-solid-1-18-512.png" class="fit-image" style="width: 100px; height: 100px;"> </div>
            </div> <br><br>
            <div class="row justify-content-center">
                <div class="col text-center">
                    <!-- If an employee made a request -->
                    <?php if(isset($_SESSION['made_request']) && $_SESSION['made_request'] == 1){ ?>
                        <h5>Το αίτημά σας υποβλήθηκε με επιτυχία!<br>Ο εργοδότης σας θα ενημερωθεί για αυτό και θα αποφασίσει για την αποδοχή του.</h5>
                        <a href="../info/default.php" id="msform">
                            <input type="button" class="action-button" value="Αποθήκευση αίτησης" style="width: 170px; background-color:#E08119;">
                        </a>
                        <a href="../info/default.php" id="msform">
                            <input type="button" class="action-button" value="Εκτύπωση αίτησης" style="width: 165px; background-color:#E08119;">
                        </a><br><br>
                    <!-- If the employer editted an employee's info -->
                    <?php } elseif(isset($_SESSION['updated_employee']) && $_SESSION['updated_employee'] == 1){ ?>
                        <h5>Η δήλωσή σας για την αλλαγή κατάστασης της εργασίας του εργαζομένου σας λόγω του covid-19 ολοκληρώθηκε με επιτυχία!</h5>
                        <a href="../info/default.php" id="msform">
                            <input type="button" class="action-button" value="Αποθήκευση δήλωσης" style="width: 173px; background-color:#E08119;">
                        </a>
                        <a href="../info/default.php" id="msform">
                            <input type="button" class="action-button" value="Εκτύπωση δήλωσης" style="width: 165px; background-color:#E08119;">
                        </a><br><br>
                    <?php } ?>
                    <!-- Profile -->
                    <a href="../users/user-profile.php" id="msform">
                    	<input type="button" class="action-button" value="Προβολή Προφίλ" style="width: 135px;">
                    </a>
                </div>
            </div>
        </div>
    </fieldset>
</div>


<?php include '../public/footer.php' ?>