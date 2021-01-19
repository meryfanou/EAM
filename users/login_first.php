<!-- users/login_first.php -->
<?php include '../public/header.php' ?>

<link rel="stylesheet" href="../stylesheets/form.css">
<body style="background-color:rgba(198, 198, 236, 0.5)">

<!-- Breadcrumb -->
<div class="sticky">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../info/index.php"><i class="fas fa-home" style="padding:4%;display:inline;"></i>Αρχική</a></li>
        <li class="breadcrumb-item"><a href="../info/covid_ergazomenoi.php">Covid-19 & Εργαζόμενοι</a></li>
        <li class="breadcrumb-item active" aria-current="page">Αίτηση Άδειας ειδικού σκοπού</li>
    </ol>
    </nav>
</div>
<br>

        
<!-- Form body -->
<div class="container-xxl" id="msform" style="
	justify-content: center;
	align-content: center;
	margin: 5%;
	padding: 3%;
	border: 1px solid rgba(0,0,0,0.6);
	background-color: rgba(0,0,0,0.15);
	text-align : center;">
    <img src="https://cdn4.iconfinder.com/data/icons/multimedia-75/512/multimedia-40-128.png" alt="Logo" style="width: 200px; border-radius:0%"><br><br><br>
    <h3> Για να προχωρήσετε στην αίτηση της άδειάς σας θα πρέπει πρώτα να <a href="./sundesh.php">συνδεθείτε</a>.</h3><br><br><br>

    <h4><button class="showRegister" type="button" data-toggle="collapse" data-target="#register" style="border:none; background-color:transparent; font-weight:bold; color:#2C3E50;"><i class="fas fa-info-circle"></i>&nbsp;Δεν έχετε λογαριασμό;</button><br>
    <div class="collapse" id="register"><a href="./registration.php"><br>Εγγραφείτε</a></div><br>
    <button class="showInfo" type="button" data-toggle="collapse" data-target="#info" style="border:none; background-color:transparent; font-weight:bold; color:#2C3E50;"><i class="fas fa-info-circle"></i>&nbsp;Γιατί πρέπει να έχω συνδεθεί για να κάνω αίτηση άδειας ειδικού σκοπού;</button><br>
    <div class="collapse" id="info"><br>Ώστε η αίτησή σας να αποσταλεί στον/στους εργοδότη/-ες σας, σύμφωνα με τα στοιχεία της εργασία σας στο σύστημά μας.</div></h4>
</div>


<script>

    $(".showRegister").click(function(){
        $("#register").collapse('toggle');
    });

    $(".showInfo").click(function(){
        $("#info").collapse('toggle');
    });

</script>

<?php include '../public/footer.php' ?>