<?php
  session_start();
  include("connexion_BDD.php");  
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
            <h2>Ajouter un animateur</h2>
            <ol>
              <li><a href="index.htmlv">Animateurs</a></li>
              <li>Ajouter un animateur</li>
            </ol>
          </div>
        </div>
      </section><!-- End Breadcrumbs Section -->

      <section class="inner-page">
        <div class="container">
          <form action = "" method="POST">
          <strong><label>Numéro d'embauche</label></strong><br />
            <input type="number" name="numEm" class="form-control" placeholder="..." autocomplete="off"><br />
            <strong><label>Nom</label></strong><br />
            <input type="text" name="nom" class="form-control" placeholder="..." autocomplete="off"><br />
            <strong><label>Prénom</label></strong><br />
            <input type="text" name="prenom" class="form-control" placeholder="..." autocomplete="off"><br />
            <strong><label>Téléphone</label></strong><br />
            <input type="text" name="phone" class="form-control" placeholder="0 5/6/7..." autocomplete="off"><br />
            <strong><label>Adresse bancaire</label></strong><br />
            <input type="number" name="banc" class="form-control" placeholder="..." autocomplete="off"><br />
            <strong><label>Adresse</label></strong><br />
            <input type="text" name="adresse" class="form-control" placeholder="..." autocomplete="off"><br />
            <input type="submit" name="Ajouter" class="btn btn-primary">
          </form>           
        </div>
        <?php
            if(isset($_POST['Ajouter'])){
                if (!empty($_POST['numEm']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['phone']) && !empty($_POST['banc']) && !empty($_POST['adresse'])){
                    $num = $_POST['numEm'];
                    $nom = htmlspecialchars($_POST['nom']);
                    $prenom = htmlspecialchars($_POST['prenom']);
                    $phone = htmlspecialchars($_POST['phone']);
                    $banc = $_POST['banc'];
                    $adresse = htmlspecialchars($_POST['adresse']);
                    if(preg_match('`[0]{1}[5-7]{1}[0-9]{8}`',$phone)){
                        $insererAnimateur = $bddGestion->prepare('INSERT INTO ANIMATEURS(numEmbauche, nomAnimateur,prenomAnimateur,telephone,adresseBancair,adresse) VALUES(?, ?, ?, ?, ?, ?)');
                        $insererAnimateur->execute(array($num,$nom, $prenom, $phone, $banc, $adresse));
                        ?> 
                            <script>
                                alert("L'animateur a été bien ajouté.");
								location.href = 'liste_Animateurs.php';
                            </script> 
                        <?php
                    }else{
                        ?> 
                            <script>
                                alert("Veuillez entrer un numéro de téléphone valide.");
                            </script> 
                        <?php
                    }    
                }else{
                    ?>
                        <script>
                            alert("L'animateur n'a pas été ajouté. Veuillez remplir tout les champs.");
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