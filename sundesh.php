<!-- epikoinwnia.php -->
<?php include './header_loggedin.php' ?>

<body style="background-color:rgba(198, 198, 236, 0.8)">
<!--<body style="background-color:rgb(198, 198, 236);">-->

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
        <li class="breadcrumb-item active" aria-current="page">Σύνδεση</li>
    </ol>
    </nav>
</div>
<br>



<!-- FORMA EPIKOINWNIAS -->

    
    <p style="margin-left :100px">Σύνδεση</p>
    <div class="container-xxl " style="margin: 0 100px 50px 100px; padding-top: 50px ; padding-left: 350px;border: 1px solid black;background-color: darkgrey; text-align : center">
        <form class="was-validated form-group"> <!-- class="needs-validation" novalidate -->
            <!-- ONOMA -->
            <div class="form-group w-25" style="display: table-row">
                <div style="display: table-cell;overflow: auto; height: 60px; width: 400px"> 
                    <label for="username" class="form-label">Ονοματεπώνυμο </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" required> 
                    
                    <div class="invalid-feedback">
                        Παρακαλώ επιλέξτε όνομα
                    </div>
                </div>
                <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Tο όνομα δεν πρέπει να περιέχει ειδικούς χαρακτήρες όπως _, -, +, !, κτλ."> </div>  </div>
            </div>
    
            <br>

            <!-- PASSWORD -->
            <div class="form-group w-25" style="display: table-row">
                <div style="display: table-cell;overflow: auto; height: 60px; width: 400px">
                    <label for="password">Κωδικός πρόσβασης </label>
                    <input type="password" class="form-control" id="exampleFormControlInput1"required>
                    <div class="invalid-feedback">
                        Ο Κωδικός δεν ήταν έγκυρος.
                    </div>
                </div>
                <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Κωδικός πρόσβασης"> </div>  </div>
            </div>
            
            <br>

            <button type="submit" class="btn btn-primary" style="margin-right : 400px">Σύνδεση</button>
        </form>
    </div>

    <p style="margin-left :100px">Ξέχασα τον κωδικό μου</p>
    <div class="container-xxl " style="margin: 0 100px 0 100px; padding-top:50px ; padding-left: 350px;border: 1px solid black;background-color: darkgrey; text-align : center">
        <form class="was-validated form-group"> <!-- class="needs-validation" novalidate -->
            <!-- EMAIL -->
            <div class="form-group w-25" style="display: table-row">
                <div style="display: table-cell;overflow: auto; height: 60px; width: 400px">
                    <label for="email">Αποστολή Email </label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
                    <div class="invalid-feedback">
                        Το email δεν ήταν έγκυρο.
                    </div>
                </div>
                <div style="display: table-cell;padding-left: 20px"><br><p></p> <div class="fas fa-question-circle" title="Η διεύθυνση πρέπει να είναι της μορφής: name@example.com"> </div>  </div>

            </div>
            
            <br>

            <button type="submit" class="btn btn-primary" style="margin-right : 400px">Aποστολή</button>
            <p style="margin-right : 400px; padding: 30px 0 30px 0"> Παρακαλώ ελέγξτε τα mail σας </p>
        </form>
    </div>


</body>
<?php include './footer.php' ?>

