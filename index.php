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
<div class="row" style="width: 100%">
<div class="col btn-group" style="text-align: left;">
  <ul style="list-style: none">
    <br><br><br>
    <hr style="border-top: 4px solid rgba(155, 35, 53, 0.4); width: 265px;">
    <li><button class="button">Πληροφορίες για τον Covid-19</button></li><br>
    <li><button class="button">Δουλεύουμε από το σπίτι</button></li><br>
    <li><button class="button">Ευκαιρίες κατάρτησης για ανέργους</button></li>
    <hr style="border-top: 4px solid rgba(155, 35, 53, 0.4); width: 265px;">
    <br>
  </ul>
</div>

<div id="myCarousel" class="col carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators" style="display:flex; justify-content:right; margin-right: 320px;">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
    <li data-target="#myCarousel" data-slide-to="6"></li>
  </ul>

<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();   
});
</script>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href="#" data-toggle="popover" data-trigger="hover" data-content="~ Πληροφορίες για τον Covid-19 ~">
        <img src="carousel0.png" alt="~ Πληροφορίες για τον Covid-19 ~" style="width:880px; height:450px"></a>
    </div>
    <div class="carousel-item">
      <a href="#" data-toggle="popover" data-trigger="hover" data-content="~ Νέα & Ανακοινώσεις ~">
      <img src="carousel2.png" alt="~ Νέα & Ανακοινώσεις ~" style="width:880px; height:450px"></a>
    </div>
  	<div class="carousel-item">
      <a href="#" data-toggle="popover" data-trigger="hover" data-content="~ Κατάρτηση νέων πτυχιούχων ~">
      <img src="carousel4.jpg" alt="~ Κατάρτηση νέων πτυχιούχων ~" style="width:880px; height:450px"></a>
    </div>
    <div class="carousel-item">
      <a href="#" data-toggle="popover" data-trigger="hover" data-content="~ Κατάρτηση ανέργων ~">
      <img src="carousel7.png" alt="~ Κατάρτηση ανέργων ~" style="width:880px; height:450px"></a>
    </div>
    <div class="carousel-item">
      <a href="#" data-toggle="popover" data-trigger="hover" data-content="~  ~">
      <img src="carousel8.png" alt="" style="width:880px; height:450px"></a>
    </div>
    <div class="carousel-item">
      <a href="#" data-toggle="popover" data-trigger="hover" data-content="~ Νέα για τον Covid & Επιχειρήσεις ~">
      <img src="carousel9.png" alt="~ Νέα για τον Covid & Επιχειρήσεις ~" style="width:880px; height:450px"></a>
    </div>
    <div class="carousel-item">
      <a href="#" data-toggle="popover" data-trigger="hover" data-content="~ Συχνές Ερωτήσεις ~">
      <img src="carousel6.png" alt="~ Συχνές Ερωτήσεις ~" style="width:880px; height:450px"></a>
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#myCarousel" data-slide="prev" style="display:flex; justify-content:right; margin-left:-9.5%;">
    <!-- <span class="carousel-control-prev-icon"></span> -->
    <i class="fa fa-arrow-circle-left fa-2x your-custom-class" aria-hidden="true" style="color: rgba(0,0,0,0.7);"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" data-slide="next" style="display:flex; justify-content:right; margin-right: 2%">
    <!-- <span class="carousel-control-next-icon"></span> -->
    <i class="fa fa-arrow-circle-right fa-2x your-custom-class" aria-hidden="true" style="color: rgba(0,0,0,0.7);"></i>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<?php include './footer.php' ?>