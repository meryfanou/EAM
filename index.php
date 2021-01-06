<?php include './header.php' ?>

<link rel="stylesheet" href="./stylesheets/index.css">

<!-- Breadcrumb -->
<div class="sticky">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
    	<li class="breadcrumb-item">Αρχική</li>
	  </ol>
	</nav>
</div>

<br><br>
<div class="row">

  <!-- Usefull buttons -->
  <div class="col btn-group" style="text-align: left;">
    <ul style="list-style: none">
      <br><br><br>
      <hr style="border-top: 4px solid rgba(0, 139, 139, 0.8); width: 265px;">
      <li><button class="button">Πληροφορίες για τον Covid-19</button></li><br>
      <li><button class="button">Δουλεύουμε από το σπίτι</button></li><br>
      <li><button class="button">Ευκαιρίες κατάρτησης για ανέργους</button></li>
      <hr style="border-top: 4px solid rgba(0, 139, 139, 0.8); width: 265px;">
      <br></br>
    </ul>
  </div>

  <!-- Carousel -->
  <div id="myCarousel" class="col carousel slide" data-ride="carousel">

    <!-- Indicators (page tabs at the bottom) -->
    <ul class="carousel-indicators" style="display:flex; justify-content:right; margin-right: 320px;">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
      <li data-target="#myCarousel" data-slide-to="6"></li>
    </ul>

    <!-- Popover text for an image -->
    <script>
      $(document).ready(function(){
        $('[data-toggle="popover"]').popover();   
      });
    </script>

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="#" data-toggle="popover" data-trigger="hover" data-content="~ Πληροφορίες για τον Covid-19 ~">
          <img src="carousel0.png" alt="~ Πληροφορίες για τον Covid-19 ~"></a>
      </div>
      <div class="carousel-item">
        <a href="#" data-toggle="popover" data-trigger="hover" data-content="~ Νέα & Ανακοινώσεις ~">
        <img src="carousel2.png" alt="~ Νέα & Ανακοινώσεις ~"></a>
      </div>
    	<div class="carousel-item">
        <a href="#" data-toggle="popover" data-trigger="hover" data-content="~ Κατάρτηση νέων πτυχιούχων ~">
        <img src="carousel4.jpg" alt="~ Κατάρτηση νέων πτυχιούχων ~"></a>
      </div>
      <div class="carousel-item">
        <a href="#" data-toggle="popover" data-trigger="hover" data-content="~ Κατάρτηση ανέργων ~">
        <img src="carousel7.png" alt="~ Κατάρτηση ανέργων ~"></a>
      </div>
      <div class="carousel-item">
        <a href="#" data-toggle="popover" data-trigger="hover" data-content="~ Πληροφορίες για τον Ενιαίο Φορέα Κοινωνικής Ασφάλισης ~">
        <img src="carousel8.png" alt="~ Πληροφορίες για τον Ενιαίο Φορέα Κοινωνικής Ασφάλισης ~"></a>
      </div>
      <div class="carousel-item">
        <a href="#" data-toggle="popover" data-trigger="hover" data-content="~ Νέα για τον Covid & Επιχειρήσεις ~">
        <img src="carousel9.png" alt="~ Νέα για τον Covid & Επιχειρήσεις ~"></a>
      </div>
      <div class="carousel-item">
        <a href="#" data-toggle="popover" data-trigger="hover" data-content="~ Συχνές Ερωτήσεις ~">
        <img src="carousel6.png" alt="~ Συχνές Ερωτήσεις ~"></a>
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
</div>

<!-- <br>
<div class="row flex-container">
  <div>
      <h5>Νέα & Ανακοινώσεις</h5>
      <hr style="border-top: 2px solid rgba(0, 0, 0, 0.5); width: 95%;">
      <p></p>
  </div>
  <div>
      <h5>Συχνές Ερωτήσεις</h5>
      <hr style="border-top: 2px solid rgba(0, 0, 0, 0.5); width: 95%;">
      <p></p>
  </div>
</div> -->

<?php include './footer.php' ?>