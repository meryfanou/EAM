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

<!-- Registration form -->

        
<!-- Form body -->
<div class="container-xxl " style="
	justify-content: center;
	align-content: center;
	margin: 0 8% 4% 8%;
	padding: 3%;
	border: 1px solid rgba(0,0,0,0.6);
	background-color: rgba(0,0,0,0.15);
	text-align : center;">
    

    <div class="form-group " style="display: table-row">
                <div style="display: table-cell;overflow: auto;"> 
                <h3 class="fs-title">Κλείστε Ραντεβού</h3><br><br>
            </div>
    </div> 
    <div class="form-group " style="display: table-row">
            <div style="display: table-cell;overflow: auto;"> 
                <p> Το ραντεβού σας καταχωρήθηκε και είναι σε επεξεργασία. Παρακαλώ ελέγξτε το email που εισαγάγατε για επιβεβαίωση!</p>
                <p> Για άλλη μια φορά θα θέλαμε να σας ενημερώσουμε ότι λόγω των τρεχουσών συνθηκών και του ιδιαίτερα αυξημένου όγκου μηνυμάτων , παρουσιάζονται σημαντικές καθυστερήσεις στις απαντήσεις μας.</p>
            </div>
    </div>  
    
   
    
    <div display="inline-block"> 
        <a href="index.php"><input type="button" class="next action-button" value="Επιστροφή στην αρχική"style=" width: 200px;
    background: rgb(0,139,139);
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 5px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px"></button></a>
        <a  href="epikoinwnia.php"><input type="button" class="next action-button" value="Επιστροφή στην επικοινωνία"style=" width: 220px;
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




<?php include './footer.php' ?>