<!-- anastolh.php -->
<?php include './header.php' ?>

<link rel="stylesheet" href="./stylesheets/form.css">
<body style="background-color:rgba(198, 198, 236, 0.5)">

<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

<!-- Breadcrumb -->
<div class="sticky">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home" style="padding:4%;display:inline;"></i>Αρχική</a></li>
        <li class="breadcrumb-item"><a href="user-profile.php">Προφίλ</a></li>
        <li class="breadcrumb-item">Δήλωση αναστολής εργασίας</li>
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

        // If the connected user is an employer, store the info of the employee the form is about
        if($user_info['userType'] == 'Εργοδότης'){
            $employeeID = $_SESSION['update_employee'];
            $query = "SELECT * FROM `Users` WHERE userID='$employeeID'";
            $employees = $conn->query($query);
            if(!$employees) die($conn->error);

            // Store employee's info in array
            foreach ($employees as $item){
                foreach ($item as $key => $value){
                    // Skip userIDand  password
                    if($key == "userID" || $key == "password") continue;
                    // If key's value is empty, continue
                    if(!$value || $value=='') continue;

                    $employee[$key] = $value;
                }
            }
        }

        // Disconnect from db
        $conn->close();
    }
?>

<br>

<!-- Forma gia exapestasews ergasia -->

<!-- Progressbar -->
<ul id="progressbar">
    <li class="active" id="professional"><strong>Γενικά στοιχεία επιχείρησης</strong></li>
    <li id="building"><strong>Στοιχεία Παραρτήματος</strong></li>
    <li id="personal"><strong>Στοιχεία Εργοδότη-Νομικού Εκπροσώπου</strong></li>
    <li id="employee"><strong>Στοιχεία Μισθωτού</strong></li>
    <li id="confirm"><strong>Ολοκλήρωση Δήλωσης</strong></li>
</ul>
<!-- Form body -->
<div class="d-xl-flex">
    <form role="form"  data-toggle="validator" class="flex-body" id="msform" method="POST" action="./routes/update_employee.php">
        <!-- Hidden field - keep employee's id in db -->
        <input type="hidden" name="employee" value="<?php echo $_SESSION['update_employee']; ?>">
        <!-- Hidden field - keep employee's status during covid -->
        <input type="hidden" name="duringCovid" value="Σε αναστολή">

        <!-- First form page -->
        <fieldset id="fieldset1">
            <div class="form-card">
                <h3 class="fs-title">Γενικά στοιχεία επιχείρησης</h3><br>

                <!-- Epwnumia -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="epwnumia" class="form-control-label">Επωνυμία *</label>
                        <input name="epwnumia_1" type="text" class="form-control" id="epwnumia_1" data-error="Υποχρεωτικό πεδίο"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $entpr_info['name']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Συμπληρώστε το όνομα της επιχείρησής σας"> </div>  </div>
                </div><br>

                <!-- A.M.E. -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="AME" class="form-control-label">Α.Μ.Ε. *</label>
                        <input name="ame_1" type="text" class="form-control" id="ame_1" data-error="Το Α.M.E. δεν είναι έγκυρο" pattern="^[0-9]{10}"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $user_info['AME']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Aριθμός Μητρώου Εργοδοτών: 10 ψηφία"> </div> 
                    </div>
                </div><br>
                <!-- AFM -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="AFM" class="form-control-label">Α.Φ.Μ. Επιχείρησης *</label>
                        <input name="afm_1" type="text" class="form-control" id="afm_1" data-error="Το Α.Φ.Μ. δεν είναι έγκυρο" pattern="^[0-9]{9}"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $entpr_info['AFM']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Αριθμός Φορολογικού Μητρώου: 9 ψηφία"> </div> 
                    </div>
                </div><br>

                <!-- DOY -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="DOU" class="form-control-label">Δ.Ο.Υ. Επιχείρησης *</label>
                        <input name="dou_1" type="text" class="form-control" id="dou_1" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)"  pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                        <div style="display: table-cell;padding-left: 20px"><br><p></p>
                            <div class="fas fa-question-circle" title="Δημόσια Οικονομική Υπηρεσία: επιλέξτε την Δ.Ο.Υ. της επαρχίας σας. Π.χ. Δημόσια Οικονομική Υπηρεσία Χανίων"> </div> 
                        </div>
                </div><br>
            <!-- Next button -->
            </div><br><input type="button" name="next" class="next action-button" value="Επόμενο">
        </fieldset>
        <!-- Second form page -->
        <fieldset id="fieldset2">
            <div class="form-card">
                <h3 class="fs-title">Στοιχεία Παραρτήματος</h3><br><br>
                <!-- ΙΚΑ -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="IKA" class="form-control-label">Α/Α Παραρτήματος κατά ΙΚΑ *</label>
                        <input name="ika_2" type="text" class="form-control" id="ika_2" data-error="Υποχρεωτικό πεδίο (μόνο ψηφία)" pattern="^[0-9]*$"required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Συμπληρώνετε τον Αύξοντα Αριθμό του Παραρτήματος κατά ΙΚΑ"> </div>  </div>

                </div><br>
                <!-- DRASTHRIOTHTA -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="drasthriothta" class="form-control-label">Δραστηριότητα *</label>
                        <input name="drasthriothta_2" type="text" class="form-control" id="drasthriothta_2" data-error="Υποχρεωτικό πεδίο" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ.,!:]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Περιγραφή της (κύριας) δραστηριότητάς σας ως εργοδότης"> </div>  </div>

                </div><br>
                <!-- KAD -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="KAD" class="form-control-label">Κ.Α.Δ. *</label>
                        <input name="kad_2" type="text" class="form-control" id="kad_2" data-error="0 Κ.Α.Δ. δεν είναι έγκυρος" pattern="^[0-9]{8}" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Συμπληρώνετε τον Κωδικό Αριθμό Δραστηριότητας (8 ψηφία) όπως σας έχει αποδοθεί από την αρμόδια Δ.Ο.Υ."> </div> 
                    </div>
                </div><br>
                <!-- address -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="address" class="form-control-label">Διεύθυνση Παραρτήματος *</label>
                        <input name="address_2" type="text" class="form-control" id="address_2" data-error="Υποχρεωτικό πεδίο"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $entpr_info['address']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Π.χ. Επιδαύρου 46"> </div> 
                    </div>
                </div><br>
                <!-- TK -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="TK" class="form-control-label">Τ.Κ. *</label>
                        <input name="tk_2" type="text" class="form-control" id="tk_2" data-error="O Τ.Κ. δεν είναι έγκυρος" pattern="^[0-9]{5}"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $entpr_info['PC']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Ταχυδρομικός Κωδικός: 5 ψηφία"> </div> 
                    </div>
                </div><br>
                <!-- DHMOS -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="dhmos" class="form-control-label">Δήμος *</label>
                        <input name="dhmos_2" type="text" class="form-control" id="dhmos_2" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $entpr_info['municipality']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Συμπληρώστε το Δήμο στον οποίο ανήκει το παράρτημά σας. Π.χ. Πειραιάς"> </div> 
                    </div>
                </div><br>
                <!-- KOINWTHTA -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="koinothta" class="form-control-label">Δημοτική/Τοπική Κοινότητα *</label>
                        <input name="koinothta_2" type="text" class="form-control" id="koinothta_2" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Συμπληρώστε τη Δημοτική / Τοπική Κοινότητα, όπου βρίσκεται η διεύθυνση της επιχείρησης ή του παραρτήματος. Π.χ. κοινότητα δήμου Αθηναίων"> </div> 
                    </div>
                </div><br>
                <!-- phone number -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="phoneNumber" class="form-control-label">Τηλέφωνο *</label>
                        <input name="phoneNumber_2" type="text" class="form-control" id="phoneNumber_2" data-error="Παρακαλώ δώστε ένα έγκυρο τηλέφωνο" pattern="^[0-9]{10}"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $user_info['enterpriseNumber']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="10 ψήφιος αριθμός"> </div> 
                    </div>
                </div><br>
                 <!-- fax -->
                 <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="fax" class="form-control-label">FAX Παραρτήματος *</label>
                        <input name="fax_2" type="text" class="form-control" id="fax_2" data-error="Παρακαλώ δώστε ένα έγκυρο fax" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="10 ψήφιος αριθμός"> </div> 
                    </div>
                </div><br>
                 <!-- e-mail -->
                 <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="email" class="form-control-label">Ηλεκτρονική διεύθυνση (e-mail) *</label>
                        <input name="email_2" type="email" class="form-control" id="email_2" data-error="Παρακαλώ δώστε ένα έγκυρο e-mail" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Π.χ. name@example.gr"> </div> 
                    </div>
                </div><br>
               
            <!-- Previous & next buttons -->
            </div> <input type="button" name="previous" class="previous action-button-previous" value="Προηγούμενο"/> <input type="button" name="next" class="next action-button" value="Επόμενο">
        </fieldset>
        <!-- Third form page -->
        <fieldset id="fieldset3">
            <div class="form-card">
                <h3 class="fs-title">Στοιχεία Εργοδότη-</h3>
                <h3 class="fs-title">Νομικού Εκπροσώπου</h3><br><br>
                <!-- Last Name -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="lastName" class="form-control-label">Επώνυμο *</label>
                        <input name="lastName_3" type="text" class="form-control" id="lastName_3" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$"
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
                        <input name="firstName_3" type="text" class="form-control" id="firstName_3" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$"
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
                        <input name="fatherName_3" type="text" class="form-control" id="fatherName_3" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>
                <!-- AFM -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="AFM" class="form-control-label">Α.Φ.Μ. *</label>
                        <input name="afm_3" type="text" class="form-control" id="afm_3" data-error="Το Α.Φ.Μ. δεν είναι έγκυρο" pattern="^[0-9]{9}"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $user_info['AFM']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Αριθμός Φορολογικού Μητρώου: 9 ψηφία"> </div> 
                    </div>
                </div><br>
                <!-- DOY -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="DOY" class="form-control-label">Δ.Ο.Υ. *</label>
                        <input name="dou_3" type="text" class="form-control" id="dou_3" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)"  pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                        <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Δημόσια Οικονομική Υπηρεσία: επιλέξτε την Δ.Ο.Υ. της επαρχίας σας. Π.χ. Δημόσια Οικονομική Υπηρεσία Χανίων"> </div> 
                        </div>
                </div><br>
                <!-- address -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="address" class="form-control-label">Διεύθυνση κατοικίας *</label>
                        <input name="address_3" type="text" class="form-control" id="address_3" data-error="Υποχρεωτικό πεδίο"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $user_info['address']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Π.χ. Επιδαύρου 46"> </div> 
                    </div>
                </div><br>
                <!-- TK -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="tk-employer" class="form-control-label">Τ.Κ. *</label>
                        <input name="tk_3" type="text" class="form-control" id="tk_3" data-error="O Τ.Κ. δεν είναι έγκυρος" pattern="^[0-9]{5}"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $user_info['PC']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Ταχυδρομικός Κωδικός: 5 ψηφία"> </div> 
                    </div>
                </div><br>
                <!-- DHMOS -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="dhmos-employer" class="form-control-label">Δήμος *</label>
                        <input name="dhmos_3" type="text" class="form-control" id="dhmos_3" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $user_info['municipality']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Συμπληρώστε τον Δήμο στον οπίο ανήκει η διεύθυνση κατοικίας σας. Π.χ. Πειραιάς"> </div> 
                    </div>
                </div><br>
                 <!-- phone number -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="phoneNumber-employer" class="form-control-label">Τηλέφωνο *</label>
                        <input name="phoneNumber_3r" type="text" class="form-control" id="phoneNumber_3" data-error="Παρακαλώ δώστε ένα έγκυρο τηλέφωνο" pattern="^[0-9]{10}"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $user_info['phoneNumber']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="10 ψήφιος αριθμός"> </div> 
                    </div>
                </div><br>
                 <!-- fax -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="fax-employer" class="form-control-label">FAX *</label>
                        <input name="fax_3" type="text" class="form-control" id="fax_3" data-error="Παρακαλώ δώστε ένα έγκυρο fax" pattern="^[0-9]{10}" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="10 ψήφιος αριθμός"> </div> 
                    </div>
                </div><br>
                <!-- e-mail -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="email-employer" class="form-control-label">Ηλεκτρονική διεύθυνση (e-mail) *</label>
                        <input name="email_3" type="email" class="form-control" id="email_3" data-error="Παρακαλώ δώστε ένα έγκυρο e-mail"<?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $user_info['email']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Π.χ. name@example.gr"> </div> 
                    </div>
                </div><br>
                <!-- eidikes -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="eidikes" class="form-control-label">Ειδικές Περιπτώσεις </label>
                        <input name="eidikes_3" type="text" class="form-control" id="eidikes_3">
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Συμπληρώνονται πληροφορίες για ειδικές περιπτώσεις εργοδοτών - επιχειρήσεων"> </div> 
                    </div>
                </div><br>
            <!-- Previous & next buttons -->
            </div> <input type="button" name="previous" class="previous action-button-previous" value="Προηγούμενο"/> <input type="button" class="next action-button" value="Επόμενο">
        </fieldset>
        <!-- Forth form page -->
        <fieldset id="fieldset4">
            <div class="form-card">
                <h3 class="fs-title">Στοιχεία Μισθωτού</h3><br><br>
                <!-- Α/Α -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="a/a" class="form-control-label">Α/Α (Αύξων Αριθμός) Μισθωτού *</label>
                        <input name="aa_4" type="text" class="form-control" id="aa_4" data-error="Υποχρεωτικό πεδίο (μόνο ψήφια)" pattern="^[0-9]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Συμπληρώστε τον Α/Α του Μισθωτού"> </div>  </div>

                </div><br>
                <!-- AFM -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="AFM" class="form-control-label">Α.Φ.Μ. *</label>
                        <input name="afm_4" type="text" class="form-control" id="afm_4" data-error="Το Α.Φ.Μ. δεν είναι έγκυρο" pattern="^[0-9]{9}"<?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $employee['AFM']; ?>"
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
                        <input name="amka_4" type="text" class="form-control" id="amka_4" data-error="Το Α.Μ.Κ.Α. δεν είναι έγκυρο" pattern="^[0-9]{11}" required>
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
                        <input name="ika_4" type="text" class="form-control" id="ika_4" data-error="Το Ι.Κ.Α δεν είναι έγκυρο" pattern="^[0-9]{9}" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Ίδρυμα Κοινωνικών Ασφαλίσεων: 9 ψηφία"> </div> 
                    </div>
                </div><br>
                <!-- Last Name -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="lastName" class="form-control-label">Επώνυμο *</label>
                        <input name="lastName_4" type="text" class="form-control" id="lastName_4" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $employee['lastName']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>
                <!-- First Name -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="firstName" class="form-control-label">Όνομα *</label>
                        <input name="firstName_4" type="text" class="form-control" id="firstName_4" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $employee['firstName']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>
                <!-- Onoma Patera -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="fatherName" class="form-control-label">Όνομα Πατέρα *</label>
                        <input name="fatherName_4" type="text" class="form-control" id="fatherName_4" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>
                <!-- Onoma Mhteras -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="motherName" class="form-control-label">Όνομα Μητέρας *</label>
                        <input name="motherName_4" type="text" class="form-control" id="motherName_4" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>

                <!--FULO-->
                <div class="form-group" style="display: table-row">
                    <div style="display: table-cell;overflow: auto;"> 
                        <label for="fulo" class="form-control-label">Φύλο*</label><br>
                        <select name="fulo_4" id="fulo_4" class="custom-select" data-error="Παρακαλώ επιλέξτε ένα Φύλο" required>
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
                        <input name="birthDate_4" type="date" class="form-control" id="birthDate_4" data-error="Υποχρεωτικό πεδίο"
                        <?php if(isset($_SESSION['logged_in_user_id'])){ ?>
                            value="<?php echo $employee['birthDate']; ?>"
                        <?php } ?> required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>
                <!-- Oikog. katastash -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="motherName" class="form-control-label">Οικογενειακή Κατάσταση *</label><br>
                        <select name="oikogeneia_4" id="oikogeneia_4" class="custom-select" data-error="Παρακαλώ επιλέξτε την οικογενειακή σας κατάσταση" required>
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
                <!-- Ar.Teknwn -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="children" class="form-control-label">Αριθμός Τέκνων *</label>
                        <input name="children_4" type="text" class="form-control" id="children_4" data-error="Υποχρεωτικό πεδίο (μόνο ψηφία)" pattern="^[0-9]*$" maxlength="2" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Ο αριθμός των παιδιών κάτω από 18 χρονών. 0 αν δεν έχετε"> </div> 
                    </div>
                </div><br>  
                 <!--idiothta-->
                <div class="form-group" style="display: table-row">
                    <div style="display: table-cell;overflow: auto;"> 
                        <label for="idiothta" class="form-control-label">Ιδιότητα Μισθωτού*</label><br>
                        <select name="idiothta_4" id="idiothta_4" class="custom-select"data-error="Παρακαλώ επιλέξτε μία ιδιότητα" required>
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
                        <input name="ar_adeias_4" type="text" class="form-control" id="ar_adeias_4" data-error="Υποχρεωτικό πεδίο (μόνο ψηφία)" pattern="^[0-9]*$" required>
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
                        <input type="date" name="pros_date_4" class="form-control" id="pros_date_4"  data-error="Παρακαλώ δώστε μία έγκυρη ημερομηνία"required> 
                        <div class="help-block with-errors"></div>
                
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Η ημερομηνία πρόσληψής σας"> </div> 
                        </div>
                </div><br>
                <!-- proupologismos -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="proupologismos" class="form-control-label">Προϋπολογισμός (Έτη) *</label>
                        <input name="proupologismos_4" type="text" class="form-control" id="proupologismos_4" data-error="Υποχρεωτικό πεδίο (μόνο ψηφία)" pattern="^[0-9]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="O προϋπολογισμός"> </div> 
                    </div>
                </div><br>  
                <!-- OAED -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="oaed" class="form-control-label">Αναγγελία Πρόσληψης Ο.Α.Ε.Δ. *</label>
                        <input name="oaed_4" type="text" class="form-control" id="oaed_4" data-error="Υποχρεωτικό πεδίο" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ.,!:]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Αναγγελία πρόσληψης μισθωτού"> </div> 
                    </div>
                </div><br>
                <!-- ar. bibliariou anhlikou -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="ar_bibliariou_an" class="form-control-label">Αρ. Βιβλιαρίου Εργασίας Ανηλίκου</label>
                        <input name="ar_bibliariou_an_4" type="text" class="form-control" id="ar_bibliariou_an_4" data-error="Προαιρετικό πεδίο (μόνο ψηφία)" pattern="^[0-9]*$">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="O αριθμός βιβλιαρίου εργασίας ανηλίκου (προαιρετικό)"> </div> 
                    </div>
                </div><br> 
                <!-- ar. bibliariou alodapou -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="ar_bibliariou_al" class="form-control-label">Αρ. Βιβλιαρίου Εργασίας Αλλοδαπού</label>
                        <input name="ar_bibliariou_al_4" type="text" class="form-control" id="ar_bibliariou_al_4" data-error="Προαιρετικό πεδίο (μόνο ψηφία)" pattern="^[0-9]*$">
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
                        <input name="wres_ebd_4" type="text" class="form-control" id="wres_ebd_4" data-error="Υποχρεωτικό πεδίο (μόνο ψηφία)" pattern="^[0-9]*$" maxlength="3" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="O αριθμός των ωρών εργασίας ανά εβδομάδα"> </div> 
                    </div>
                </div><br> 
                <!-- wres enarkshs lhkshs-->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="begin_end_hours" class="form-control-label">Ώρες Έναρξης-Λήξης & Ημέρες Εργασίας</label>
                        <input name="begin_end_hours_4" type="text" class="form-control" id="begin_end_hours_4" pattern="^[0-9.,:-]*$">
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Σε περίπτωση που εναλλάσσεται το εξ αποστάσεως προσωπικό της επιχείρησης, αναγράφονται οι ώρες και οι ημέρες που ο εργαζόμενος παρέχει την εργασία του εξ αποστάσεως"> </div> 
                    </div>
                </div><br> 
                <!-- wres dialeimma-->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="break_hours" class="form-control-label">Ώρες Διαλείμματος - Διακοπής Εργασίας *</label>
                        <input name="break_hours_4" type="text" class="form-control" id="break_hours_4" data-error="Υποχρεωτικό πεδίο (διάστηματα ωρών)" pattern="^[0-9.,:-]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Διάστηματα ωρών διαλείμματος - διακοπής εργασίας"> </div> 
                    </div>
                </div><br> 
                <!--  begin date -->
                <div class="form-group" style="display: table-row">
                    <div style="display: table-cell;overflow: auto;"> 
                        <label for="begin_date" class="form-control-label">Ημερομηνία Έναρξης Αναστολής Εργασίας *</label>
                        <input type="date" name="begin_date_4" class="form-control" id="begin_date_4"  data-error="Υποχρεωτικό πεδίο"required> 
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Η ημερομηνία έναρξης της αναστολής εργασίας"> </div> 
                        </div>
                </div><br>
                <!-- wromisthio-->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="wage_hours" class="form-control-label">Ωρομίσθιο (&euro;) *</label>
                        <input name="wage_hours_4" type="text" class="form-control" id="wage_hours_4" data-error="Υποχρεωτικό πεδίο (μόνο ψηφία)" pattern="^[0-9]*$" required>
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
                        <input name="meiktes_4" type="text" class="form-control" id="meiktes_4" data-error="Υποχρεωτικό πεδίο (μόνο ψηφία)" pattern="^[0-9]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Μεικτές αποδοχές και Εργοδοτικές εισφορές = Καθαρές πληρωτέες αποδοχές + Φ.Μ.Υ. + Εισφορά αλληλεγγύης + Συνολικές ασφαλιστικές εισφορές προς απόδοση"> </div> 
                    </div>
                </div><br> 
                <!-- topos paroxhs ergasias-->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="topos_ergasias" class="form-control-label">Διεύθυνση Εργασίας Μισθωτού *</label>
                        <input name="topos_ergasias_4" type="text" class="form-control" id="topos_ergasias_4" data-error="Υποχρεωτικό πεδίο" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Π.χ. Επιδαύρου 46 Αθήνα Αττική Ελλάδα"> </div> 
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
            if(next_fs.next().next().length > 0){
                var formObj1 = document.getElementById('epwnumia_1');
                var formObj2 = document.getElementById('ame_1');
                var formObj3 = document.getElementById('afm_1');
                var formObj4 = document.getElementById('dou_1');
                if(!formObj1.checkValidity() || !formObj2.checkValidity() || !formObj3.checkValidity() || !formObj4.checkValidity() ){
                    // Add bootstrap 4 was-validated classes to trigger validation messages
                    $('#msform').addClass('was-validated');
                    return false;
                }
            }
            // If this is the second fieldset
            else if(next_fs.next().length > 0){
                var formObj1 = document.getElementById('ika_2');
                var formObj2 = document.getElementById('drasthriothta_2');
                var formObj3 = document.getElementById('kad_2');
                var formObj4 = document.getElementById('address_2');
                var formObj5 = document.getElementById('tk_2');
                var formObj6 = document.getElementById('dhmos_2');
                var formObj7 = document.getElementById('koinothta_2');
                var formObj8 = document.getElementById('phoneNumber_2');
                var formObj9 = document.getElementById('fax_2');
                var formObj10 = document.getElementById('email_2');
                if(!formObj1.checkValidity() || !formObj2.checkValidity() || !formObj3.checkValidity() || !formObj4.checkValidity() ||  !formObj5.checkValidity() || !formObj6.checkValidity() || !formObj7.checkValidity() || !formObj8.checkValidity() || !formObj9.checkValidity() || !formObj10.checkValidity() ){
                    // Add bootstrap 4 was-validated classes to trigger validation messages
                    $('#msform').addClass('was-validated');
                    return false;
                }
            }
            // If this is the third fieldset
            else if(next_fs.length > 0){
                var formObj1 = document.getElementById('lastName_3');
                var formObj2 = document.getElementById('firstName_3');
                var formObj3 = document.getElementById('fatherName_3');
                var formObj4 = document.getElementById('afm_3');
                var formObj5 = document.getElementById('dou_3');
                var formObj6 = document.getElementById('address_3');
                var formObj7 = document.getElementById('tk_3');
                var formObj8 = document.getElementById('dhmos_3');
                var formObj9 = document.getElementById('phoneNumber_3');
                var formObj10 = document.getElementById('fax_3');
                var formObj11 = document.getElementById('email_3');
                var formObj12 = document.getElementById('eidikes_3');
                // if(!formObj1.checkValidity() || !formObj2.checkValidity() || !formObj3.checkValidity() || !formObj4.checkValidity()) {
                if(!formObj1.checkValidity() || !formObj2.checkValidity()|| !formObj3.checkValidity() || !formObj4.checkValidity() || !formObj5.checkValidity() || !formObj6.checkValidity() || !formObj7.checkValidity() || !formObj8.checkValidity() || !formObj9.checkValidity() || !formObj10.checkValidity() || !formObj11.checkValidity() || !formObj12.checkValidity() ) {
                    // Add bootstrap 4 was-validated classes to trigger validation messages
                    $('#msform').addClass('was-validated');
                    return false;
                }
            }
            // If this is the fourth fieldset
            else{
                var formObj1 = document.getElementById('aa_4');
                var formObj2 = document.getElementById('afm_4');
                var formObj3 = document.getElementById('amka_4');
                var formObj4 = document.getElementById('ika_4');
                var formObj5 = document.getElementById('lastName_4');
                var formObj6 = document.getElementById('firstName_4');
                var formObj7 = document.getElementById('fatherName_4');
                var formObj8 = document.getElementById('motherName_4');
                var formObj9 = document.getElementById('fulo_4');
                var formObj10 = document.getElementById('birthDate_4');
                var formObj11 = document.getElementById('oikogeneia_4');
                var formObj12 = document.getElementById('children_4');
                var formObj13 = document.getElementById('idiothta_4');
                var formObj14 = document.getElementById('ar_adeias_4');
                var formObj15 = document.getElementById('pros_date_4');
                var formObj16 = document.getElementById('proupologismos_4');
                var formObj17 = document.getElementById('oaed_4');
                var formObj18 = document.getElementById('ar_bibliariou_an_4');
                var formObj19 = document.getElementById('ar_bibliariou_al_4');
                var formObj20 = document.getElementById('wres_ebd_4');
                var formObj21 = document.getElementById('begin_end_hours_4');
                var formObj22 = document.getElementById('break_hours_4');
                var formObj23 = document.getElementById('begin_date_4');
                var formObj24 = document.getElementById('wage_hours_4');
                var formObj25 = document.getElementById('meiktes_4');
                var formObj26 = document.getElementById('topos_ergasias_4');
                // if(!formObj1.checkValidity() || !formObj2.checkValidity() || !formObj3.checkValidity() || !formObj4.checkValidity()) {
                if(!formObj1.checkValidity() || !formObj2.checkValidity()|| !formObj3.checkValidity() || !formObj4.checkValidity() || !formObj5.checkValidity() || !formObj6.checkValidity() || !formObj7.checkValidity() || !formObj8.checkValidity() || !formObj9.checkValidity() || !formObj10.checkValidity() || !formObj11.checkValidity() || !formObj12.checkValidity()|| !formObj13.checkValidity()|| !formObj14.checkValidity()|| !formObj15.checkValidity()|| !formObj16.checkValidity()|| !formObj17.checkValidity()|| !formObj18.checkValidity()|| !formObj19.checkValidity() || !formObj20.checkValidity()|| !formObj21.checkValidity()|| !formObj22.checkValidity()|| !formObj23.checkValidity()|| !formObj24.checkValidity() || !formObj25.checkValidity()|| !formObj26.checkValidity()) {
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

        // $('.radio-group .radio').click(function(){
        //     $(this).parent().find('.radio').removeClass('selected');
        //     $(this).addClass('selected');
        // });

        $(".submit").click(function(){
            return false;
        })
    });

</script>



<?php include './footer.php' ?>