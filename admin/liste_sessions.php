<?php
  include("connexion_BDD.php");  
  session_start();
  
?>
<!DOCTYPE html>
<html lang="en">
<?php include'head.php';?>
  <body>
    <?php
      include("header.php");  
    ?>
    <main id="main">

      <!-- ======= Breadcrumbs Section ======= -->
      <section class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Liste sessions</h2>
            <ol>
              <li><a href="#">Sessions</a></li>
              <li>Liste sessions</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs Section -->
	  
    <section id="services" class="services">
      <div class="container">
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Les sessions</h2>
        </div>	
        <div class="row">
            <?php
              $recup_session = $bddGestion->query('SELECT * FROM `SESSIONS` order by annee DESC');
              while($s = $recup_session->fetch()){
				$anime = $s['responsable'];
                $recup_animateur = $bddGestion->prepare('SELECT * FROM ANIMATEURS WHERE numEmbauche = ?');
                $recup_animateur->execute(array($anime));

            ?>


        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><i class="bx bx-file"></i></div>
              <p class="description">
                    <p><strong>Session numéro: <?= $s['NumOrdre']?></strong><br> </p> 
                    <p><strong>Année: </strong><?= $s['annee']?></p> 
                    <p><strong>Titre: </strong><?= $s['titre']?></p> 
                    <p><strong>Lieu: </strong><?= $s['lieu']?></p> 
                    <p><strong>Durée: </strong><?= $s['duree']?></p> 
                    <p><strong>Nombre maximal de places: </strong><?= $s['nombrePlacesMax']?></p> 
                    <?php if ($recup_animateur->rowCount() > 0) {
                    $animateur = $recup_animateur->fetch();  ?>            
                    <p><strong>Responsable: </strong><?= $animateur['nomAnimateur']?>  <?= $animateur['prenomAnimateur']?></p>    
					<?php } else{?>			
					<p><strong>Responsable: </strong></p>
					<?php }?>

                    <a href="modifier_session.php?num=<?=$s['NumOrdre']?>&an=<?= $s['annee']?>" class="btn btn-primary">modifier</a>
                    <a href="supprimer_session.php?num=<?=$s['NumOrdre']?>&an=<?= $s['annee']?>"class='delete' data-confirm='Etes vous sur de vouloir supprimer cette sessions ?'><span  class="btn btn-primary" >Supprimer</span></a><br/><p></p>
                    <a href="liste_cours.php?num=<?=$s['NumOrdre']?>&an=<?= $s['annee']?>" class="btn btn-primary">Les cours</a>
					<a href="ajout_cours.php?num=<?=$s['NumOrdre']?>&an=<?= $s['annee']?>" class="btn btn-primary">ajouter cours</a>

              </p>
            </div>
          </div>
                   <?php 
                
                }
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