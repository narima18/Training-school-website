<?php
  session_start();
  include("connexion_BDD.php");  

 
?>
<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>
  <body>
    <?php
      include("header.php");  
    ?>
    <main id="main">

      <!-- ======= Breadcrumbs Section ======= -->
      <section class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Versement</h2>
            <ol>
              <li><a href="liste_Adherents.php">Adherents</a></li>
              <li>Versement</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs Section -->
<div class="text-center"><section class="inner-page">
      <div class="container">
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Date de versement</h2>
        </div>	
        <div class="row">
	  
        <form action="" method="POST">
          <input type="date" name="dateVers"/>
          <input type="submit" name="Ajouter">
        </form>
        <?php
        
          if(isset($_POST['Ajouter']) && isset($_GET['an']) && !empty($_GET['an']) && isset($_GET['num']) && !empty($_GET['num'])&& isset($_GET['id']) && !empty($_GET['id'])){
          
           if(!empty($_POST['dateVers'])){
              $an = htmlspecialchars($_GET['an']);
              $num = $_GET['num'];
              $id = $_GET['id'];
              $date = $_POST['dateVers'];
              $updateSuivre =  $bddGestion->prepare('UPDATE SUIVRE SET dateVersement = ? WHERE adherent = ? AND numOrdreSession = ? AND anneSession = ?');
              $updateSuivre->execute(array($date, $id, $num, $an));

        ?>
		<script>
             alert("La date de versement a été mise à jour");
			 location.href = 'liste_Adherents.php';
          </script>    
<?php		  }
          }
    ?>  
      </div>
	  </div>
	  </section>
	  </div>

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