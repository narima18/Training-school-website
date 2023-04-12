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

  <!-- =======================================================
  * Template Name: Squadfree - v4.7.0
  * Template URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<?php include "header.php";
 include "connexion_BDD.php";?>
  <main id="main">
    <section class="inner-page">
      <div class="container">
      <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <h3>LAISSEZ NOUS UN MOT<h3>
          <p>NOUS SOMMES À VOTRE ÉCOUTE</p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Adresse</h3>
              <p>Quartier sghir,Béjaia</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p>contact@webdev.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Une assistance téléphonique ?</h3>
              <p>+213 528 335 660</p>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-lg-6 ">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6393.669145200439!2d5.051339821743552!3d36.75054166774013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128d334d47a25ff7%3A0x37b8294b89b3de5d!2zUXVhcnRpZXIgU8OpZ2hpciwgQsOpamHDr2E!5e0!3m2!1sfr!2sdz!4v1641916751810!5m2!1sfr!2sdz" width="100%" height="360px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>          </div>
          <div class="col-lg-6">
            <form action="" method="post" class="php-email-form">
              			  <cont id="cont"><div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="sujet" id="sujet" placeholder="Sujet" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="text-center"><button type="submit" name="ajouter">Envoyer</button></div>
			  </cont>
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->
      </div>
<?php
  if (isset($_POST['ajouter'])){
	if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['sujet']) && !empty($_POST['message'])){
	 $nom = htmlspecialchars($_POST['nom']);
	 $email=htmlspecialchars($_POST['email']);
	 $sujet =htmlspecialchars($_POST['sujet']);
	 $msg  = htmlspecialchars($_POST['message']);
	 $contacter = $bddGestion->prepare('INSERT INTO contacts(nom,email,sujet,message) VALUES(?, ?, ?,?)');
	 $contacter->execute(array($nom, $email, $sujet,$msg));
	?>
    <script>
     alert("Votre message a été envoyé. Merci!");
     location.href = 'index.php';
	</script> 
    <?php 
    }  
    else{
    ?>
    <script>
     alert("votre message n'a pas été envoyé. Veuillez remplir tout les champs.");
    </script> 
                    <?php
	}
  }
?>

    </section>

  </main><!-- End #main -->
  <?php include "footer.php";?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>