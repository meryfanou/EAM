<!-- epikoinwnia.php -->
<?php include './header_loggedin.php' ?>



<body style="background-color:rgba(198, 198, 236, 0.8)">
 
<!--<body style="background-color:rgb(198, 198, 236);">-->
<link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
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
        <li class="breadcrumb-item"><a href="epikoinwnia.php"><i class="fas fa-phone" style="padding:4%;display:inline;"></i>Επικοινωνία</a></li>
        <li class="breadcrumb-item active" aria-current="page">Κλείσιμο Ραντεβού</li>
    </ol>
    </nav>
</div>
<br>

<!-- FORMA EPIKOINWNIAS -->

    <div class="container-xxl " style="margin: 10px; padding: 20px ;border: 1px solid black;background-color: darkgrey">
        <h2> <b>Κλείστε Ραντεβού</b> </h2>
        Θα θέλαμε να σας ενημερώσουμε ότι λόγω των τρεχουσών συνθηκών και του ιδιαίτερα αυξημένου όγκου μηνυμάτων , παρουσιάζονται σημαντικές καθυστερήσεις στις απαντήσεις μας.
        <br><br><h6><b> Σας ευχαριστούμε για την κατανόηση </b> </h6>
        
        <form class="was-validated form-group"> <!-- class="needs-validation" novalidate -->
            <!-- ONOMA -->
            <div class="form-group w-25" style="display: table-row">
                <div style="display: table-cell;overflow: auto; height: 60px; width: 400px"> 
                    <label for="username" class="form-label">Όνομα *</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" required> 
                    
                    <div class="invalid-feedback">
                        Εισάγετε σωστά το όνομά σας
                    </div>
                </div>
                <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Tο όνομα δεν πρέπει να περιέχει ειδικούς χαρακτήρες όπως _, -, +, !, κτλ."> </div>  </div>
            </div>
    
            <br>

            <!-- EPWNYMO -->
            <div class="form-group w-25" style="display: table-row">
                <div style="display: table-cell;overflow: auto; height: 60px; width: 400px"> 
                    <label for="username" class="form-label">Επώνυμο *</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" required> 
                    
                    <div class="invalid-feedback">
                        Εισάγετε σωστά το επώνυμό σας
                    </div>
                </div>
                <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Tο επώνυμο δεν πρέπει να περιέχει ειδικούς χαρακτήρες όπως _, -, +, !, κτλ."> </div>  </div>
            </div>
    
            <br>

            <!-- KALLIKRATIKOS DHMOS -->
            <div class="form-group w-50"style="display: table-row">
                <div style="display: table-cell;overflow: auto; height: 60px; width: 400px">
                    <label for="selection">Επιλέξτε Καλλικρατικό Δήμο *</label>
                    <select class="custom-select" required>
                    <option></option>
                        <option value="Albania">Έβρος</option>
                        <option value="Algeria">Καβάλα</option>
                        <option value="American Samoa">Ξάνθη</option>
                        <option value="Andorra">Ροδόπη</option>
                        <option value="Angola">Αν. Αττική</option>
                        <option value="Anguilla">Βορ. Αττική</option>
                        <option value="Antigua & Barbuda">Βορ. Πειραιάς</option>
                        <option value="Argentina">Δυτ. Αθήνα</option>
                        <option value="Armenia">Δυτ. Αττική</option>
                        <option value="Aruba">Κεν. Αττική</option>
                        <option value="Australia">Νότ. Αττική</option>
                        <option value="Austria">Νότ. Πειραιάς</option>
                        <option value="Azerbaijan">Λέσβος</option>
                        <option value="Bahamas">Σάμος</option>
                        <option value="Bahrain">Χίος</option>
                        <option value="Bangladesh">Αιτωλοακαρνανία</option>
                        <option value="Barbados">Αχαΐα</option>

                    </select>
                    <div class="invalid-feedback">
                        Παρακαλώ επιλέξτε ένα Δήμο.
                    </div>
                </div>
                <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Ο Δήμος στον οποίο μένετε"> </div>  </div>
            </div>

            <br>

             <!-- PERIOXH -->
             <div class="form-group w-50"style="display: table-row">
                <div style="display: table-cell;overflow: auto; height: 60px; width: 400px">
                    <label for="selection">Επιλέξτε Περιοχή *</label>
                    <select class="custom-select" required>
                    <option></option>
                        <option value="Afganistan">Δ. Αγίας Παρασκευής</option>
                        <option value="Albania">Δ. Αμαρουσίου</option>
                        <option value="Algeria">Δ. Βριλησσίων</option>
                        <option value="American Samoa">Δ. Ηρακλείου</option>
                        <option value="Andorra">Δ. Κηφισιάς</option>
                        <option value="Angola">Δ. Λυκόβρυσης - Πεύκης</option>
                        <option value="Anguilla">Δ. Μεταμορφώσεως</option>
                        <option value="Antigua & Barbuda">Δ. Νέας Ιωνίας</option>
                        <option value="Argentina">Δ.Παπάγου - Χαλαργού</option>
                        <option value="Armenia">Δ. Πεντέλης</option>
                        <option value="Aruba">Δ. Φιλοθέης - Ψυχικού</option>
                        <option value="Australia">Δ. Χαλανδρίου</option>
                        <option value="Austria">Δ. Αγίας Βαρβάρας</option>
                        <option value="Azerbaijan">Δ. Αγίων Αναργύρων - Καματερού</option>
                        <option value="Bahamas">Δ. Αιγάλεω</option>
                        <option value="Bahrain">Δ. Ιλίου </option>
                        <option value="Bangladesh">Δ. Περιστερίου</option>
                        <option value="Barbados">Δ. Πετρούπολης</option>
                    </select>
                    <div class="invalid-feedback">
                        Παρακαλώ επιλέξτε μια Περιοχή.
                    </div>
                </div>
                <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Η περιοχή στην οποία μένετε"> </div>  </div>
            </div>

            <br>

            <!-- DIEYTHINSH-->
            <div class="form-group w-25" style="display: table-row">
                <div style="display: table-cell;overflow: auto; height: 60px; width: 400px"> 
                    <label for="username" class="form-label">Διεύθυνση Κατοικίας *</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" required> 
                    
                    <div class="invalid-feedback">
                        Εισάγετε σωστά την διεύθυνση κατοικίας σας
                    </div>
                </div>
                <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Η διεύθυνση στην οποία μένετε"> </div>  </div>
            </div>
    
            <br>

            <!-- tax KWD-->
            <div class="form-group w-25" style="display: table-row">
                <div style="display: table-cell;overflow: auto; height: 60px; width: 400px"> 
                    <label for="username" class="form-label">Ταχυδρομικός Κωδικός *</label>
                    <br>
                    <input id="zip" name="zip" type="text" inputmode="numeric" pattern="^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$" placeholder="πχ 12345"maxlength="5"required>
                    
                    <div class="invalid-feedback">
                        Εισάγετε σωστά τον Ταχυδρομικό Κωδικό σας
                    </div>
                </div>
                <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Παραδείγματος χάρη 12345"> </div>  </div>
            </div>
    
    
            <br>
            

            <!-- EMAIL -->
            <div class="form-group w-25" style="display: table-row">
                <div style="dclass="md-form"isplay: table-cell;overflow: auto; height: 60px; width: 400px">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
                    <div class="invalid-feedback">
                        Το email δεν ήταν έγκυρο.
                    </div>
                </div>
                <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Η διεύθυνση πρέπει να είναι της μορφής: name@example.com"> </div>  </div>

            </div>
            
            <br>

            <!-- THLEFWNO -->
            <div class="form-group w-25" style="display: table-row">
                <div style="display: table-cell;overflow: auto; height: 60px; width: 400px"> 
                    <label for="username" class="form-label">Τηλέφωνο Επικοινωνίας *</label>
                    <br>
                    <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="698-12-34-567"maxlength="10" required>

                    <div class="invalid-feedback">
                        Εισάγετε σωστά το τηλέφωνό σας
                    </div>
                </div>
                <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Παραδείγματος χάρη 698-1234567"> </div>  </div>
            </div>
    
            <br>

            <!-- HMEROMHNIA -->
            <div class="form-group w-25" style="display: table-row">
                <div style="display: table-cell;overflow: auto; height: 60px; width: 400px"> 
                    <label for="username" class="form-label">Ημερομηνία *</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" required> 
                    
                    <div class="invalid-feedback">
                        Αυτή η ημερομηνία δεν είναι διαθέσιμη
                    </div>
                </div>
                <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="H ημερομηνία καθορισμού του ραντεβού σας"> </div>  </div>
            </div>
    
            <br>
            <!-- WRA -->
            <div class="form-group w-25" style="display: table-row">
                <div style="display: table-cell;overflow: auto; height: 60px; width: 400px"> 
                    <label for="appt">Επιλέξτε ώρα:</label>
                    <input type="time" id="appt" name="appt" required>
                    
                    <div class="invalid-feedback">
                        Αυτή η ώρα δεν είναι διαθέσιμη
                    </div>
                </div>
                <div style="display: table-cell;padding-left: 20px;"><br><p></p> <div class="fas fa-question-circle" title="H ώρα καθορισμού του ραντεβού σας"> </div>  </div>
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

            <button type="submit" class="btn btn-primary">Αποστολή</button>
        </form>
    </div>


 
</body>
<?php include './footer.php' ?>


 