<?php
  session_start();
  include("connexion_BDD.php");  
  /*if (!$_SESSION['AdminLoginId']) {
    echo "<script>location.href = 'connexion.php'</script>";
  }*/
    if(isset($_GET['code']) && !empty($_GET['code'])){
        $code = $_GET['code'];
        $recupCours = $bddGestion->prepare('SELECT * FROM `COURS` WHERE codeCours = ?');
        $recupCours->execute(array($code));
        if ($recupCours->rowCount() > 0){
            $cours = $recupCours->fetch();
            $libelle = $cours['libelle'];
            $tauxH = $cours['tauxHoraire'];
            if(isset($_POST['Ajouter'])){
                if (!empty($_POST['libelle']) && !empty($_POST['tauxH'])){
                    $tauxH_new = $_POST['tauxH'];
                    $libelle_new = htmlspecialchars($_POST['libelle']);
                    $animateur_new = $_POST['animateur'];
                    $updateCours = $bddGestion->prepare('UPDATE `COURS` SET libelle = ?, tauxHoraire = ? , animateur = ? WHERE codeCours = ?');
                    $updateCours->execute(array($libelle_new, $tauxH_new, $animateur_new, $code));
                     ?> 
                          <script>
                              alert("vos modifications sont enregistrées");
							  location.href = 'liste_sessions.php'</script>";
                          </script> 
                      <?php
                       
                }else{
                    ?>
                        <script>
                            alert("vos modifications ne sont pas enregistrées. Veuillez remplir tout les champs.");
                        </script> 
                    <?php
                    
                }
            }

        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include('head.php')?>
  <body>
    <?php
      include("header.php");  
    ?>
    <main id="main">

      <!-- ======= Breadcrumbs Section ======= -->
      <section class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Modifier un cours</h2>
            <ol>
              <li><a href="liste_cours.php">Cours</a></li>
              <li>Modifier un cours</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs Section -->

      <section class="inner-page">
        <div class="container">
          <form action = "" method="POST">
            <strong><label>libellé</label></strong><br />
            <input type="text" name="libelle" class="form-control" value="<?=$libelle?>" placeholder="..." autocomplete="off"><br />
            <strong><label>Taux Horaire</label></strong><br />
            <input type="text" name="tauxH" class="form-control" value="<?=$tauxH?>" placeholder="..." autocomplete="off"><br />
            <strong><label>Animateur:</label></strong><br />
            <select class="form-control" name="animateur">
              <?php
                $recup_animateur = $bddGestion->query('SELECT * FROM `ANIMATEURS`');
                while($animateur = $recup_animateur->fetch()){ 
                  echo'<option class="form-control" value='.$animateur['numEmbauche'].'>'.$animateur['nomAnimateur']. ' ' .$animateur['prenomAnimateur'].'</option>';
                }
              ?>
            </select><br />
            <input type="submit" name="Ajouter" class="btn btn-primary">
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