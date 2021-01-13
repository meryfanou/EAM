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

        <li class="breadcrumb-item active" aria-current="page">Επικοινωνία</li>
    </ol>
    </nav>
</div>
<br>

<!-- Registration form -->

        
<!-- Form body -->
<div class="container-xxl " style="margin: 100px; padding: 20px ;border: 1px solid black;">
    

    <div class="form-group " style="display: table-row">
                <div style="display: table-cell;overflow: auto;padding-left :30%"> 
                <h3 class="fs-title">Ευχαριστούμε για την επικοινωνία!</h3><br><br>
            </div>
    </div> 
    <div class="form-group " style="display: table-row">
            <div style="display: table-cell;overflow: auto;padding-left:100px;padding-right:100px"> 
                <p> Το αιτημά σας καταχωρήθηκε και είναι σε επεξεργασία. Παρακαλώ ελέγξτε το email που εισαγάγατε για επιβεβαίωση!</p>
                <p> Για άλλη μια φορά θα θέλαμε να σας ενημερώσουμε ότι λόγω των τρεχουσών συνθηκών και του ιδιαίτερα αυξημένου όγκου μηνυμάτων , παρουσιάζονται σημαντικές καθυστερήσεις στις απαντήσεις μας.</p>
            </div>
    </div>  
    
   
    <div style="padding-left:30%; padding-top : 30px"display="inline-block"> 
        <a href="index.php"><input type="button" class="next action-button" value="Επιστροφή στην αρχική"></button></a>
        <a  href="epikoinwnia.php"><input type="button" class="next action-button" value="Επιστροφή στην επικοινωνία"></button></a>
    </div>



</div>




<?php include './footer.php' ?>