<!-- epikoinwnia.php -->
<?php include './header.php' ?>

<link rel="stylesheet" href="./stylesheets/form.css">

<body style="background-color:rgba(198, 198, 236, 0.5)">

<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

<!--
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
-->
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



<!-- FORMA EPIKOINWNIAS -->

<div class="d-xl-flex">
    <form role="form"  data-toggle="validator" class="flex-body" id="msform" method="POST"  action="index.php">
        <!-- First form page -->
        <fieldset id="fieldset1">
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
                
            <!-- Trigger modal button -->
            <!-- <input type="button" data-toggle="modal" data-target="#myModal" class="action-button" value="Υποβολή">
            -->
            <button type="submit" class="action-button">Σύνδεση</button>
            <a href="default.php"><button type="button" class="action-button">Σύνδεση μέσω TAXIS </button></a>
            <!-- Modal -->
            <!-- <div  id="myModal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin: 200px 0px 0px 5px " >
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
                    <!-- Submit form button
                    <button type="submit" class="action-button">Σύνεχεια</button>
                </div>
            </div> -->
        

           
           

       

            <!-- Modal -->
            <!-- <div  id="myModal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin: 200px 0px 0px 5px " >
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
                    <!-- Submit form button
                    <button type="submit" class="action-button">Σύνεχεια</button>
                </div>
            </div> -->
        
        </fieldset>


      
    </form>
</div>


<div class="d-xl-flex">
    <form role="form"  data-toggle="validator" class="flex-body" id="msform" method="POST"  action="index.php">
        <!-- First form page -->
        <fieldset id="fieldset1">
        <div class="form-card">
                <h3 class="fs-title">Ξέχασα τον κωδικό μου</h3><br><br>
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

                
            <!-- Trigger modal button -->
            <!-- <input type="button" data-toggle="modal" data-target="#myModal" class="action-button" value="Υποβολή">
            -->
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
            $("#myModal").modal("hide");
        }

        // Add bootstrap 4 was-validated classes to trigger validation messages
        vForm.addClass('was-validated');
    });

    
   
</script>



</body>




<?php include './footer.php' ?>

