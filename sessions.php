<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>WebDev</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<link rel="icon" type="image/png" sizes="30x30" href="assets/img/wd.png">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Squadfree - v4.7.0
  * Template URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<?php include "header.php";?>
<?php include "connexion_BDD.php";?>
  <main id="main">
      <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Nos sessions</h2>
          <h3>Places limitées inscrivez vous au plus vite</h3>
	      <h3>Une chance à ne pas rater</h3>
        </div>	
        <div class="row">
			  <?php
              $recup_session = $bddGestion->query('SELECT * FROM `SESSIONS` order by annee DESC ');
              while($session = $recup_session->fetch()){
                  $i = 0;
                $recup_nmbrAdhrts = $bddGestion->query('SELECT * FROM `SUIVRE`');
                while($nmbrAdhrts = $recup_nmbrAdhrts->fetch()){
                    if($session['NumOrdre'] == $nmbrAdhrts['numOrdreSession'] && $session['annee'] == $nmbrAdhrts['anneSession']){
				$i = $i + 1;  } }         ?>



        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href=""><?= $session['titre']?></a></h4>
              <p class="description">
                    <p><strong>Session numéro: <?= $session['NumOrdre']?></strong><br> </p> 
                    <p><strong>Année: </strong><?= $session['annee']?></p> 
                    <p><strong>Lieu: </strong><?= $session['lieu']?></p> 
                    <p><strong>Durée: </strong><?= $session['duree']?></p> 
                    <p><strong>Nombre maximal de places: </strong><?= $session['nombrePlacesMax']?></p> 
			
                    <?php
                    if($i < $session['nombrePlacesMax']){
                        ?><a href="inscrire.php?num=<?=$session['NumOrdre']?>&an=<?= $session['annee']?>" class="btn btn-primary">s'inscrire</a><?php
                    }else{?>
					    <div class="ferme" style="color:red;align:center;font-size:20px;">Cette session est fermée</div>
					<?php }
					?>
		</p>
            </div>
          </div>
                   <?php 
                
                }
            ?>

          
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->		  
  </main><!-- End #main -->
  <?php include "footer.php";?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>