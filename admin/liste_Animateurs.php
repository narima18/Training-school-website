<?php
  session_start();
  include("connexion_BDD.php");  

?>
<!DOCTYPE html>
<html lang="en">
    <?php
      include("head.php");  
    ?>
  <body>
    <?php
      include("header.php");  
    ?>
    <main id="main">

      <!-- ======= Breadcrumbs Section ======= -->
      <section class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Liste animateurs</h2>
            <ol>
              <li><a href="#">ANIMATEURS</a></li>
              <li>Liste animateurs</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs Section -->

    <section id="services" class="services">
      <div class="container">
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Animateurs</h2>
        </div>	
		        <center>
          <div class="container">
            <div class="form-group mt-3">
              <form action = "" method="POST">
              <input style="border-radius :5px; border: 1px solid #67b0d1; height: 37px; width: 400px;" type="text" name="search" placeholder="Rechercher..." autocomplete="off">
              <input type="submit" value="Recherche" style = "height: 37px;" class="btn btn-secondary" name="Recherche"><br/><br/>
            </form>  
            </div>
                   
        </div>
          </center>
       
		  <div class="row">	
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
          if (isset($_POST['Recherche'])) {
            if(!empty($_POST['search'])){
              $search = $_POST['search'];
              $recup_recherche = $bddGestion->query("SELECT * FROM ANIMATEURS WHERE numEmbauche LIKE '%$search%' OR nomAnimateur LIKE '%$search%' OR prenomAnimateur LIKE '%$search%' OR telephone LIKE '%$search%' OR adresseBancair LIKE '%$search%' OR adresse LIKE '%$search%'");
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
            }
          }
        ?>
			   <table class="table table-striped">
	   <thead>
		 <tr>
			<th scope="col">N° d'embauche</th>
			<th scope="col">Nom</th>
			<th scope="col">Prénom</th>
			<th scope="col">Téléphone</th>
			<th scope="col">Adresse bancaire</th>
            <th scope="col">Adresse</th>
			<th scope="col">Salaire</th>
			<th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
		 </tr>
	   </thead>	 
	   <tbody>
        <?php
          $recup_Anims = $bddGestion->query('SELECT * FROM `ANIMATEURS`');
          while($Anims = $recup_Anims->fetch()){
            echo("
			<tr>
             <td>".$Anims['numEmbauche']."</td>
			 <td>".$Anims['nomAnimateur']."</td>
			 <td>".$Anims['prenomAnimateur']."</td>
             <td>".$Anims['telephone']."</td>
			 <td>".$Anims['adresseBancair']."</td>
			 <td>".$Anims['adresse']."</td>
			 <td><a href='salaire_Animateur.php?id=".$Anims['numEmbauche']."'><i class='material-icons' style='font-size:30px;justify-content: center;'>payment</i></a></td>
			 <td><a href='modifier_Animateur.php?id=".$Anims['numEmbauche']."'><i class='material-icons' style='font-size:30px;justify-content: center;'>mode_edit</i></a></td>
			 <td><a href='supprimer_Animateur.php?id=".$Anims['numEmbauche']."' class='delete' data-confirm='Etes vous sur de vouloir supprimer cet animateur?'><i class='material-icons' style='font-size:30px;'>delete</i></a></td>
			</tr>"); 
				 }
        ?>
				</tbody>
		  </table>
		  </div>
      </section>
		<script>
var deleteLinks = document.querySelectorAll('.delete');

for (var i = 0; i < deleteLinks.length; i++) {
  deleteLinks[i].addEventListener('click', function(event) {
	  event.preventDefault();

	  var choice = confirm(this.getAttribute('data-confirm'));

	  if (choice) {
	    window.location.href = this.getAttribute('href');
	  }
  });
}
</script>
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