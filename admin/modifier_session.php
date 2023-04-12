<?php
  session_start();
  include("connexion_BDD.php");  
  /*if (!$_SESSION['AdminLoginId']) {
    echo "<script>location.href = 'connexion.php'</script>";
  }*/
 

    if(isset($_GET['an']) && !empty($_GET['an']) && isset($_GET['num']) && !empty($_GET['num'])){
        $getan = $_GET['an'];
        $getnum = $_GET['num'];
        $recupSession = $bddGestion->prepare('SELECT * FROM `SESSIONS` WHERE NumOrdre = ? AND annee = ?');
        $recupSession->execute(array($getnum, $getan));
        if ($recupSession->rowCount() > 0){
            $S = $recupSession->fetch();
            $numOrdre = $S['NumOrdre'];
            $annee = $S['annee'];
            $titre = $S['titre'];
            $lieu = $S['lieu'];
            $duree = $S['duree'];
            $nbmax = $S['nombrePlacesMax'];
            if(isset($_POST['Ajouter'])){
                if (!empty($_POST['num']) && !empty($_POST['annee']) && !empty($_POST['titre']) && !empty($_POST['lieu']) && !empty($_POST['duree']) && !empty($_POST['nbmax'])){
                    $num_new = $_POST['num'];
                    $annee_new = $_POST['annee'];
                    $titre_new = htmlspecialchars($_POST['titre']);
                    $lieu_new = htmlspecialchars($_POST['lieu']);
                    $duree_new = $_POST['duree'];
                    $nbmax_new = $_POST['nbmax'];
                    $responsable_new = $_POST['animateur'];
                    $updateSession = $bddGestion->prepare('UPDATE `SESSIONS` SET NumOrdre = ?, annee = ?, titre = ?, lieu = ?, duree = ?, nombrePlacesMax = ?, responsable = ? WHERE NumOrdre = ? AND annee = ?');
                    $updateSession->execute(array($num_new, $annee_new, $titre_new, $lieu_new, $duree_new, $nbmax_new, $responsable_new, $getnum, $getan));
                     ?> 
                          <script>
                              alert("vos modifications sont enregistrées");
                          </script> 
                      <?php
                      echo "<script>location.href = 'liste_sessions.php'</script>";
                       
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
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Modifier une session</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
</head>
  <body>
    <?php
      include("header.php");  
    ?>
    <main id="main">

      <!-- ======= Breadcrumbs Section ======= -->
      <section class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Modifier une session</h2>
            <ol>
              <li><a href="index.htmlv">Home</a></li>
              <li>Modifier une session</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs Section -->

      <section class="inner-page">
        <div class="container">
          <form action = "" method="POST">
            <strong><label>Numéro de la session</label></strong><br />
            <input type="number" name="num" class="form-control" value="<?=$numOrdre?>" placeholder="..." autocomplete="off"><br />
            <strong><label>Année</label></strong><br />
            <input type="number" name="annee" class="form-control" value="<?=$annee?>" placeholder="..." autocomplete="off"><br />
            <strong><label>Titre</label></strong><br />
            <input type="text" name="titre" class="form-control" value="<?=$titre?>" placeholder="adresse..." autocomplete="off"><br />
            <strong><label>Lieu</label></strong><br />
            <input type="text" name="lieu" class="form-control" value="<?=$lieu?>" placeholder="adresse..." autocomplete="off"><br />
            <strong><label>La durée (en semaines)</label></strong><br />
            <input type="number" name="duree" class="form-control" value="<?=$duree?>" placeholder="..." autocomplete="off"><br />
            <strong><label>Nombre de places:</label></strong><br />
            <input type="number" name="nbmax" class="form-control" value="<?=$nbmax?>" placeholder="..." autocomplete="off"><br />
            <strong><label>Responsable:</label></strong><br />
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