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
    <section id="services" class="services">
      <div class="container">
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Adhérents</h2>
        </div>	
		      <center>
          <div class="container">
            <div class="form-group mt-3">
              <form action = "" method="POST">
              <input style="border-radius :5px; border: 1px solid #67b0d1; height: 37px; width: 400px;" type="text" name="search" placeholder="Rechercher..." autocomplete="off">
              <input type="submit" value="Recherche" style = "height: 37px;" class="btn btn-secondary" name="Recherche">
            </form>  <br/><br/>
            </div>
                   
        </div>
          </center>

		          <?php
          if (isset($_POST['Recherche'])) {
            if(!empty($_POST['search'])){
              $search = $_POST['search'];
              $_SESSION['search_adherent'] = $search;
              echo "<script>location.href = 'recherche_adherent.php'</script>";
            }
          }
        ?>
        <div class="row">	
		        <?php
        $recup_session = $bddGestion->query('SELECT * FROM `SESSIONS` order by annee DESC ');
        while($sessions = $recup_session->fetch()){?>
           <center><H2> <?php echo($sessions['titre']);?></h2></center>
	   <table class="table table-striped">
	   <thead>
		 <tr>
			<th scope="col">Nom</th>
			<th scope="col">Prénom</th>
			<th scope="col">Adresse</th>
			<th scope="col">Date d'adhésion</th>
            <th scope="col">Date de versement</th>
			<th scope="col">Versement</th>
			<th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
		 </tr>
	   </thead>
	   <tbody>
          <?php
            $annee = $sessions['annee'];
            $num = $sessions['NumOrdre'];
            $recup_suit = $bddGestion->prepare('SELECT * FROM `SUIVRE` WHERE anneSession = ? AND numOrdreSession = ?');  
            $recup_suit->execute(array($annee, $num));
            while($suit = $recup_suit->fetch()){   
                $recup_Adhrts = $bddGestion->prepare('SELECT * FROM ADHERENTS WHERE numAdherent = ?');
                $recup_Adhrts->execute(array($suit['adherent']));
                $Adhrts = $recup_Adhrts->fetch();
               echo("
			   <tr>
            <td>".$Adhrts['nomAdherent']."</td>
			<td>".$Adhrts['prenomAdherent']."</td>
			<td>".$Adhrts['adresse']."</td>
            <td>".$suit['dateAdhesion']."</td>
			<td>".$suit['dateVersement']."</td>
            <td><a href='versement.php?num=".$suit['numOrdreSession']."&an=".$suit['anneSession']."&id=".$suit['adherent']."'><i class='material-icons' style='font-size:30px;justify-content: center;'>payment</i></a></td>
			<td><a href='modifier_Adherent.php?id=".$suit['adherent']."'><i class='material-icons' style='font-size:30px;justify-content: center;'>mode_edit</i></a></td>
			<td><a href='supprimer_Adherent.php?id=".$Adhrts['numAdherent']."' class='delete' data-confirm='Etes vous sur de vouloir supprimer cet adherent?'><i class='material-icons' style='font-size:30px;'>delete</i></a></td>
			   </tr>"); 
		}
        ?>
				</tbody>
		  </table><br/><br>
		<?php }?>
	  
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
</div>
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