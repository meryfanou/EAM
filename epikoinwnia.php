<!-- epikoinwnia.php -->
<?php include './header_loggedin.php' ?>

<body style="background-color:rgba(198, 198, 236, 0.8)">
<!--<body style="background-color:rgb(198, 198, 236);">-->

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
        <li class="breadcrumb-item active" aria-current="page">Επικοινωνία</li>
    </ol>
    </nav>
</div>
<br>
<div class="parent-container d-flex"> <!-- kurio megalo kouti -->
    
    <!-- upokoutia to kathena me tis plhrofories tou -->
    <!-- WRARIO -->
    <div class="container-fluid " style="margin: 10px; padding: 10px ;border: 1px solid black; background-color: darkgrey">
        <div class="row">
            <div class="col">
            <h3 style="text-align:center"> Ωράριο Λειτουργίας </h3>
                <hr style="border-top: 2px solid rgb(14, 180, 195); width: 80%;">
                <ul class="list-unstyled mb-0">
                    <li>
                        <br>ΔΕΥΤΕΡΑ-ΠΑΡΑΣΚΕΥΗ......08:00-14:00 
                    </li>
                    <li>
                        <br>ΣΑΒΒΑΤΟ.............................09:00-13:00
                    </li>
                    <li>
                        <br>ΚΥΡΙΑΚΕΣ/ΓΙΟΡΤΕΣ/ΑΡΓΙΕΣ: ΚΛΕΙΣΤΑ<br><br>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--  THLEFWNA -->
    <div class="container-fluid" style="margin: 10px; padding: 10px ;border: 1px solid black; background-color: darkgrey">
        <div class="row">
            <div class="col">
            <h3 style="text-align:center">Τηλέφωνα Επικοινωνίας </h3>
                <hr style="border-top: 2px solid rgb(14, 180, 195); width: 80%;">
                <ul class="list-unstyled">
                    <li>
                        <p><i class="fas fa-phone"></i>&nbsp;213-1516649</p><br>
                    </li>
                    <li>
                        <p><i class="fas fa-phone"></i>&nbsp;213-1516651</p><br>
                    </li>
                    <li>
                        <a href="" class="text-dark"><i class="fas fa-envelope"></i>&nbsp;pliroforisi-politi@ypakp.gr</a><br>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--  RANTEYOY -->
    <div class="container-fluid " style="margin: 10px; padding: 10px ;border: 1px solid black;background-color: darkgrey">
        <div class="row">
            <div class="col">
                <h3 style="text-align:center">Ραντεβού </h3>
                    <hr style="border-top: 2px solid rgb(14, 180, 195); width: 80%;">
                    <ul class="list-unstyled">
                        <li>
                            Για επείγοντα ζητήματα μπορείτε να κλείσετε ρεντεβού <br>
                            συμπληρώνοντας την παρακάτω φόρμα:<br>
                        </li>
                        <li>
                            <br><a href="randevu.php" class="text-dark"><button type="button" class="btn btn-info">Κλείστε Ραντεβού</button></a>
                        </li>
                    </ul>
            </div>
        </div>
    </div>
</div>


<!-- FORMA EPIKOINWNIAS -->


    <div class="container-xxl " style="margin: 10px; padding: 20px ;border: 1px solid black;background-color: darkgrey">
        <h2> <b>επικοινώνησε μαζί μας!</b> </h2>
        Θα θέλαμε να σας ενημερώσουμε ότι λόγω των τρεχουσών συνθηκών και του ιδιαίτερα αυξημένου όγκου μηνυμάτων , παρουσιάζονται σημαντικές καθυστερήσεις στις απαντήσεις μας.
        <br><br><h6><b> Σας ευχαριστούμε για την κατανόηση </b> </h6>
        
        <form class="was-validated form-group"id="search_form"method="get"> <!-- class="needs-validation" novalidate -->
            <!-- ONOMA -->
            <div class="form-group w-25" style="display: table-row">
                <div style="display: table-cell;overflow: auto; height: 60px; width: 400px"> 
                    <label for="username" class="form-label">Ονοματεπώνυμο *</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" required> 
                    
                    <div class="invalid-feedback">
                        Παρακαλώ επιλέξτε όνομα
                    </div>
                </div>
                <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Tο όνομα δεν πρέπει να περιέχει ειδικούς χαρακτήρες όπως _, -, +, !, κτλ."> </div>  </div>
            </div>
    
            <br>

            <!-- EMAIL -->
            <div class="form-group w-25" style="display: table-row">
                <div style="display: table-cell;overflow: auto; height: 60px; width: 400px">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
                    <div class="invalid-feedback">
                        Το email δεν ήταν έγκυρο.
                    </div>
                </div>
                <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Η διεύθυνση πρέπει να είναι της μορφής: name@example.com"> </div>  </div>

            </div>
            
            <br>

            <!-- EPILOGH THEMATOS -->
            <div class="form-group w-50"style="display: table-row">
                <div style="display: table-cell;overflow: auto; height: 60px; width: 400px">
                    <label for="selection">Επιλέξτε θέμα *</label>
                    <select class="custom-select" required>
                    <option></option>
                    <option>Επαγγελματίας</option>
                    <option>Άνεργος</option>
                    <option>Επιδότηση</option>
                    <option>Σύνταξη</option>
                    <option>Άλλο</option>
                    </select>
                    <div class="invalid-feedback">
                        Παρακαλώ επιλέξτε ένα θέμα.
                    </div>
                </div>
                <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="To θέμα για το οποίο θέλετε να επικονωνήσετε με την υπηρεσία"> </div>  </div>
            </div>

            <br>

            <!-- MHNYMA -->
            <div class="form-group w-100" style="display: table-row">
                <div style="display: table-cell;overflow: auto; height: 60px; width: 600px">

                    <label for="message">Μήνυμα *</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"required></textarea>
                    <div class="invalid-feedback">
                        Παρακαλώ συμπληρώστε το μήνυμά σας.
                    </div>
                </div>
                <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Μήνυμα προς αποστόλη. Εδώ γράφετε ό,τι θέλετε να μας πείτε"> </div>  </div>

            </div>
            <br>

            <button type="button" class="btn btn-primary"data-toggle="modal" data-target="#exampleModalCenter">Αποστολή</button>
        </form>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Επιβεβαίωση αποστολής</h5>
                        <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Είστε βέβαιοι για τα στοιχεία σας;
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Κλείσιμο</button>
                        <button type="submit"onclick="form_submit()" class="btn btn-primary">Αποστολή</button>
                    </div>
                    </div>
                </div>
            </div>
    </div>



    <div class="container-xxl " style="margin: 10px; padding: 10px ;border: 1px solid black;background-color: darkgrey">
        <h2> Τρόποι εξυπηρέτησης κοινού εν μέσω πανδημίας</h2>
         
        <h6>ΕΠΙΚΟΙΝΩΝΙΑ ΠΟΛΙΤΩΝ ΜΕ ΤΟ ΥΠΟΥΡΓΕΙΟ ΚΑΤΑ ΤΗ ΔΙΑΡΚΕΙΑ ΤΩΝ ΕΚΤΑΚΤΩΝ ΜΕΤΡΩΝ.</h6>

            <p style="padding-left:20px">Ηλεκτρονικές Υπηρεσίες</p>
            <p style="padding-left:40px">Οι περισσότερες υπηρεσίες του υπουργείου παρέχονται αποκλειστικά ηλεκτρονικά. Η πρόσβαση στις ηλεκτρονικές υπηρεσίες του υπουργείου γίνεται είτε μέσω www.gov.gr με τουςκωδικούς του TAXISnet, είτε μέσω των e-Υπηρεσιών υπουργείο  με τουςκωδικούς TAXISnet ή με τους κωδικούς πιστοποιημένων χρηστών του.
            Για όσες υπηρεσίες δεν παρέχονται ηλεκτρονικά, τα αιτήματα ή τα δικαιολογητικά θα γίνονται δεκτά μέσω ηλεκτρονικού ταχυδρομείου, εφόσον έχει τηρηθεί η διαδικασία πιστοποίησης μέσω www.gov.gr ή έχει επισυναφθεί Υπεύθυνη Δήλωση με θεωρημένο το γνήσιο της υπογραφής. </p>
        
            <p style="padding-left:20px">Ηλεκτρονική Επικοινωνία </p>
            <p style="padding-left:40px">Για όσες υπηρεσίες δεν παρέχονται ηλεκτρονικά, καθώς και για την υποβολή ερωτημάτων,επικοινωνήστε με το Κέντρο Προώθησης Απασχόλησης που ανήκετε μέσω ηλεκτρονικού ταχυδρομείου, αναφέροντας το θέμα καθώς και τα στοιχεία σας.</p>
        <br>
        <p>Στο σημείο αυτό θα θέλαμε να αναφέρουμε την καθημερινή διαπίστωση ότι ο ρόλος συμβούλων καθίσταται τη συγκεκριμένη περίοδο πιο αναγκαίος από ποτέ. Εκείνοι καθοδηγούν και ηρεμούν τους ανθρώπου, προσφέροντάς τους αίσθημα σιγουριάς και αισιοδοξίας για το αύριο. </p>
    </div>
    



</body>

<script src="epikoinwnia.js"></script>

<?php include './footer.php' ?>



<!-- SYNARTHSH GIA ELEGXO -->
<!-- // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})() -->
