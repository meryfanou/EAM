<!-- randevu.php -->
<?php include './header.php' ?>

<link rel="stylesheet" href="./stylesheets/form.css">
<body style="background-color:rgba(198, 198, 236, 0.5)">

<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

<!-- Breadcrumb -->
<div class="sticky">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home" style="padding:4%;display:inline;"></i>Αρχική</a></li>
        <li class="breadcrumb-item"><a href="epikoinwnia.php">Επικοινωνία</a></li>

        <li class="breadcrumb-item active" aria-current="page">Κλείστε Ραντεβού</li>
    </ol>
    </nav>
</div>
<br>

        
<!-- Form body -->
<div class="d-xl-flex">
<form role="form"  data-toggle="validator" class="flex-body" id="msform" method="POST"  action="confirm.php">
        <!-- First form page -->
        <fieldset id="fieldset1">
            <div class="form-card">
                <h3 class="fs-title">Κλείστε Ραντεβού</h3><br><br>
                <!-- ONOMA -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="username" class="form-control-label">Όνομα*</label>
                        <input name="username" type="text" class="form-control" id="username" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Tο επώνυμο πρέπει να αποτελείται από τουλάχιστον 4 χαρακτήρες"> </div> </div>

                </div><br>
                 <!-- Last Name -->
                 <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="lastName" class="form-control-label">Επώνυμο *</label>
                        <input name="lastName" type="text" class="form-control" id="lastName" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$"required >
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Tο επώνυμο πρέπει να αποτελείται από τουλάχιστον 4 χαρακτήρες"> </div>  </div>

                </div><br>

                 <!-- e-mail -->
                 <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="email" class="form-control-label">Ηλεκτρονική διεύθυνση (e-mail) *</label>
                        <input name="email" type="email" class="form-control" id="email" data-error="Παρακαλώ δώστε ένα έγκυρο e-mail"required >
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Π.χ. name@example.gr"> </div> 
                    </div>
                </div><br>

                <!-- phone number -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="phoneNumber" class="form-control-label">Σταθερό Τηλέφωνο *</label>
                        <input name="phoneNumber" type="text" class="form-control" id="phoneNumber" data-error="Παρακαλώ δώστε ένα έγκυρο τηλέφωνο" pattern="^[0-9]{10}"required >
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
                        <input name="cellphoneNumber" type="text" class="form-control" id="cellphoneNumber" data-error="Παρακαλώ δώστε ένα έγκυρο τηλέφωνο" pattern="^[0-9]{10}"required >
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="10 ψήφιος αριθμός που ξεκινά με 69"> </div> 
                    </div>
                </div><br>

                <!-- date -->
                <div class="form-group" style="display: table-row">
                    <div style="display: table-cell;overflow: auto;"> 
                        <label for="date" class="form-control-label">Ημερομηνία *</label>
                        <input type="date" name="date" class="form-control" id="date"  data-error="Παρακαλώ δώστε μία έγκυρη ημερομηνία"required> 
                        <div class="help-block with-errors"></div>
                
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Η ημερομηνία πρέπει να είναι μετά την σημερινή"> </div> 
                        </div>
                </div><br>
         

                <!-- time -->
                <div class="form-group" style="display: table-row">
                    <div style="display: table-cell;overflow: auto;"> 
                        <label for="time" class="form-control-label">Ώρα *</label>
                        <input type="time" class="form-control" id="time"  data-error="Παρακαλώ δώστε μία έγκυρη ώρα"pattern="[0-9 _:]"> 
                        <div class="help-block with-errors"></div>
                
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Η ώρα πρέπει να είναι συμβατή με τα ωράρια του υπουργείου"> </div> 
                        </div>
                </div><br>

                <!--selection-->
                <div class="form-group" style="display: table-row">
                    <div style="display: table-cell;overflow: auto;"> 
                        <label for="selection" class="form-control-label">Τμήμα </label><br>
                        <select class="custom-select"data-error="Παρακαλώ επιλέξτε ένα τμήμα" >
                        <option></option>
                        <option>ΑΥΤΟΤΕΛΕΣ ΓΡΑΦΕΙΟ ΝΟΜΙΚΟΥ ΣΥΜΒΟΥΛΟΥ ΓΕΝΙΚΗΣ ΓΡΑΜΜΑΤΕΙΑΣ ΚΟΙΝΩΝΙΚΩΝ ΑΣΦΑΛΙΣΕΩΝ</option>
                        <option>ΓΡΑΦΕΙΟ ΕΝΗΜΕΡΩΣΗΣ ΚΑΙ ΕΠΙΚΟΙΝΩΝΙΑΣ</option>
                        <option>ΓΡΑΦΕΙΟ ΤΥΠΟΥ</option>
                        <option>ΑΥΤΟΤΕΛΕΣ ΤΜΗΜΑ ΚΟΙΝΟΒΟΥΛΕΥΤΙΚΟΥ ΕΛΕΓΧΟΥ</option>
                        <option> ΑΥΤΟΤΕΛΕΣ ΤΜΗΜΑ ΝΟΜΟΘΕΤΙΚΗΣ ΠΡΩΤΟΒΟΥΛΙΑΣ </option>
                        <option>Άλλο</option>
                        </select>
                        <div class="help-block with-errors"></div>
                
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Πρέπει να επιλέξετε ένα τμήμα του υπουργείου"> </div> 
                        </div>
                </div><br>

                <!--message-->
                <div class="form-group" style="display: table-row">
                   <div style="display: table-cell;overflow: auto;">
                        <label for="message">Μήνυμα </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <div class="help-block with-errors"></div>
                </div>
                <div style="display: table-cell;padding-left: 20px"><br><p></p>
                        <div class="fas fa-question-circle" title="Μήνυμα σχετικά με τον λόγο του ραντεβού"> </div> 
                        </div>
                </div><br>

            <!-- Trigger modal button -->
            <input type="button" data-toggle="modal" data-target="#myModal" class="action-button" value="Υποβολή">

       

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
                    <button type="submit" class="action-button">Σύνεχεια</button>
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
            $("#myModal").modal("hide");
        }

        // Add bootstrap 4 was-validated classes to trigger validation messages
        vForm.addClass('was-validated');
    });

    
   
</script>



<?php include './footer.php' ?>