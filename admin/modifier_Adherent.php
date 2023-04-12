<?php
  session_start();
  include("connexion_BDD.php");   
?>
 <?php
         if(isset($_GET['id']) && !empty($_GET['id'])){
          $get_id = $_GET['id'];
          $recupAdherent = $bddGestion->prepare('SELECT * FROM `ADHERENTS` WHERE numAdherent= ?');
          $recupAdherent->execute(array($get_id));
          if ($recupAdherent->rowCount() > 0){
            $A = $recupAdherent->fetch();
            $nom_prec = $A['nomAdherent'];
            $prenom_prec = $A['prenomAdherent'];
            $adresse_prec = $A['adresse'];
          if(isset($_POST['Ajouter'])){
           if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse'])){
			  $nom = htmlspecialchars($_POST['nom']);
              $prenom = htmlspecialchars($_POST['prenom']);
              $adresse = htmlspecialchars($_POST['adresse']);
              $modifierAdherent = $bddGestion->prepare('UPDATE ADHERENTS SET nomAdherent = ?, prenomAdherent = ?, adresse = ? WHERE numAdherent = ?');
              $modifierAdherent->execute(array($nom, $prenom, $adresse, $get_id));
        ?> 
		  <script>
             alert("Les informations de l'adhérent ont été modifiés avec succés.");
			 location.href = 'liste_Adherents.php';
          </script> 
        <?php   
           }else{
        ?>
          <script>
             alert("Les informations de l'adhérent n'ont pas été modifiés. Veuillez remplir tout les champs.");
          </script> 
        <?php              
                }
            }
		  }
		 }
        ?>
<!DOCTYPE html>
<html lang="en">
  <?php include("head.php"); ?>
  <body>
    <?php include("header.php"); ?>
    <main id="main">
      <!-- ======= Breadcrumbs Section ======= -->
      <section class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Modifier l'adhérent</h2>
            <ol>
              <li><a href="#">Adhérents</a></li>
              <li>Modifier l'adhérent</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs Section -->

      <section class="inner-page">
        <div class="container">
          <form action = "" method="POST">
            <strong><label>Nom</label></strong><br />
            <input type="text" name="nom" class="form-control" placeholder="Votre nom..." value="<?=$nom_prec?>" autocomplete="off"><br />
            <strong><label>Prénom</label></strong><br />
            <input type="text" name="prenom" class="form-control" placeholder="votre prenom..." value="<?=$prenom_prec?>" autocomplete="off"><br />
            <strong><label>Adresse</label></strong><br />
            <input type="text" name="adresse" class="form-control" placeholder="adresse..." value="<?=$adresse_prec?>" autocomplete="off"><br />
            <input type="submit" name="Ajouter">
          </form>           
        </div>
      
      </section>

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