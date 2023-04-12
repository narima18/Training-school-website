<?php
  session_start();
  include("connexion_BDD.php");  
  // if (!$_SESSION['AdminLoginId']) {
    // echo "<script>location.href = 'index.php'</script>";
  // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ajouter un administrateur</title>
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
            <h2>Ajouter un administrateur</h2>
            <ol>
              <li><a href="index.htmlv">Home</a></li>
              <li>Ajouter un administrateur</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs Section -->

      <section class="inner-page">
        <div class="container">
          <form action = "" method="POST">
            <strong><label>User name</label></strong><br />
            <input type="text" name="username" class="form-control" placeholder="votre nom ..." autocomplete="off"><br />
            <strong><label>Password</label></strong><br />
            <input type="password" name="mdpss" class="form-control" placeholder="votre mot de passe" autocomplete="off"><br />
            <input type="password" name="mdpssconf" class="form-control" placeholder="confirmez votre mot de passe" autocomplete="off"><br />
            <input type="submit" name="Envoyer">
          </form>
          <?php
            if(isset($_POST['Envoyer'])){
              if (!empty($_POST['username']) && !empty($_POST['mdpss']) && !empty($_POST['mdpssconf'])){
                $usr = htmlspecialchars($_POST['username']);
                $pwd = sha1($_POST['mdpss']);
                $pwdC = sha1($_POST['mdpssconf']);
                if($pwdC == $pwd){
                  $insererArticle = $bddGestion->prepare('INSERT INTO ADMINISTRATEUR(userName, passwd) VALUES(?, ?)');
                  $insererArticle->execute(array($usr, $pwd));
                  ?> 
                    <script>
                      alert("L'administrateur a été bien ajouté.");
					  location.href = 'index.php';
                    </script> 
                  <?php
                }else{
                  ?> 
                    <script>
                      alert("Veuillez confirmer votre mot de passe.");
                    </script> 
                  <?php
                }
              }else{
                ?>
                  <script>
                    alert("Votre message n'a pas été envoyé. Veuillez remplir tout les champs.");
                  </script> 
                <?php
              }
            }
          ?>
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