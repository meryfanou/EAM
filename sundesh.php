<!-- epikoinwnia.php -->
<?php include './header.php' ?>

<link rel="stylesheet" href="./stylesheets/form.css">

<body style="background-color:rgba(198, 198, 236, 0.5)">

<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

<!-- Breadcrumb -->
<div class="sticky">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home" style="padding:4%;display:inline;"></i>Αρχική</a></li>
        <li class="breadcrumb-item active" aria-current="page">Σύνδεση</li>
    </ol>
    </nav>
</div>
<br>


<!-- Login form -->
<div class="d-xl-flex">
    <form role="form"  data-toggle="validator" class="flex-body" id="msform" method="POST"  action="index.php">
        <fieldset>
            <div class="form-card">
                <h3 class="fs-title">Σύνδεση</h3><br><br>
                <!-- ONOMA -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="username" class="form-control-label">Όνομα*</label>
                        <input name="username" type="text" class="form-control" id="username" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Tο επώνυμο πρέπει να αποτελείται από τουλάχιστον 4 χαρακτήρες"> </div> </div>

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
            <!-- Submit buttons -->
            <button type="submit" class="action-button">Σύνδεση</button>
            <a href="default.php"><button type="button" class="action-button" style="width: 200px;">Σύνδεση μέσω TAXIS </button></a>
        </fieldset>
    </form>
</div>


<div class="d-xl-flex">
    <form role="form"  data-toggle="validator" class="flex-body" id="msform" method="POST"  action="default.php">
        <fieldset>
            <h3 class="fs-title">Ξέχασα τον κωδικό μου</h3><br>
            <div class="form-group" style="display: table-row;">
                <div style="display: table-cell;overflow: auto;">
                    <b class="fs-title"><u>Συμπληρώστε το e-mail με το οποίο κάνατε εγγραφή στο ypakp.gr για να σας στείλουμε προσωρινό κωδικό επαναφοράς</u></b><br>
                </div>
            </div><br>
            <!-- e-mail -->
            <div class="row"><div class="col"></div><div class="col">
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
            </div><div class="col"></div></div>
            <!-- Submit button -->
            <button type="submit" class="action-button">Aποστολή</button>
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

    
   
</script>



</body>




<?php include './footer.php' ?>

