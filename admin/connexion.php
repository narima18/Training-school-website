<?php
  include("connexion_BDD.php"); 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Les sessions</title>
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
            <h2>Les sessions</h2>
            <ol>
              <li><a href="index.htmlv">Home</a></li>
              <li>Les sessions</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs Section -->

      <section class="inner-page">
        <div class="container">
            <form action = "" method="POST">
                <strong><label>Nom d'utilisateur</label></strong><br />
                <input type="text" name="userName" class="form-control" placeholder="Votre nom..." autocomplete="off"><br />
                <strong><label>Mot de passe</label></strong><br />
                <input type="password" name="pwd" class="form-control" placeholder="votre prenom..." autocomplete="off"><br />
                <input type="submit" name="Ajouter">
            </form> 
        </div>
        <?php
        if(isset($_POST['Ajouter'])){
            if (!empty($_POST['userName']) && !empty($_POST['pwd'])){
                $userName_saisi = htmlspecialchars($_POST['userName']);
                $passwd_saisi = sha1(htmlspecialchars($_POST['pwd']));
                $trouve = 0;
                $recup_admin = $bddAdmin->query('SELECT * FROM `ADMINS`');
                while(($admin = $recup_admin->fetch()) && ($trouve == 0)){ 
                    if(($userName_saisi == $admin['userName']) && ($passwd_saisi == $admin['passwd'])){
                        $trouve = 1;
                    }
                }  
                if($trouve == 1){
                  session_start();
                  $_SESSION ['AdminLoginId'] = $admin['ID'];
                  echo "<script>location.href = 'liste_sessions.php'</script>";
                }else{
                    ?><script>
                        alert("Votre nom d'utilisateur ou votre mot de passe est incorrect.");
                    </script>
                <?php
                }
            }else{
                ?><script>
                alert("Veuillez remplir tout les champs.");
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