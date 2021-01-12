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
        <li class="breadcrumb-item"><a href="epikoinwnia.php">Επικοινωνία</a></li>

        <li class="breadcrumb-item active" aria-current="page">Κλείστε Ραντεβού</li>
    </ol>
    </nav>
</div>
<br>

<!-- Registration form -->

        
<!-- Form body -->
<div class="d-xl-flex">
    <form role="form"  data-toggle="validator" class="flex-body" id="msform" method="POST" action="randevu.php">
        <!-- First form page -->
        <fieldset id="fieldset1">
            <div class="form-card">
                <h3 class="fs-title">Κλείστε Ραντεβού</h3><br><br>
                <!-- ONOMA -->
                <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="username" class="form-control-label">Όνομα</label>
                        <input name="username" type="text" class="form-control" id="username" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <!-- <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Tο επώνυμο πρέπει να αποτελείται από τουλάχιστον 4 χαρακτήρες"> </div> </div> -->

                </div><br>
                 <!-- Last Name -->
                 <div class="form-group" style="display: table-row;">
                    <div style="display: table-cell;overflow: auto;">
                        <label for="lastName" class="form-control-label">Επώνυμο *</label>
                        <input name="lastName" type="text" class="form-control" id="lastName" data-error="Υποχρεωτικό πεδίο (μόνο γράμματα)" pattern="^[A-Za-zΑ-Ωα-ωΆΈΉΊΎΌΏάέήίύόώϊϋΐ]*$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <!-- <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Tο επώνυμο πρέπει να αποτελείται από τουλάχιστον 4 χαρακτήρες"> </div>  </div> -->

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

                <!-- date -->
                <div class="form-group" style="display: table-row">
                    <div style="display: table-cell;overflow: auto;"> 
                        <label for="date" class="form-control-label">Ημερομηνία *</label>
                        <input type="date" class="form-control" id="date"  data-error="Παρακαλώ δώστε μία έγκυρη ημερομηνία"> 
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

            <!-- Next button -->
            </div><br><button type="submit" class="next action-button">Επόμενο</button>
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

    // $(document).ready(function(){
    //     var current_fs, next_fs, previous_fs; //fieldsets
    //     var opacity;

    //     // When a 'next' button is clicked
    //     $(".next").click(function(){
    //         current_fs = $(this).parent();
    //         next_fs = $(this).parent().next();

    //         // Check if form is valid before moving to the next step
    //         // If this is the first fieldset
    //         if(next_fs.next().length > 0){
    //             var formObj1 = document.getElementById('username');
    //             var formObj2 = document.getElementById('lastname');
    //             var formObj3 = document.getElementById('email');
    //             var formObj4 = document.getElementById('phoneNumber');
    //             var formObj5 = document.getElementById('cellphoneNumber');
    //             var formObj6 = document.getElementById('date');
    //             var formObj7 = document.getElementById('time');
    //             var formObj8 = document.getElementById('message');
    //             if(!formObj1.checkValidity() || !formObj2.checkValidity() || !formObj3.checkValidity() ||!formObj4.checkValidity() || !formObj5.checkValidity() || !formObj6.checkValidity() || !formObj7.checkValidity()){
    //                 return false;
    //             }
    //         }

    //         //Add Class Active
    //         $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //     });

    //     // When a 'prev' button is clicked
    //     $(".previous").click(function(){
    //         current_fs = $(this).parent();
    //         previous_fs = $(this).parent().prev();

    //         //Remove class active
    //         $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //         //show the previous fieldset
    //         previous_fs.show();

    //         //hide the current fieldset with style
    //         current_fs.animate({opacity: 0}, {
    //             step: function(now) {
    //                 // for making fielset appear animation
    //                 opacity = 1 - now;

    //                 current_fs.css({
    //                     'display': 'none',
    //                     'position': 'relative'
    //                 });
    //                 previous_fs.css({'opacity': opacity});
    //             },
    //             duration: 600
    //         });
    //     });

    //     $('.radio-group .radio').click(function(){
    //         $(this).parent().find('.radio').removeClass('selected');
    //         $(this).addClass('selected');
    //     });

    //     $(".submit").click(function(){
    //         return false;
    //     })
    // });

</script>

<?php include './footer.php' ?>