<?php
  include("connexion_BDD.php");  
  session_start();
  
?>
<!DOCTYPE html>
<html lang="en">
<?php include'head.php'?>
  <body>
    <?php
      include("header.php");     
    ?>
    <main id="main">
      <!-- ======= Breadcrumbs Section ======= -->
      <section class="breadcrumbs">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <h2>Les cours</h2>
            <ol>
              <li><a href="liste_sessions">sessions</a></li>
              <li>Les cours</li>
            </ol>
          </div>
        </div>
      </section><!-- End Breadcrumbs Section -->
	<section id="services" class="services">
      <div class="container">
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Les cours</h2>
        </div>	
        <div class="row">
            <?php
            if(isset($_GET['an']) && !empty($_GET['an']) && isset($_GET['num']) && !empty($_GET['num'])){
              $num = $_GET['num'];
              $an = $_GET['an'];
              $recup_cours = $bddGestion->prepare('SELECT * FROM `COURS` WHERE numSession = ? AND  anneeSession = ?');
              $recup_cours->execute(array($num, $an));
              while($cours = $recup_cours->fetch()){
                $anime = $cours['animateur'];
                $recup_animateur = $bddGestion->prepare('SELECT * FROM ANIMATEURS WHERE numEmbauche = ?');
                $recup_animateur->execute(array($anime));
                
            ?>
			<div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><i class="bx bx-file"></i></div>
              <p class="description">
                    <p><strong>Libellé: <?= $cours['libelle']?></strong><br> </p> 
                    <p><strong>Taux Horaire: </strong><?= $cours['tauxHoraire']?></p> 
					<?php if ($recup_animateur->rowCount() > 0) {
                    $animateur = $recup_animateur->fetch();  ?>            
                    <p><strong>Animateur: </strong><?= $animateur['nomAnimateur']?>  <?= $animateur['prenomAnimateur']?></p>    
					<?php } else{?>			
					<p><strong>Animateur: </strong></p>
					<?php }?>
					<a href="modifier_cours.php?code=<?=$cours['codeCours']?>" class="btn btn-primary">Modifier</a>
					<a href="supprimer_cours.php?code=<?=$cours['codeCours']?>" class='delete' data-confirm='Etes vous sur de vouloir supprimer ce cours?'><span  class="btn btn-primary" >Supprimer</span></a>
                   
              </p>
            </div>
          </div>
                   <?php 
                
			}}
            ?>          
          </div>
        </div>
    </section>

		<script>
var deleteLinks = document.querySelectorAll('.delete');

for (var i = 0; i < deleteLinks.length; i++) {
  deleteLinks[i].addEventListener('click', function(event) {
	  event.preventDefault();

	  var choice = confirm(this.getAttribute('data-confirm'));

	  if (choice) {
	    window.location.href = this.getAttribute('href');
	  }
  });
}
</script>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php
      include("footer.php");  
    ?>

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