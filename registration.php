<!-- registration.php -->
<?php include './header.php' ?>

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"> -->
<link rel="stylesheet" href="./stylesheets/form.css">
<body style="background-color:rgba(198, 198, 236, 0.5)">

<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

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

<!-- Registration form -->

<!-- Progressbar -->
<ul id="progressbar">
    <li class="active" id="account"><strong>Στοιχεία Σύνδεσης</strong></li>
    <li id="personal"><strong>Προσωπικά Στοιχεία</strong></li>
    <li id="professional"><strong>Στοιχεία Εργασίας</strong></li>
    <li id="confirm"><strong>Ολοκλήρωση Εγγραφής</strong></li>
</ul>
<!-- Form body -->
<div class="d-xl-flex">
    <form role="form"  data-toggle="validator" class="flex-body" id="msform" method="POST" action="./routes/registration.php">
        <!-- First form page -->
        <fieldset id="fieldset1">
            <div class="form-card">
                <h3 class="fs-title">Στοιχεία Σύνδεσης</h3><br><br>
                <!-- Username -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="username" class="form-control-label">Username (Όνομα Χρήστη) </label>
                        <input name="username" type="text" class="form-control" id="username" data-error="Παρακαλώ επιλέξτε ένα έγκυρο username" minlength="4" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Tο username πρέπει να αποτελείται από τουλάχιστον 4 χαρακτήρες"> </div>  </div>
                </div><br>
                <!-- Password -->
                <div class="form-group" style="display: table-row">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="password" class="form-control-label">Κωδικός πρόσβασης</label>
                        <input name="password" type="password" class="form-control" id="password" data-error="Ο Κωδικός δεν είναι έγκυρος" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Ο κωδικός πρόσβασης πρέπει να αποτελείται από τουλάχιστον 8 χαρακτήρες και να περιέχει οπωσδήποτε 1 κεφαλαίο γράμμα, 1 πεζό γράμμα και 1 αριθμητικό"> </div> 
                    </div>
                </div><br>
                <!-- Confirm Password -->
                <div class="form-group" style="display: table-row">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="password" class="form-control-label">Επιβεβαίωση κωδικού πρόσβασης</label>
                        <input name="confirm-pwd" type="password" class="form-control" id="confirm-pwd" data-match="#password" data-error="Η επαλήθευση και ο κωδικός διαφέρουν" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Ο κωδικός πρόσβασης πρέπει να αποτελείται από τουλάχιστον 8 χαρακτήρες και να περιέχει οπωσδήποτε 1 κεφαλαίο γράμμα, 1 πεζό γράμμα και 1 αριθμητικό"> </div> 
                    </div>
                </div><br>
            <!-- Next button -->
            </div><br><input type="button" name="next" class="next action-button" value="Επόμενο">
        </fieldset>
        <!-- Second form page -->
        <fieldset id="fieldset2">
            <div class="form-card">
                <h3 class="fs-title">Προσωπικά Στοιχεία</h3><br><br>
                <!-- First Name -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="firstName" class="form-control-label">Όνομα *</label>
                        <input name="firstName" type="text" class="form-control" id="firstName" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>
                <!-- Last Name -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="lastName" class="form-control-label">Επώνυμο *</label>
                        <input name="lastName" type="text" class="form-control" id="lastName" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>
                <!-- AFM -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="AFM" class="form-control-label">Α.Φ.Μ. *</label>
                        <input name="afm" type="text" class="form-control" id="AFM" data-error="Το Α.Φ.Μ. δεν είναι έγκυρο" pattern="^[0-9]{9}" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Αριθμός Φορολογικού Μητρώου: 9 ψηφία"> </div> 
                    </div>
                </div><br>
                <!-- e-mail -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="email" class="form-control-label">Ηλεκτρονική διεύθυνση (e-mail) *</label>
                        <input name="email" type="email" class="form-control" id="email" data-error="Παρακαλώ δώστε ένα έγκυρο e-mail" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Π.χ. name@example.gr"> </div> 
                    </div>
                </div><br>
                <!-- address -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="address" class="form-control-label">Διεύθυνση κατοικίας *</label>
                        <input name="address" type="text" class="form-control" id="address" data-error="Υποχρεωτικό πεδίο" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Π.χ. Επιδαύρου 46 Αθήνα Αττική Ελλάδα"> </div> 
                    </div>
                </div><br>
                <!-- birth date -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="birthDate" class="form-control-label">Ημερομηνία Γέννησης *</label>
                        <input name="birthDate" type="date" class="form-control" id="birthDate" data-error="Υποχρεωτικό πεδίο" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><br>
                <!-- phone number -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="phoneNumber" class="form-control-label">Σταθερό Τηλέφωνο *</label>
                        <input name="phoneNumber" type="text" class="form-control" id="phoneNumber" data-error="Παρακαλώ δώστε ένα έγκυρο τηλέφωνο" pattern="^[0-9]{10}" required>
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
                        <input name="cellphoneNumber" type="text" class="form-control" id="cellphoneNumber" data-error="Παρακαλώ δώστε ένα έγκυρο τηλέφωνο" pattern="^[0-9]{10}">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="10 ψήφιος αριθμός που ξεκινά με 69"> </div> 
                    </div>
                </div><br>
                <!-- children -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="children" class="form-control-label">Έχετε παιδί/παιδιά κάτω των 12 ετών;</label><br>
                        <select name="children" class="custom-select" id="children">
                            <option></option>
                            <option value="Ναι">Nαι</option>
                            <option value="Όχι">Όχι</option>
                        </select>
                    </div>
                </div><br>
            <!-- Previous & next buttons -->
            </div> <input type="button" name="previous" class="previous action-button-previous" value="Προηγούμενο"/> <input type="button" name="next" class="next action-button" value="Επόμενο">
        </fieldset>
        <!-- Third form page -->
        <fieldset id="fieldset3">
            <div class="form-card">
                <h3 class="fs-title">Στοιχεία Εργασίας</h3><br><br>
                <!-- User type -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="userType" class="form-control-label">Eπαγγελματική κατάσταση *</label><br>
                        <select name="userType" class="custom-select" id="userType" data-error="Υποχρεωτικό πεδίο" onchange="changeUsertype(this)" required>
                            <option></option>
                            <option value="Εργοδότης">Εργοδότης</option>
                            <option value="Εργαζόμενος">Εργαζόμενος</option>
                            <option value="Άνεργος">Άνεργος</option>
                            <option value="Συνταξιούχος">Συνταξιούχος</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Επιλέξτε βάσει της τρέχουσας επαγγελματικής σας κατάστασης"> </div> 
                    </div>
                </div>
                <!-- Profession -->
                <div class="form-group" id="profession" style="display: none;">
                    <div style="display: table-cell;overflow: auto;">
                        <br><label for="profession_inp" class="form-control-label">Επάγγελμα *</label>
                        <input name="profession" type="text" class="form-control" id="profession_inp" data-error="Υποχρεωτικό πεδίο">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <!-- Enterprise for employer -->
                <div class="form-group" id="employerEnterprise" style="display: none;">
                    <div style="display: table-cell;overflow: auto;">
                        <br><br><h5>Καταχώρηση Επιχείρησης *</h5>
                        <hr style="border-top: 1px solid #2C3E50; width: 80%;">
                    </div>
                </div>
                <!-- The emplyer should give their enterprise's name (required) -->
                <div class="form-group" id="enterpriseName" style="display: none;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="enterpriseName_inp" class="form-control-label">Όνομα Επιχείρησης *</label><br>
                        <input name="enterpriseName" type="text" class="form-control" id="enterpriseName_inp" data-error="Υποχρεωτικό πεδίο">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Συμπληρώστε το όνομα της επιχείρησής σας"> </div> 
                    </div>
                </div>
                <!-- The emplyer should give their enterprise's address (required) -->
                <div class="form-group" id="enterpriseAddress" style="display: none;">
                    <div style="display: table-cell;overflow: auto;">
                        <br><label for="enterpriseAddress_inp" class="form-control-label">Διεύθυνση Επιχείρησης *</label><br>
                        <input name="enterpriseAddress" type="text" class="form-control" id="enterpriseAddress_inp" data-error="Υποχρεωτικό πεδίο">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <br><div class="fas fa-question-circle" title="Π.χ. Επιδαύρου 46 Αθήνα Αττική Ελλάδα"> </div> 
                    </div>
                </div>
                <!-- The emplyer can give their enterprise's current status -->
                <div class="form-group" id="enterpriseStatus" style="display: none;">
                    <div style="display: table-cell;overflow: auto;">
                        <br><label for="enterpriseStatus" class="form-control-label">Κατάσταση εν μέσω Covid19</label><br>
                        <select name="enterpriseStatus" class="custom-select">
                            <option></option>
                            <option value="Σε λειτουργεία">Σε λειτουργεία</option>
                            <option value="Σε αναστολή">Σε αναστολή</option>
                            <option value="Άλλο">´Αλλο</option>
                        </select>
                        <hr style="border-top: 1px solid #2C3E50; width: 80%;">
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <br><div class="fas fa-question-circle" title="Επιλέξτε την τρέχουσα κατάσταση της επιχείρησής σας"> </div> 
                    </div>
                </div>
                <!-- Enterprise for employee -->
                <div class="form-group" id="employeeEnterprise" style="display: none;">
                    <div style="display: table-cell;overflow: auto;">
                        <br><label for="enterprise" class="form-control-label">Επιχείρηση *</label><br>
                        <select name="enterprise" class="custom-select" id="enterprise" data-error="Υποχρεωτικό πεδίο">
                            <option></option>
                            <?php
                                    // connect to database
                                    require_once './login.php';
                                    $conn = new mysqli($hn,$un,$pw,$db);
                                    if($conn->connect_error) die($conn->connect_error);
                                    // Get eneterpiseID,name for all enterprises in db
                                    $query = "SELECT enterpriseID,name FROM `Enterprises`";
                                    $result = $conn->query($query);
                                    // For all rows in result
                                    for($i=0; $i<$result->num_rows; ++$i){
                                        $result->data_seek($i);
                                        $enterpriseID = $result->fetch_assoc()['enterpriseID'];
                                        $result->data_seek($i);
                                        $name = $result->fetch_assoc()['name'];
                                        // Show current enterprise name as an option - the option's value will be the enterpriseID
                                        print "<option value=\"$enterpriseID\">$name</option>";
                                    }
                                    $conn->close();
                            ?>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <br><div class="fas fa-question-circle" title="Επιλέξτε μια από τις υπάρχουσες επιχειρήσεις, στην οποία κι εργάζεστε"> </div> 
                    </div>
                </div>
                <!-- Enterprise phone number -->
                <div class="form-group" id="enterpriseNumber" style="display: none;">
                    <div style="display: table-cell;overflow: auto;">
                        <br><label for="enterpriseNumber" class="form-control-label">Τηλέφωνο Εργασίας</label>
                        <input name="enterpriseNumber" type="text" class="form-control" data-error="Παρακαλώ δώστε ένα έγκυρο τηλέφωνο" pattern="^[0-9]{10}">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <br><div class="fas fa-question-circle" title="10 ψήφιος αριθμός"> </div> 
                    </div>
                </div>
                <!-- INsurance fund -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <br><label for="fund" class="form-control-label">Ασφαλιστικό Ταμείο</label>
                        <input name="fund" type="text" class="form-control" id="fund">
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <br><div class="fas fa-question-circle" title="Συμπληρώνετε το ασφαλιστικό σας ταμείο"> </div> 
                    </div>
                </div><br>
            <!-- Previous & next buttons -->
            </div> <input type="button" name="previous" class="previous action-button-previous" value="Προηγούμενο"/> <button type="submit" class="next action-button">Εγγραφή</button>
        </fieldset>
    </form>
</div>


<script>
    // Change form inputs based on user's selection (Εργαζόμενος,Εργοδότης,Άνεργος,Συνταξιούχος)
    function changeUsertype(selectEl) {
        let selectedValue = selectEl.options[selectEl.selectedIndex].value;
        // Show profession & enterpriseNumber inputs only if 'Εργοδότης'/'Εργαζόμενος' is selected
        if(selectedValue === "Εργοδότης" || selectedValue === "Εργαζόμενος"){
            let enterpriseNumber = document.getElementById('enterpriseNumber');
            enterpriseNumber.setAttribute('style', 'display:table-row');

            let profession = document.getElementById('profession');
            profession.setAttribute('style', 'display:table-row');
            let profession_inp = document.getElementById('profession_inp');
            profession_inp.setAttribute('required', 'required');
        }
        else{
            let enterpriseNumber = document.getElementById('enterpriseNumber');
            enterpriseNumber.setAttribute('style', 'display:none');

            let profession = document.getElementById('profession');
            profession.setAttribute('style', 'display:none');
            let profession_inp = document.getElementById('profession_inp');
            profession_inp.removeAttribute('required');
        }

        // Show enterprise input for employer only if 'Εργοδότης' is selected
        if(selectedValue === "Εργοδότης"){
            let enterprise = document.getElementById('employerEnterprise');
            enterprise.setAttribute('style', 'display:table-row');

            let enterpriseName = document.getElementById('enterpriseName');
            enterpriseName.setAttribute('style', 'display:table-row');
            let enterpriseName_inp = document.getElementById('enterpriseName_inp');
            enterpriseName_inp.setAttribute('required', 'required');

            let enterpriseAddress = document.getElementById('enterpriseAddress');
            enterpriseAddress.setAttribute('style', 'display:table-row');
            let enterpriseAddress_inp = document.getElementById('enterpriseAddress_inp');
            enterpriseAddress_inp.setAttribute('required', 'required');

            let enterpriseStatus = document.getElementById('enterpriseStatus');
            enterpriseStatus.setAttribute('style', 'display:table-row');
        }
        else{
            let enterprise = document.getElementById('employerEnterprise');
            enterprise.setAttribute('style', 'display:none');

            let enterpriseName = document.getElementById('enterpriseName');
            enterpriseName.setAttribute('style', 'display:none');
            let enterpriseName_inp = document.getElementById('enterpriseName_inp');
            enterpriseName_inp.removeAttribute('required');

            let enterpriseAddress = document.getElementById('enterpriseAddress');
            enterpriseAddress.setAttribute('style', 'display:none');
            let enterpriseAddress_inp = document.getElementById('enterpriseAddress_inp');
            enterpriseAddress_inp.removeAttribute('required');


            let enterpriseStatus = document.getElementById('enterpriseStatus');
            enterpriseStatus.setAttribute('style', 'display:none');
        }

        // Show enterprise input for employee only if 'Εργαζόμενος' is selected
        if(selectedValue === "Εργαζόμενος"){
            let enterprise = document.getElementById('employeeEnterprise');
            enterprise.setAttribute('style', 'display:table-row');
        }
        else{
            let enterprise = document.getElementById('employeeEnterprise');
            enterprise.setAttribute('style', 'display:none');
        }
    }

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
                var formObj1 = document.getElementById('username');
                var formObj2 = document.getElementById('password');
                var formObj3 = document.getElementById('confirm-pwd');
                if(!formObj1.checkValidity() || !formObj2.checkValidity() || !formObj3.checkValidity()){
                    return false;
                }
            }
            // If this is the second fieldset
            else if(next_fs.length > 0){
                var formObj1 = document.getElementById('firstName');
                var formObj2 = document.getElementById('lastName');
                var formObj3 = document.getElementById('AFM');
                var formObj4 = document.getElementById('email');
                var formObj5 = document.getElementById('address');
                var formObj6 = document.getElementById('birthDate');
                var formObj7 = document.getElementById('phoneNumber');
                var formObj8 = document.getElementById('cellphoneNumber');
                var formObj9 = document.getElementById('children');
                if(!formObj1.checkValidity() || !formObj2.checkValidity() || !formObj3.checkValidity() || !formObj4.checkValidity() ||  !formObj5.checkValidity() || !formObj6.checkValidity() || !formObj7.checkValidity() || !formObj8.checkValidity() || !formObj9.checkValidity()){
                    return false;
                }
            }
            // If this is the third fieldset
            else{
                var formObj1 = document.getElementById('userType');
                // var formObj2 = document.getElementById('profession');
                // var formObj3 = document.getElementById('enterpriseNumber');
                var formObj4 = document.getElementById('fund');
                // if(!formObj1.checkValidity() || !formObj2.checkValidity() || !formObj3.checkValidity() || !formObj4.checkValidity()) {
                if(!formObj1.checkValidity() || !formObj4.checkValidity()) {
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