<?php
  session_start();
  include("connexion_BDD.php");  
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
            <h2>Ajouter une session</h2>
            <ol>
              <li><a href="#">Sessions</a></li>
              <li>Ajouter une session</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs Section -->

      <section class="inner-page">
        <div class="container">
          <form action = "" method="POST">
            <strong><label>Numéro de la session</label></strong><br />
            <input type="number" name="num" class="form-control" placeholder="..." autocomplete="off"><br />
            <strong><label>Année</label></strong><br />
            <input type="number" name="annee" class="form-control" placeholder="..." autocomplete="off"><br />
            <strong><label>Titre</label></strong><br />
            <input type="text" name="titre" class="form-control" placeholder="..." autocomplete="off"><br />
            <strong><label>Lieu</label></strong><br />
            <input type="text" name="lieu" class="form-control" placeholder="..." autocomplete="off"><br />
            <strong><label>La durée (en semaines)</label></strong><br />
            <input type="number" name="duree" class="form-control" placeholder="..." autocomplete="off"><br />
            <strong><label>Nombre de places:</label></strong><br />
            <input type="number" name="nbmax" class="form-control" placeholder="..." autocomplete="off"><br />
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
        <?php
            if(isset($_POST['Ajouter'])){
                if (!empty($_POST['num']) && !empty($_POST['annee']) && !empty($_POST['titre']) && !empty($_POST['lieu']) && !empty($_POST['duree']) && !empty($_POST['nbmax'])){
                    $num = $_POST['num'];
                    $annee = $_POST['annee'];
                    $titre = htmlspecialchars($_POST['titre']);
                    $lieu = htmlspecialchars($_POST['lieu']);
                    $duree = $_POST['duree'];
                    $nbmax = $_POST['nbmax'];
                    $responsable = $_POST['animateur'];
                    $verif = '0';
                    $recup_session = $bddGestion->query('SELECT * FROM `SESSIONS`');
                    while($session = $recup_session->fetch()){
                      if($num == $session['NumOrdre'] && $annee == $session['annee']){
                        $verif = '1';
                        ?> 
                        <script>
                            alert("cette session existe déja");
                        </script> 
                        <?php
                      }
                    }
                    if($verif == '0'){
                      $insererSession = $bddGestion->prepare('INSERT INTO `SESSIONS`(NumOrdre, annee, titre, lieu, duree, nombrePlacesMax, responsable) VALUES(?, ?, ?, ?, ?, ?, ?)');
                      $insererSession->execute(array($num, $annee, $titre, $lieu, $duree, $nbmax, $responsable));
                      ?> 
                          <script>
                              alert("La session a été bien ajoutée");
							  location.href = 'liste_sessions.php';
                          </script> 
                      <?php
                    }
                       
                }else{
                    ?>
                        <script>
                            alert("La session n'a pas été ajoutée. Veuillez remplir tout les champs.");
                        </script> 
                    <?php
                    
                }
            }
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