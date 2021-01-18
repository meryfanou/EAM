<!-- forms/eidikou_skopou.php -->
<?php include '../public/header.php' ?>

<link rel="stylesheet" href="../stylesheets/form.css">
<body style="background-color:rgba(198, 198, 236, 0.5)">

<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

<!-- Breadcrumb -->
<div class="sticky">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../info/index.php"><i class="fas fa-home" style="padding:4%;display:inline;"></i>Αρχική</a></li>
        <li class="breadcrumb-item"><a href="#">Covid-19 & Εργαζόμενοι</a></li>
        <li class="breadcrumb-item active" aria-current="page">Αίτηση Άδειας ειδικού σκοπού</li>
    </ol>
    </nav>
</div>

<?php 

    // If the user is not logged in, show help message
    if(!isset($_SESSION['logged_in_user_id'])){
        print "<div class=\"alert\" style=\"background-color:#ECDB54; border-color:#B8860B; color:#B8860B;\">";
        print "<strong>Παρακαλώ </strong><a href=\"./sundesh.php\">συνδεθείτε</a><strong> ή </strong><a href=\"./registration.php\">εγγραφείτε</a><strong> πρώτα ώστε να συμπληρωθούν αυτόματα τα στοιχεία σας, όπου είναι εφικτό.</strong>";
        print "</div>";
    }
    else{   // Get user's info from db

        // Connect to database
        require_once '../login.php';
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

                $user_info[$key] = $value;
            }
        }

        // Disconnect from db
        $conn->close();
    }

    // If the user was not logged in before reaching the form
    if(isset($_SESSION['eidikou_skopou'])){
        if($_SESSION['eidikou_skopou'] == 0){
            print "<div class=\"alert\" style=\"background-color: #A0DAA9; border-color:seagreen; color:#264E36;\">";
            print "<strong>Καλωσήρθες " . $_SESSION['username'] . "! Η σύνδεσή σου ολοκληρώθηκε με επιτυχία.</strong>";
            print "</div>";
        }
        if($_SESSION['eidikou_skopou'] == -1){
            print "<div class=\"alert\" style=\"background-color: #A0DAA9; border-color:seagreen; color:#264E36;\">";
            print "<strong>Καλωσήρθες " . $_SESSION['username'] . "! Η εγγραφή σου ολοκληρώθηκε με επιτυχία.</strong>";
            print "</div>";
        }

        unset($_SESSION['eidikou_skopou']);
    }

?>
<br>

<!-- Forma gia adeia eidikou skopou -->

<!-- Progressbar -->
<ul id="progressbar">
    <li class="active" id="personal"><strong>Προσωπικά Στοιχεία</strong></li>
    <li id="employee"><strong>Στοιχεία Μισθωτού</strong></li>
    <li id="child"><strong>Στοιχεία Τέκνου</strong></li>
    <li id="confirm"><strong>Ολοκλήρωση Αίτησης</strong></li>
</ul>

<!-- Form body -->
<div class="d-xl-flex">
    <form role="form"  data-toggle="validator" class="flex-body" id="msform" method="POST" action="../routes/update_employee.php">
        <!-- Hidden field - keep employee's status during covid -->
        <input type="hidden" name="onLeave" value="Έγινε αίτημα για άδεια ειδικού σκοπού">

        <!-- First form page -->
        <fieldset id="fieldset1">
            <div class="form-card">
                <h3 class="fs-title">Προσωπικά Στοιχεία</h3><br>

                <!-- Last Name -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="lastName" class="form-control-label">Επώνυμο *</label>
                        <input name="lastName_1" type="text" class="form-control" id="lastName_1" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $user_info['lastName']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>
                <!-- First Name -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="firstName" class="form-control-label">Όνομα *</label>
                        <input name="firstName_1" type="text" class="form-control" id="firstName_1" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $user_info['firstName']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>
                <!-- Onoma Patera -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="fatherName" class="form-control-label">Όνομα Πατέρα *</label>
                        <input name="fatherName_1" type="text" class="form-control" id="fatherName_1" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>
                <!-- Onoma Mhteras -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="motherName" class="form-control-label">Όνομα Μητέρας *</label>
                        <input name="motherName_1" type="text" class="form-control" id="motherName_1" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>
                <!--FULO-->
                <div class="form-group" style="display: table-row">
                    <div style="display: table-cell;overflow: auto;"> 
                        <label for="fulo" class="form-control-label">Φύλο*</label><br>
                        <select name="fulo_1" id="fulo_1" class="custom-select" data-error="Παρακαλώ επιλέξτε ένα Φύλο" required>
                            <option></option>
                            <option value="Άντρας">Άντρας</option>
                            <option value="Γυναίκα">Γυναίκα</option>
                            <option value="Άλλο">Άλλο</option>
                        </select>
                        <div class="help-block with-errors"></div>    
                    </div>
                </div><br>
                <!-- birth date -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="birthDate" class="form-control-label">Ημερομηνία Γέννησης *</label>
                        <input name="birthDate_1" type="date" class="form-control" id="birthDate_1" data-error="Υποχρεωτικό πεδίο"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $user_info['birthDate']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>
                <!-- phone number -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="phoneNumber" class="form-control-label">Τηλέφωνο Κατοικίας *</label>
                        <input name="phoneNumber_1" type="text" class="form-control" id="phoneNumber_1" data-error="Παρακαλώ δώστε ένα έγκυρο τηλέφωνο" pattern="^[0-9]{10}"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $user_info['phoneNumber']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="10 ψήφιος αριθμός"> </div> 
                    </div>
                </div><br>
                <!-- cellphone number -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="cellphoneNumber" class="form-control-label">Κινητό Τηλέφωνο</label>
                        <input name="cellphoneNumber_1" type="text" class="form-control" id="cellphoneNumber_1" data-error="Παρακαλώ δώστε ένα έγκυρο τηλέφωνο"
                        <?php if(isset($_SESSION['logged_in_user_id']) && isset($user_info['cellphoneNumber'])){ ?>
                            value="<?php echo $user_info['cellphoneNumber']; ?>"
                        <?php } ?> pattern="^[0-9]{10}">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="10 ψήφιος αριθμός που ξεκινά με 69"> </div> 
                    </div>
                </div><br>
            <!-- Next button -->
            </div><br><input type="button" name="next" class="next action-button" value="Επόμενο">
        </fieldset>
        <!-- Second form page -->
        <fieldset id="fieldset2">
            <div class="form-card">
                <h3 class="fs-title">Στοιχεία Μισθωτού</h3><br><br>
                <!-- Α/Α -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="a/a" class="form-control-label">Α/Α (Αύξων Αριθμός) Μισθωτού *</label>
                        <input name="aa_2" type="text" class="form-control" id="aa_2" data-error="Υποχρεωτικό πεδίο (μόνο ψήφια)" pattern="^[0-9]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Συμπληρώστε τον Α/Α του Μισθωτού"> </div>
                    </div>
                </div><br>
                <!-- AFM -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="AFM" class="form-control-label">Α.Φ.Μ. *</label>
                        <input name="afm_2" type="text" class="form-control" id="afm_2" data-error="Το Α.Φ.Μ. δεν είναι έγκυρο" pattern="^[0-9]{9}"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $user_info['AFM']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Αριθμός Φορολογικού Μητρώου: 9 ψηφία"> </div> 
                    </div>
                </div><br>
                <!-- AΜΚΑ -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="AMKA" class="form-control-label">Α.Μ.Κ.Α. *</label>
                        <input name="amka_2" type="text" class="form-control" id="amka_2" data-error="Το Α.Μ.Κ.Α. δεν είναι έγκυρο" pattern="^[0-9]{11}" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Αριθμός Μητρώου Κοινωνικής Ασφάλισης: 11 ψηφία"> </div> 
                    </div>
                </div><br>
                <!-- Ar.Mhtrou -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="ika" class="form-control-label">Αριθμός Μητρώου ΙΚΑ Ασφαλισμένου *</label>
                        <input name="ika_2" type="text" class="form-control" id="ika_2" data-error="Το Ι.Κ.Α δεν είναι έγκυρο" pattern="^[0-9]{9}" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Ίδρυμα Κοινωνικών Ασφαλίσεων: 9 ψηφία"> </div> 
                    </div>
                </div><br>
                <!-- Oikog. katastash -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="motherName" class="form-control-label">Οικογενειακή Κατάσταση *</label><br>
                        <select name="oikogeneia_2" id="oikogeneia_2" class="custom-select" data-error="Παρακαλώ επιλέξτε την οικογενειακή σας κατάσταση" required>
                            <option></option>
                            <option value="Συζεί">Συζεί</option>
                            <option value="Άγαμος/η">Άγαμος/η</option>
                            <option value="Έγγαμος/η">Έγγαμος/η</option>
                            <option value="Διαζευγμένος/η">Διαζευγμένος/η</option>
                            <option value="Σε διάσταση">Σε διάσταση</option>
                            <option value="Χήρος/α">Χήρος/α</option>
                        </select>
                    </div>
                </div><br>
                <!--idiothta-->
                <div class="form-group" style="display: table-row">
                    <div style="display: table-cell;overflow: auto;"> 
                        <label for="idiothta" class="form-control-label">Ιδιότητα Μισθωτού*</label><br>
                        <select name="idiothta_2" id="idiothta_2" class="custom-select"data-error="Παρακαλώ επιλέξτε μία ιδιότητα" required>
                        <option></option>
                        <option value="Εργάτης">Εργάτης</option>
                        <option value="Υπάλληλος">Υπάλληλος</option>
                        <option value="Άλλο">Άλλο</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>          
                <!-- Ar.Adeias -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="ar_adeias" class="form-control-label">Αρ. Άδειας Άσκησης Επαγ. Δραστηριότητας *</label>
                        <input name="ar_adeias_2" type="text" class="form-control" id="ar_adeias_2" data-error="Υποχρεωτικό πεδίο (μόνο ψηφία)" pattern="^[0-9]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Ειδικότητα - Αριθμός Άδειας Άσκησης Επαγγελματικής Δραστηριότητας Μισθωτού"> </div> 
                    </div>
                </div><br>  
                <!-- proslhpshdate -->
                <div class="form-group" style="display: table-row">
                    <div style="display: table-cell;overflow: auto;"> 
                        <label for="date" class="form-control-label">Ημερομηνία Πρόσληψης *</label>
                        <input type="date" name="pros_date_2" class="form-control" id="pros_date_2"  data-error="Παρακαλώ δώστε μία έγκυρη ημερομηνία"required> 
                        <div class="help-block with-errors"></div>
                
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Η ημερομηνία πρόσληψής σας"> </div> 
                        </div>
                </div><br> 
                <!-- OAED -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="oaed" class="form-control-label">Αναγγελία Πρόσληψης Ο.Α.Ε.Δ. *</label>
                        <input name="oaed_2" type="text" class="form-control" id="oaed_2" data-error="Υποχρεωτικό πεδίο" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ.,!:]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Αναγγελία πρόσληψης μισθωτού"> </div> 
                    </div>
                </div><br>
                <!-- ar. bibliariou alodapou -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="ar_bibliariou_al" class="form-control-label">Αρ. Βιβλιαρίου Εργασίας Αλλοδαπού</label>
                        <input name="ar_bibliariou_al_2" type="text" class="form-control" id="ar_bibliariou_al_2" data-error="Προαιρετικό πεδίο (μόνο ψηφία)" pattern="^[0-9]*$">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="O αριθμός βιβλιαρίου εργασίας αλλοδαπού (προαιρετικό)"> </div> 
                    </div>
                </div><br> 
                <!-- wres ebdomadiaiws -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="wres_ebdomadas" class="form-control-label">Ώρες Εργασίας Εβδομαδιαίως *</label>
                        <input name="wres_ebd_2" type="text" class="form-control" id="wres_ebd_2" data-error="Υποχρεωτικό πεδίο (μόνο ψηφία)" pattern="^[0-9]*$" maxlength="3" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="O αριθμός των ωρών εργασίας ανά εβδομάδα"> </div> 
                    </div>
                </div><br>  
                <!--  begin date -->
                <div class="form-group" style="display: table-row">
                    <div style="display: table-cell;overflow: auto;"> 
                        <label for="begin_date" class="form-control-label">Ημερομηνία Έναρξης Περιόδου Άδειας *</label>
                        <input type="date" name="begin_date_2" class="form-control" id="begin_date_2"  data-error="Υποχρεωτικό πεδίο"required> 
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Η ημερομηνία έναρξης της ισχύος της άδειας ειδικού σκοπού"> </div> 
                        </div>
                </div><br>
                <!-- end date -->
                <div class="form-group" style="display: table-row">
                    <div style="display: table-cell;overflow: auto;"> 
                        <label for="end_date" class="form-control-label">Ημερομηνία Λήξης Περιόδου Άδειας *</label>
                        <input type="date" name="end_date_2" class="form-control" id="end_date_2"  data-error="Υποχρεωτικό πεδίο"required> 
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Η ημερομηνία λήξης της ισχύος της άδειας ειδικού σκοπού"> </div> 
                        </div>
                </div><br>
                <!-- wromisthio-->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="wage_hours" class="form-control-label">Ωρομίσθιο (&euro;) *</label>
                        <input name="wage_hours_2" type="text" class="form-control" id="wage_hours_2" data-error="Υποχρεωτικό πεδίο (μόνο ψηφία)" pattern="^[0-9]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Χρήματα ανά Ώρα εργασίας"> </div> 
                    </div>
                </div><br> 
                <!-- meiktes apodoxes-->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="meiktes" class="form-control-label">Μεικτές Αποδοχές (&euro;) *</label>
                        <input name="meiktes_2" type="text" class="form-control" id="meiktes_2" data-error="Υποχρεωτικό πεδίο (μόνο ψηφία)" pattern="^[0-9]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Μεικτές αποδοχές και Εργοδοτικές εισφορές = Καθαρές πληρωτέες αποδοχές + Φ.Μ.Υ. + Εισφορά αλληλεγγύης + Συνολικές ασφαλιστικές εισφορές προς απόδοση"> </div> 
                    </div>
                </div><br> 
                <!-- topos paroxhs ergasias-->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="topos_ergasias" class="form-control-label">Διεύθυνση Εργασίας *</label>
                        <input name="topos_ergasias_2" type="text" class="form-control" id="topos_ergasias_2" data-error="Υποχρεωτικό πεδίο" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Π.χ. Επιδαύρου 46 Αθήνα Αττική Ελλάδα"> </div> 
                    </div>
                </div><br>
                <!--epiloges gia goneis-->
                <div class="form-group" style="display: table-row">
                    <div style="display: table-cell;overflow: auto;"> 
                        <label for="idiothta" class="form-control-label">Επιλογές Γονέων*</label><br>
                        <select name="epilogh_gonea_2" id="epilogh_gonea_2" class="custom-select"data-error="Παρακαλώ επιλέξτε μία ιδιότητα" required>
                            <option></option>
                            <option value="Ιδιωτικός τομέας : και οι δύο γονείς εργάζονται στον ίδιο εργοδότη">Ιδιωτικός τομέας : και οι δύο γονείς εργάζονται στον ίδιο εργοδότη</option>
                            <option value="Ιδιωτικός τομέας : οι γονείς εργάζονται σε διαφοτερικό εργοδότη">Ιδιωτικός τομέας : οι γονείς εργάζονται σε διαφοτερικό εργοδότη</option>
                            <option value="Ένας γονέας σε μισθωτή εργασία και ο άλλος ελεύθερος επαγγελματίας">Ένας γονέας σε μισθωτή εργασία και ο άλλος ελεύθερος επαγγελματίας</option>
                            <option value="Ένας εκ των δύο δουλεύει στο δημόσιο">Ένας εκ των δύο δουλεύει στο δημόσιο</option>
                            <option value="Μόνο ο ένας γονέας εργάζεται">Μόνο ο ένας γονέας εργάζεται</option>
                            <option value="Περίπτωση διαζυγίου,διάστασης ή γέννησης τέκνου εκτός γάμου">Περίπτωση διαζυγίου,διάστασης ή γέννησης τέκνου εκτός γάμου</option>
                            <option value="Περίπτωση Μονογονέα">Περίπτωση Μονογονέα</option>
                            <option value="Και οι δύο γονείς εργάζονται αλλά ο ένας εξ αυτών βρίσκεται σε άλλη νομική άδεια">Και οι δύο γονείς εργάζονται αλλά ο ένας εξ αυτών βρίσκεται σε άλλη νομική άδεια</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>
                <!-- sxolia -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="sxolia_2" class="form-control-label">Σχόλια</label>
                        <input name="sxolia_2" type="text" class="form-control" id="sxolia_2">
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Σε περίπτωση που υπάρχει και άλλος γονέας και μπορεί να γίνει επιλογή αν θα πάρετε την άδεια αποκλειστικά εσείς ή θα μοιρασθεί η άδεια και στους δύο, συμπληρώνετε την επιλογή σας. Επίσης στην περίπτωση που μοιρασθείτε την άδεια, συμπληρώνετε τα διαστήματα για τα οποία ισχύει συγκεκριμένα για εσάς."> </div> 
                    </div>
                </div><br>
            <!-- Previous & next buttons -->
            </div> <input type="button" name="previous" class="previous action-button-previous" value="Προηγούμενο"/> <input type="button" class="next action-button" value="Επόμενο">
        </fieldset>
        <!-- Third form page -->
        <fieldset id="fieldset3">
            <div class="form-card">
                <h3 class="fs-title">Στοιχεία Τέκνου</h3>
                 <!--kathgoria teknou-->
                <div class="form-group" style="display: table-row">
                    <div style="display: table-cell;overflow: auto;"> 
                        <br><label for="idiothta" class="form-control-label">Κατηγορία Τέκνου*</label><br>
                        <select name="kathgoria_paidiou_3" id="kathgoria_paidiou_3" class="custom-select"data-error="Παρακαλώ επιλέξτε μία ιδιότητα" required>
                            <option></option>
                            <option value="Εγγεγραμμένο σε βρεφικό,βρεφονηπιακό ή παιδικό σταθμό">Εγγεγραμμένο σε βρεφικό,βρεφονηπιακό ή παιδικό σταθμό</option>
                            <option value="Φοίτηση σε σχολική μονάδα υποχρεωτικής εκπαίδευσης(Νηπιαγωγείο, Δημοτικό, Γυμνάσιο)">Φοίτηση σε σχολική μονάδα υποχρεωτικής εκπαίδευσης(Νηπιαγωγείο, Δημοτικό, Γυμνάσιο)</option>
                            <option value="Φοίτηση σε ειδικά σχολεία ή σχολικές μονάδες ειδικής αγωγής και εκπαίδευσης, ανεξαρτήτως ορίου ηλικίας των παιδιών">Φοίτηση σε ειδικά σχολεία ή σχολικές μονάδες ειδικής αγωγής και εκπαίδευσης, ανεξαρτήτως ορίου ηλικίας των παιδιών</option>
                            <option value="Παιδί που είναι άτομο με αναπηρία και είναι ωφελούμενο σε δομές παροχής υπηρεσιών ανοικτής φροντίδας για άτομα με αναπηρία,ανεξαρτήτως της ηλικίας του">Παιδί που είναι άτομο με αναπηρία και είναι ωφελούμενο σε δομές παροχής υπηρεσιών ανοικτής φροντίδας για άτομα με αναπηρία,ανεξαρτήτως της ηλικίας του</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>                
                <!-- Last Name -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="lastName" class="form-control-label">Επώνυμο Τέκνου *</label>
                        <input name="lastName_3" type="text" class="form-control" id="lastName_3" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>
                <!-- First Name -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="firstName" class="form-control-label">Όνομα Τέκνου*</label>
                        <input name="firstName_3" type="text" class="form-control" id="firstName_3" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>
                <!-- AFM -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="AFM" class="form-control-label">Α.Φ.Μ. Τέκνου</label>
                        <input name="afm_3" type="text" class="form-control" id="afm_3" data-error="Το Α.Φ.Μ. δεν είναι έγκυρο" pattern="^[0-9]{9}">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Αριθμός Φορολογικού Μητρώου: 9 ψηφία"> </div> 
                    </div>
                </div><br>
                <!-- address -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="address" class="form-control-label">Διεύθυνση κατοικίας Τέκνου*</label>
                        <input name="address_3" type="text" class="form-control" id="address_3" data-error="Υποχρεωτικό πεδίο" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Π.χ. Επιδαύρου 46"> </div> 
                    </div>
                </div><br>
                <!-- sxoleio -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="sxoleio" class="form-control-label">Εκπαιδευτική Μονάδα Φοίτησης *</label>
                        <input name="sxoleio_3" type="text" class="form-control" id="sxoleio_3">
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Π.χ. 7ο Γυμνάσιο Αμαρουσίου Αττικής"> </div> 
                    </div>
                </div><br>
            </div>

            <!-- Previous & Trigger modal buttons -->
            <input type="button" name="previous" class="previous action-button-previous" value="Προηγούμενο"/> <input type="button" data-toggle="modal" data-target="#myModal" class="action-button" value="Υποβολή">

            <!-- Modal -->
            <div  id="myModal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin: 200px 0px 0px 5px " >
                <div style="background-color: rgba(255, 255, 255, 0.6);" class="modal-header">
                   
                    <h3 id="myModalLabel">Επιβεβαίωση</h3>
                </div>
                <div style="background-color: rgba(255, 255, 255, 0.6)" class="modal-body">
                    <form id="myForm" method="post">
                       <h5>Είστε σίγουροι για τα στοιχεία σας; </h5>
                    </form>
                </div>
                <div style="background-color: rgba(255, 255, 255, 0.6)"class="modal-footer">
                    <button class='btn btn-danger' data-dismiss='modal' aria-hidden='true'>Άκυρο</button>
                    <!-- Submit form button -->
                    <button type="submit" name="next" class="next action-button">Συνέχεια</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>


<script>

    // Submit form, only if all inputs are valid
    $("#msform").submit(function(event) {
        // make selected form variable
        var vForm = $(this);
    
        /* If not valid prevent form submit https://developer.mozilla.org/en-US/docs/Web/API/HTMLSelectElement/checkValidity */
        if (vForm[0].checkValidity() === false) {
            event.preventDefault()
            event.stopPropagation()
        }
    
        // Add bootstrap 4 was-validated classes to trigger validation messages
        vForm.addClass('was-validated');
    });

    $(document).ready(function(){
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;

        // When a 'next' button is clicked
        $(".next").click(function(){
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            // Check if form is valid before moving to the next step
            // If this is the first fieldset
            if(next_fs.next().length > 0){
                var formObj1 = document.getElementById('lastName_1');
                var formObj2 = document.getElementById('firstName_1');
                var formObj3 = document.getElementById('fatherName_1');
                var formObj4 = document.getElementById('motherName_1');
                var formObj5 = document.getElementById('fulo_1');
                var formObj6 = document.getElementById('birthDate_1');
                var formObj7 = document.getElementById('phoneNumber_1');
                var formObj8 = document.getElementById('cellphoneNumber_1');
    
                if(!formObj1.checkValidity() || !formObj2.checkValidity() || !formObj3.checkValidity() || !formObj4.checkValidity()|| !formObj5.checkValidity()|| !formObj6.checkValidity()|| !formObj7.checkValidity()|| !formObj8.checkValidity() ){
                    // Add bootstrap 4 was-validated classes to trigger validation messages
                    $('#msform').addClass('was-validated');
                    return false;
                }
            }
            // If this is the second fieldset
            else if(next_fs.length > 0){
                var formObj1 = document.getElementById('aa_2');
                var formObj2 = document.getElementById('afm_2');
                var formObj3 = document.getElementById('amka_2');
                var formObj4 = document.getElementById('ika_2'); 
                var formObj5 = document.getElementById('oikogeneia_2');
                var formObj6 = document.getElementById('idiothta_2');
                var formObj7 = document.getElementById('ar_adeias_2');
                var formObj8 = document.getElementById('pros_date_2');
                var formObj9 = document.getElementById('oaed_2');
                var formObj10 = document.getElementById('ar_bibliariou_al_2');
                var formObj11 = document.getElementById('wres_ebd_2');
                var formObj12 = document.getElementById('begin_date_2');
                var formObj13 = document.getElementById('end_date_2');
                var formObj14 = document.getElementById('wage_hours_2');
                var formObj15 = document.getElementById('meiktes_2');
                var formObj16 = document.getElementById('topos_ergasias_2');
                var formObj17 = document.getElementById('epilogh_gonea_2');
                var formObj18 = document.getElementById('sxolia_2');

                if(!formObj1.checkValidity() || !formObj2.checkValidity()|| !formObj3.checkValidity() || !formObj4.checkValidity() || !formObj5.checkValidity() || !formObj6.checkValidity() || !formObj7.checkValidity() || !formObj8.checkValidity() || !formObj9.checkValidity() || !formObj10.checkValidity() || !formObj11.checkValidity() || !formObj12.checkValidity()|| !formObj13.checkValidity()|| !formObj14.checkValidity()|| !formObj15.checkValidity()|| !formObj16.checkValidity()|| !formObj17.checkValidity()|| !formObj18.checkValidity()) {
                    // Add bootstrap 4 was-validated classes to trigger validation messages
                    $('#msform').addClass('was-validated');
                    return false;
                }
            }
            // If this is the third fieldset
            else{
                var formObj1 = document.getElementById('kathgoria_paidiou_3');
                var formObj2 = document.getElementById('lastName_3');
                var formObj3 = document.getElementById('firstName_3');
                var formObj4 = document.getElementById('afm_3');
                var formObj5 = document.getElementById('address_3');
                var formObj6 = document.getElementById('sxoleio_3');
                if(!formObj1.checkValidity() || !formObj2.checkValidity()|| !formObj3.checkValidity() || !formObj4.checkValidity() || !formObj5.checkValidity() || !formObj6.checkValidity() ) {
                    // Add bootstrap 4 was-validated classes to trigger validation messages
                    $('#msform').addClass('was-validated');
                    return false;
                }
            }

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                },
                duration: 600
            });
        });

        // When a 'prev' button is clicked
        $(".previous").click(function(){
            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({'opacity': opacity});
                },
                duration: 600
            });
        });

        $(".submit").click(function(){
            return false;
        })
    });

</script>



<?php include '../public/footer.php' ?>