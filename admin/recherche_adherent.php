<?php
  session_start();
  include("connexion_BDD.php");  

 
?>
<!DOCTYPE html>
<html lang="en">
<?php include"head.php"?>
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
              <input style="border-radius :5px; border: 1px solid #67b0d1; height: 37px; width: 400px;" type="text" name="search" placeholder="recherche.." autocomplete="off">
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
             // echo "<script>location.href = 'recherche_adherent.php'</script>";
            }
          }
        ?>

       
      <?php
          if ($_SESSION['search_adherent']) {
              $search = $_SESSION['search_adherent'];
              $recup_recherche1 = $bddGestion->query("SELECT * FROM ADHERENTS WHERE nomAdherent LIKE '%$search%' OR prenomAdherent LIKE '%$search%' OR adresse LIKE '%$search%'");
              $recup_recherche2 = $bddGestion->query("SELECT * FROM SUIVRE WHERE dateVersement LIKE '%$search%' OR dateAdhesion LIKE '%$search%'");
              if($recup_recherche1->rowCount() > 0){
               echo('<table class="table table-striped">
	   <thead>
		 <tr>
			<th scope="col">Nom</th>
			<th scope="col">Prénom</th>
			<th scope="col">Adresse</th>
			<th scope="col">Date dadhésion</th>
            <th scope="col">Date de versement</th>
			<th scope="col">Versement</th>
			<th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
		 </tr>
	   </thead>
	   <tbody>');
                while($Adhrts1 = $recup_recherche1->fetch()){
                  $a = $Adhrts1['numAdherent'];
                  $recup_suit1 = $bddGestion->prepare('SELECT * FROM SUIVRE WHERE adherent = ?');
                  $recup_suit1->execute(array($a));
                  if($recup_suit1->rowCount() > 0){
                    $suit = $recup_suit1->fetch();
                                          echo("
			   <tr>
            <td>".$Adhrts1['nomAdherent']."</td>
			<td>".$Adhrts1['prenomAdherent']."</td>
			<td>".$Adhrts1['adresse']."</td>
            <td>".$suit['dateAdhesion']."</td>
			<td>".$suit['dateVersement']."</td>
            <td><a href='versement.php?num=".$suit['numOrdreSession']."&an=".$suit['anneSession']."&id=".$suit['adherent']."'><i class='material-icons' style='font-size:30px;justify-content: center;'>payment</i></a></td>
			<td><a href='modifier_Adherent.php?id=".$suit['adherent']."'><i class='material-icons' style='font-size:30px;justify-content: center;'>mode_edit</i></a></td>
			<td><a href='supprimer_Adherent.php?id=".$Adhrts1['numAdherent']."' class='delete' data-confirm='Etes vous sur de vouloir supprimer cet adherent?'><i class='material-icons' style='font-size:30px;'>delete</i></a></td>
			   </tr>"); 
				 }
                  }
                echo("</tbody></table>");
              }else{
                if($recup_recherche2->rowCount() > 0){
                 echo('<table class="table table-striped">
	   <thead>
		 <tr>
			<th scope="col">Nom</th>
			<th scope="col">Prénom</th>
			<th scope="col">Adresse</th>
			<th scope="col">Date dadhésion</th>
            <th scope="col">Date de versement</th>
			<th scope="col">Versement</th>
			<th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
		 </tr>
	   </thead>
	   <tbody>');
            
                  while($suit = $recup_recherche2->fetch()){
                    $a = $suit['adherent'];
                    $recup_Adher = $bddGestion->prepare('SELECT * FROM ADHERENTS WHERE numAdherent = ?');
                    $recup_Adher->execute(array($a));
                    if($recup_Adher->rowCount() > 0){
                      $Adhrts1 = $recup_Adher->fetch();
                   echo("
			   <tr>
            <td>".$Adhrts1['nomAdherent']."</td>
			<td>".$Adhrts1['prenomAdherent']."</td>
			<td>".$Adhrts1['adresse']."</td>
            <td>".$suit['dateAdhesion']."</td>
			<td>".$suit['dateVersement']."</td>
            <td><a href='versement.php?num=".$suit['numOrdreSession']."&an=".$suit['anneSession']."&id=".$suit['adherent']."'><i class='material-icons' style='font-size:30px;justify-content: center;'>payment</i></a></td>
			<td><a href='modifier_Adherent.php?id=".$suit['adherent']."'><i class='material-icons' style='font-size:30px;justify-content: center;'>mode_edit</i></a></td>
			<td><a href='supprimer_Adherent.php?id=".$Adhrts1['numAdherent']."' class='delete' data-confirm='Etes vous sur de vouloir supprimer cet adherent?'><i class='material-icons' style='font-size:30px;'>delete</i></a></td>
			   </tr>"); 
				 }
                  }
                echo("</tbody></table>");
                }else{
                    echo"<script> alert('cet ahérent n\'existe pas');</script>";

                }
              }
            
          }
        
        ?>
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