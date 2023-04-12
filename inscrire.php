<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>WebDev</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<link rel="icon" type="image/png" sizes="30x30" href="assets/img/wd.png">

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
    ?><?php include "connexion_BDD.php";?>

    <main id="main">

      <!-- ======= Breadcrumbs Section ======= -->
      <section class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>inscription</h2>
            <ol>
              <li><a href="sessions.php">Nos sessions</a></li>
              <li>inscription</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs Section -->

      <section class="inner-page">
        <div class="container">
		<section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">
	   <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Inscription</h2>
        </div>	
		<div class="row">
          <div class="col-lg-6 ">
            <img src='assets/img/bienvenu.jpg' style="border:0; width: 100%; height: 360px;border-radius:30px 0;" allowfullscreen></img>
          </div>
          <div class="col-lg-6">
		  <br/>
          <form action = "" method="POST">
            <strong><label>Nom</label></strong><br />
            <input type="text" name="nom" class="form-control" placeholder="Votre nom..." autocomplete="off"><br />
            <strong><label>Prénom</label></strong><br />
            <input type="text" name="prenom" class="form-control" placeholder="votre prenom..." autocomplete="off"><br />
            <strong><label>Adresse</label></strong><br />
            <input type="text" name="adresse" class="form-control" placeholder="Votre adresse..." autocomplete="off"><br />
            <div class="text-center"><input type="submit" name="Ajouter" style="align:center;"></div>
          </form>           
        </div>
        <?php
            if(isset($_POST['Ajouter']) && isset($_GET['an']) && !empty($_GET['an']) && isset($_GET['num']) && !empty($_GET['num'])){
                if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse'])){
                    $nom = htmlspecialchars($_POST['nom']);
                    $prenom = htmlspecialchars($_POST['prenom']);
                    $adresse = htmlspecialchars($_POST['adresse']);
                    $insererAdherent = $bddGestion->prepare('INSERT INTO ADHERENTS(nomAdherent, prenomAdherent, adresse) VALUES(?, ?, ?)');
                    $insererAdherent->execute(array($nom, $prenom, $adresse));
                    $trouv = 0;
                    $recup_Adhrts = $bddGestion->query('SELECT * FROM `ADHERENTS`');
                    while(($Adhrts = $recup_Adhrts->fetch()) && ($trouv == 0)){
                      if(($nom == $Adhrts['nomAdherent']) && ($prenom == $Adhrts['prenomAdherent']) && ($adresse == $Adhrts['adresse'])){
                        $trouv = 1;
                        $num1 =  $Adhrts['numAdherent'];
                      }else{
                        $trouv = 0;
                      }
                    }
                    if($trouv == 1){
                      $numadh = $num1;
                      $sessionannee = $_GET['an'];
                      $sessionum = $_GET['num'];
                      $suivre = $bddGestion->prepare('INSERT INTO SUIVRE(adherent,numOrdreSession, anneSession, dateAdhesion) VALUES(?, ?, ?, NOW())');
                      $suivre->execute(array($numadh,$sessionum, $sessionannee));
                      ?> 
                          <script>
                              alert("votre iscription est effectuée");
                              location.href = 'sessions.php';
                          </script> 
                      <?php 
                    }  
                }else{
                    ?>
                        <script>
                            alert("votre iscription n'est pas effectuée. Veuillez remplir tout les champs.");
                        </script> 
                    <?php
                    
                }
            }
        ?>
		</div>
		</div>
		</section>
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