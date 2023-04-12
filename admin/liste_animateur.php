<?php
  session_start();
  include("connexion_BDD.php");  

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Liste des animateurs</title>
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
            <h2>Liste des animateurs</h2>
            <ol>
              <li><a href="index.htmlv">Home</a></li>
              <li>Liste des animateurs</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs Section -->

      <section class="inner-page">
          <center>
          <div class="container">
            <div class="form-group mt-3">
              <form action = "" method="POST">
              <input style="border-radius :5px; border: 1px solid #67b0d1; height: 37px; width: 400px;" type="text" name="search" placeholder="recherche.." autocomplete="off">
              <input type="submit" value="Recherche" style = "height: 37px;" class="btn btn-secondary" name="Recherche">
            </form>  
            </div>
                   
        </div>
          </center>
       
        
        <?php
          if (isset($_POST['Recherche'])) {
            if(!empty($_POST['search'])){
              $search = $_POST['search'];
              $_SESSION['search_animateur'] = $search;
              echo "<script>location.href = 'recherche_animateur.php'</script>";
            }
          }
        ?>
          <?php
          
           
            
              $recup_recherche = $bddGestion->query("SELECT * FROM ANIMATEURS");
              if($recup_recherche->rowCount() > 0){
                echo("<table class='table table-striped'>");
                echo("<thead>");
                echo("<tr>");
                echo'<th scope="col">numéro d\'embauche</th>';
                echo'<th scope="col">nom</th>';
                echo '<th scope="col">prenom</th>';
                echo'<th scope="col">telephone</th>';
                echo'<th scope="col">adresse bancaire</th>';        
                echo'<th scope="col">adresse</th>';
                echo'</tr>';
                echo'</thead>';
            
                while($resultat = $recup_recherche->fetch()){
                  echo("<tr><th>".$resultat['numEmbauche']."</th><th>".$resultat['nomAnimateur']."</th><th>".$resultat['prenomAnimateur']."</th>
                  <th>".$resultat['telephone']."</th><th>".$resultat['adresseBancair']."</th><th>".$resultat['adresse']."</th></tr>");
                }
                echo("</table>");
              }else{
                echo'nothing';
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