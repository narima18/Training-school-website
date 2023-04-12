<?php
session_start();
if(!$_SESSION['Admin']){
    header('Location: index.php');
}
?>
<html>
<?php include "head.php" ?>
<body>
<?php include "header.php";
?>
    <main id="main">
    <section id="services" class="services">
      <div class="container">
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2><?php echo "Bonjour ",$_SESSION['Admin'];?></h2>
        </div>	
        <div class="row">
		<div class="text-center">
		<a class="btn" href="deconnecter.php" style="color:black;text-decoration:none;background-color:#32a1ce; width:150px;padding:4px; text-align: center;">Se déconnecter</a></br></br></center>
</div>
</div>
</div>
</section>
</main>
<br/><br/><br/>
<?php include "footer.php"?>

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