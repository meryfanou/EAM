<!-- default.php -->
<?php include './header.php' ?>

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"> -->
<link rel="stylesheet" href="./stylesheets/form.css">
<body style="background-color:rgba(198, 198, 236, 0.5)">
        
<!-- Form body -->
<div class="container-xxl" id="msform" style="
	justify-content: center;
	align-content: center;
	margin: 0px 10px 0px 10px;
	padding: 3%;
	border: 1px solid rgba(0,0,0,0.6);
	background-color: rgba(0,0,0,0.15);
	text-align : center;">
    <img src="images/wrench.png" alt="Logo" style="width: 250px; border-radius:0%">
    <h2> Η σελίδα αυτά είναι υπό κατασκευή.<br>Παρακαλώ προχωρήστε στην αρχική ή γυρίστε πίσω.</h2>
    <br><br>
    <a href="index.php"><input type="button" class="action-button" value="Αρχική"></button></a>
    <input type="button" class="action-button" value="Επιστροφή" onclick="goBack()"></button>
</div>


<script>
    // Go back button
    function goBack() {
        window.history.back();
    }
</script>

<?php include './footer.php' ?>