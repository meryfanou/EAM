<!-- info/index.php -->
<?php include '../public/header.php' ?>

<link rel="stylesheet" href="../stylesheets/index.css">
<body style="background-color:rgba(198, 198, 236, 0.5);">
<!-- Breadcrumb -->
  <div class="sticky">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active"><i class="fas fa-home" style="padding:4%;display:inline;"></i>Αρχική</li>
    </ol>
  </nav>
</div>

<?php
  // If the user was just registered/logged_in
  if(isset($_SESSION['logged_in_user_id']) && !isset($_SESSION['welcome_user'])){
    print "<div class=\"alert\" style=\"background-color: #A0DAA9; border-color:seagreen; color:#264E36;\">";
    print "<strong>Καλωσήρθες " . $_SESSION['username'] . "! Η σύνδεσή σου ολοκληρώθηκε με επιτυχία.</strong>";
    print "</div>";

    $_SESSION['welcome_user'] = -1;
  }
  // If the user just logged out
  else if(!isset($_SESSION['logged_in_user_id']) && isset($_SESSION['welcome_user']) && $_SESSION['welcome_user'] == -1){
    print "<div class=\"alert\" style=\"background-color: #A0DAA9; border-color:seagreen; color:#264E36;\">";
    print "<strong>Η αποσύνδεση ολοκληρώθηκε με επιτυχία!</strong>";
    print "</div>";

    unset($_SESSION['welcome_user']);
  }
?>

<br><br>
<div class="row">

  <!-- Usefull buttons -->
  <div class="col btn-group" style="text-align: left;">
    <ul style="list-style: none">
      <br><br><br>
      <hr style="border-top: 4px solid rgba(0, 139, 139, 0.8); width: 265px;">
      <li><a href="./covid.php" style="text-decoration:none;"><button class="button">Πληροφορίες για τον Covid-19</button></a></li><br>
      <li><a href="#" style="text-decoration:none;"><button class="button">Δουλεύουμε από το σπίτι</button></a></li><br>
      <li><a href="./default.php" style="text-decoration:none;"><button class="button">Προγράμματα κατάρτησης για ανέργους</button></a></li>
      <hr style="border-top: 4px solid rgba(0, 139, 139, 0.8); width: 265px;">
      <br></br>
    </ul>
  </div>

  <!-- Carousel -->
  <div id="myCarousel" class="col carousel slide" data-ride="carousel">

    <!-- Indicators (page tabs at the bottom) -->
    <ul class="carousel-indicators" style="display:flex; justify-content:right; margin-right: 38%;">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
      <li data-target="#myCarousel" data-slide-to="6"></li>
    </ul>

    <!-- Tooltip for an image -->
    <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
      });
    </script>

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="./covid.php" data-toggle="tooltip" title="Πληροφορίες για τον Covid-19" data-template="<div class='tooltip' role='tooltip'><div class='tooltip-inner'></div></div>" data-placement="left">
        <img src="../images/carousel0.png" alt="~ Πληροφορίες για τον Covid-19 ~"></a>
      </div>
      <div class="carousel-item">
        <a href="./default.php" data-toggle="tooltip" title="Νέα & Ανακοινώσεις" data-template="<div class='tooltip' role='tooltip'><div class='tooltip-inner'></div></div>" data-placement="left">
        <img src="../images/carousel2.png" alt="~ Νέα & Ανακοινώσεις ~"></a>
      </div>
    	<div class="carousel-item">
        <a href="./default.php" data-toggle="tooltip" title="Κατάρτηση νέων πτυχιούχων" data-template="<div class='tooltip' role='tooltip'><div class='tooltip-inner'></div></div>" data-placement="left">
        <img src="../images/carousel4.jpg" alt="~ Κατάρτηση νέων πτυχιούχων ~"></a>
      </div>
      <div class="carousel-item">
        <a href="./default.php" data-toggle="tooltip" title="Κατάρτηση ανέργων" data-template="<div class='tooltip' role='tooltip'><div class='tooltip-inner'></div></div>" data-placement="left">
        <img src="../images/carousel7.png" alt="~ Κατάρτηση ανέργων ~"></a>
      </div>
      <div class="carousel-item">
        <a href="./default.php" data-toggle="tooltip" title="Πληροφορίες για τον Ενιαίο Φορέα Κοινωνικής Ασφάλισης" data-template="<div class='tooltip' role='tooltip'><div class='tooltip-inner'></div></div>" data-placement="left">
        <img src="../images/carousel8.png" alt="~ Πληροφορίες για τον Ενιαίο Φορέα Κοινωνικής Ασφάλισης ~"></a>
      </div>
      <div class="carousel-item">
        <a href="./default.php" data-toggle="tooltip" title="Νέα για τον Covid & Επιχειρήσεις" data-template="<div class='tooltip' role='tooltip'><div class='tooltip-inner'></div></div>" data-placement="left">
        <img src="../images/carousel9.png" alt="~ Νέα για τον Covid & Επιχειρήσεις ~"></a>
      </div>
      <div class="carousel-item">
        <a href="./default.php" data-toggle="tooltip" title="Συχνές Ερωτήσεις" data-template="<div class='tooltip' role='tooltip'><div class='tooltip-inner'></div></div>" data-placement="left">
        <img src="../images/carousel6.png" alt="~ Συχνές Ερωτήσεις ~"></a>
      </div>
    </div>
  
    <!-- Left control -->
    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
      <i class="fa fa-arrow-circle-left fa-2x your-custom-class" aria-hidden="true" style="color: rgba(0,0,0,0.7);"></i>
      <span class="sr-only">Previous</span>
    </a>
    <!-- Right control -->
    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
      <i class="fa fa-arrow-circle-right fa-2x your-custom-class" aria-hidden="true" style="color: rgba(0,0,0,0.7);"></i>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="col-sm-2"></div>
</div>

<br>
<div class="row flex-container">
  <div class="flex-content">
      <a href="./default.php" style="text-decoration:none;"><h5>Νέα & Ανακοινώσεις</h5></a>
      <hr style="border-top: 2px solid rgba(0, 0, 0, 0.5); width: 95%;">

      <a href="./default.php"><p><span style="font-weight:bold;">7/1/21 </span>Επίδομα 400 ευρώ για τους αυτοαπασχολούμενους επιστήμονες από 7 κλάδους θα καταβάλει το υπουργείο Εργασίας προς τα τέλη Ιανουαρίου.</p></a>
      <hr style="border-top: 1px solid rgba(0, 0, 0, 0.3); width: 95%;">
      <a href="./default.php"><p><span style="font-weight:bold;">5/1/21 </span>e-ΕΦΚΑ: Ποιοι απαλλάσσονται από ασφαλιστική ενημερότητα και βεβαίωση οφειλής</p></a>
      <hr style="border-top: 1px solid rgba(0, 0, 0, 0.3); width: 95%;">
      <a href="./default.php"><p><span style="font-weight:bold;">3/1/21 </span>Επίδομα αδείας: Πώς καταβάλλεται στους εργαζομένους που έχουν ενταχθεί στο πρόγραμμα "Συν- εργασία"</p></a>
      <a href="./default.php" style="text-decoration:none;"><input type="button" class="show-button" value="Προβολή Όλων"></a>
  </div>
  <div class="flex-content">
      <a href="./default.php" style="text-decoration:none;"><h5>Συχνές Ερωτήσεις</h5></a>
      <hr style="border-top: 2px solid rgba(0, 0, 0, 0.5); width: 95%;">

      <a href="./default.php"><p><span style="font-weight:bold">Άδεια Ειδικού Σκοπού: </span>Ποιες είναι οι προϋποθέσεις για παραχώρησή της;</p></a>
      <hr style="border-top: 1px solid rgba(0, 0, 0, 0.3); width: 95%;">
      <a href="./default.php"><p><span style="font-weight:bold;">Σχέδιο Αναστολής Εργασίας: </span>Όσοι προσλήφθηκαν πρόσφατα και δεν πληρούν τις ασφαλιστικές προϋποθέσεις θα πάρουν ανεργιακό επίδομα στο πλαίσιο Σχεδίου Αναστολής;</p></a>
      <hr style="border-top: 1px solid rgba(0, 0, 0, 0.3); width: 95%;">
      <a href="./default.php"><p><span style="font-weight:bold;">Επίδομα Ασθενείας: </span>Οι αυτοτελώς εργαζόμενοι δικαιούνται το ειδικό επίδομα ασθενείας;</p></a>
      <a href="./default.php" style="text-decoration:none;"><input type="button" class="show-button" value="Προβολή Όλων"></a>
  </div>
</div>

<?php include '../public/footer.php' ?>