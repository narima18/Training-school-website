<?php
  session_start();
  include("connexion_BDD.php");   
?>
 <?php
	 if(isset($_GET['id']) && !empty($_GET['id'])){
        $get_id = $_GET['id'];
        $recupAnimateur = $bddGestion->prepare('SELECT * FROM `ANIMATEURS` WHERE numEmbauche = ?');
        $recupAnimateur->execute(array($get_id));
        if ($recupAnimateur->rowCount() > 0){
            $A = $recupAnimateur->fetch();
            $numEmb =$A['numEmbauche'];
            $nom_prec = $A['nomAnimateur'];
            $prenom_prec = $A['prenomAnimateur'];
            $telephone = $A['telephone'];
            $adr = $A['adresseBancair'];
            $adrs = $A['adresse'];
            if(isset($_POST['Ajouter'])){
                if (!empty($_POST['numEm']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['phone']) && !empty($_POST['banc']) && !empty($_POST['adresse'])){
                    $id = $_GET['id'];
					$num = $_POST['numEm'];
                    $nom = htmlspecialchars($_POST['nom']);
                    $prenom = htmlspecialchars($_POST['prenom']);
                    $phone = htmlspecialchars($_POST['phone']);
                    $banc = $_POST['banc'];
                    $adresse = htmlspecialchars($_POST['adresse']);
                    if(preg_match('`[0]{1}[5-7]{1}[0-9]{8}`',$phone)){
                        $modifierAnimateur = $bddGestion->prepare('UPDATE ANIMATEURS SET numEmbauche=?, nomAnimateur=?,prenomAnimateur=?,telephone=?,adresseBancair=?,adresse=? WHERE numEmbauche=?');
                        $modifierAnimateur->execute(array($num,$nom, $prenom, $phone, $banc, $adresse,$id));
                        ?> 
                            <script>
                                alert("Les informations de l'animateur ont été modifiés avec succés.");
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
                            alert("Les informations de l'animateur n'ont pas été modifiés. Veuillez remplir tout les champs.");
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
            <h2>Modifier l'Animateur</h2>
            <ol>
              <li><a href="liste_Animateurs.php">Animateurs</a></li>
              <li>Modifier l'Animateur</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs Section -->

      <section class="inner-page">
         <div class="container">
          <form action = "" method="POST">
          <strong><label>Numéro d'embauche</label></strong><br />
            <input type="number" name="numEm" class="form-control" placeholder="..." value="<?=$numEmb?>" autocomplete="off"><br />
            <strong><label>Nom</label></strong><br />
            <input type="text" name="nom" class="form-control" placeholder="..." value="<?=$nom_prec?>" autocomplete="off"><br />
            <strong><label>Prénom</label></strong><br />
            <input type="text" name="prenom" class="form-control" placeholder="..." value="<?=$prenom_prec?>" autocomplete="off"><br />
            <strong><label>Téléphone</label></strong><br />
            <input type="text" name="phone" class="form-control" placeholder="0 5/6/7..." value="<?=$telephone?>" autocomplete="off"><br />
            <strong><label>Adresse Bancaire</label></strong><br />
            <input type="number" name="banc" class="form-control" placeholder="..." value="<?=$adr?>" autocomplete="off"><br />
            <strong><label>Adresse</label></strong><br />
            <input type="text" name="adresse" class="form-control" placeholder="..." value="<?=$adrs?>" autocomplete="off"><br />
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