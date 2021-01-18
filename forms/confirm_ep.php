<!-- forms/confirm_ep.php -->
<?php include '../public/header.php' ?>

<link rel="stylesheet" href="../stylesheets/form.css">
<body style="background-color:rgba(198, 198, 236, 0.5)">

<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

<!-- Breadcrumb -->
<div class="sticky">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../info/index.php"><i class="fas fa-home" style="padding:4%;display:inline;"></i>Αρχική</a></li>
        <li class="breadcrumb-item active" aria-current="page">Επικοινωνία</li>
    </ol>
    </nav>
</div>
<br>

<!-- Form body -->
<div class="container-xxl "style="
	justify-content: center;
	align-content: center;
	margin: 0 8% 4% 8%;
	padding: 3%;
	border: 1px solid rgba(0,0,0,0.6);
	background-color: rgba(0,0,0,0.15);
	text-align : center;">
    <div class="form-group " style="display: table-row">
        <div style="display: table-cell;overflow: auto;"> 
            <h3 class="fs-title">Ευχαριστούμε για την επικοινωνία!</h3><br><br>
        </div>
    </div> 
    <div class="form-group " style="display: table-row">
        <div style="display: table-cell;overflow: auto"> 
            <p> Το αιτημά σας καταχωρήθηκε και είναι σε επεξεργασία. Παρακαλώ ελέγξτε το email που εισαγάγατε για επιβεβαίωση!</p>
            <p> Για άλλη μια φορά θα θέλαμε να σας ενημερώσουμε ότι λόγω των τρεχουσών συνθηκών και του ιδιαίτερα αυξημένου όγκου μηνυμάτων , παρουσιάζονται σημαντικές καθυστερήσεις στις απαντήσεις μας.</p>
        </div>
    </div>  
    <div display="inline-block"> 
        <a href="../info/index.php"><input type="button" class="next action-button" value="Επιστροφή στην αρχική"style=" width: 200px;
    background: rgb(0,139,139);
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 5px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px"></button></a>
        <a href="../info/epikoinwnia.php"><input type="button" class="next action-button" value="Επιστροφή στην επικοινωνία"style=" width: 230px;
    background: rgb(0,139,139);
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 5px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px"></button></a>
    </div>
</div>



<?php include '../public/footer.php' ?>