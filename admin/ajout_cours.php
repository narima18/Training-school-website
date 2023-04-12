<?php
  include("connexion_BDD.php");  
  session_start();
  
?>
<!DOCTYPE html>
<html lang="en">
<?php include("head.php");?>
  <body>
    <?php
      include("header.php");  
    ?>
    <main id="main">

      <!-- ======= Breadcrumbs Section ======= -->
      <section class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Ajouter un cours </h2>
            <ol>
              <li><a href="liste_sessions.php">Les sessions</a></li>
              <li>Ajouter un cours</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs Section -->

      <section class="inner-page">
        <div class="container">
        <form action = "" method="POST">
            <strong><label>Libelle</label></strong><br />
            <input type="text" name="libelle" class="form-control" placeholder="..." autocomplete="off"><br />
            <strong><label>Taux horaire</label></strong><br />
            <input type="text" name="tauxH" class="form-control" placeholder="..." autocomplete="off"><br />
            <strong><label>Animateur</label></strong><br />
            <select class="form-control" name="animateur">
              <?php
                $recup_animateur = $bddGestion->query('SELECT * FROM `ANIMATEURS`');
                while($animateur = $recup_animateur->fetch()){ 
                  echo'<option class="form-control" value='.$animateur['numEmbauche'].'>'.$animateur['nomAnimateur']. ' ' .$animateur['prenomAnimateur'].'</option>';
                }
              ?>
            </select><br />
            <input type="submit" name="Ajouter">
          </form> 
        </div>
        <?php
            if(isset($_POST['Ajouter']) && isset($_GET['an']) && !empty($_GET['an']) && isset($_GET['num']) && !empty($_GET['num'])){
                if (!empty($_POST['libelle']) && !empty($_POST['tauxH'])  && !empty($_POST['animateur'])){
                    $annee = $_GET['an'];
                    $numero = $_GET['num'];
                    $libelle= htmlspecialchars($_POST['libelle']);
                    $tauxH = $_POST['tauxH'];
                    $animateur = $_POST['animateur'];
                    $insererCours= $bddGestion->prepare('INSERT INTO COURS(libelle,tauxHoraire,numSession,anneeSession,animateur) VALUES(?,?,?,?,?)');
                    $insererCours->execute(array($libelle, $tauxH, $numero, $annee, $animateur));
                        ?> 
                            <script>
                                alert("Le cours a été bien ajouté");
								location.href = 'liste_sessions.php';
                            </script> 
                        <?php
                }else{?>
				            <script>
                                alert("Le cours n'a pas été ajouté. Veuillez remplir tout les champs.");
                            </script> 
			<?php }}
        ?>   
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


