<!-- confirm.php -->
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

        
<div class="d-xl-flex" id="msform">
    <fieldset>
        <h3 class="fs-title">Κλείσατε Ραντεβού!</h3><br><br>

        <div class="form-group " style="display: table-row">
            <div style="display: table-cell;overflow: auto;padding-left:20%;padding-right:20%"> 
                <p> Το ραντεβού σας καταχωρήθηκε και είναι σε επεξεργασία.<br>Παρακαλώ ελέγξτε το email που εισαγάγατε για επιβεβαίωση!</p>
                <p> Για άλλη μια φορά θα θέλαμε να σας ενημερώσουμε ότι λόγω των τρεχουσών συνθηκών και του ιδιαίτερα αυξημένου όγκου μηνυμάτων, παρουσιάζονται σημαντικές καθυστερήσεις στις απαντήσεις μας.</p><br>
            </div>
        </div>  
        
        <a href="index.php"><input type="button" class="action-button" value="Επιστροφή στην Aρχική" style="width: 200px;"></a>
        <a  href="epikoinwnia.php"><input type="button" class="action-button" value="Επιστροφή στην Eπικοινωνία" style="width: 230px;"></a>
    </fieldset>
</div>



<?php include './footer.php' ?>