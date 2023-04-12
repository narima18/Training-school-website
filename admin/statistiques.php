<?php
  include("connexion_BDD.php");  
  session_start();
  
?>
<!DOCTYPE html>
<html lang="en">
<?php include"head.php"?>
  <body>
    <?php
      include("header.php");  
    ?>
    <main id="main">

      <!-- ======= Breadcrumbs Section ======= -->
      <section class="inner-page">
        <div class="container">
		<section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">
	   <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <strong><h2>Statistiques</h2></strong>
        </div>	
        </div><br/>

               <div class="container">
		
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
           <h2>Les adhérents étant inscrit entre deux dates</h2>
        </div>
            <br/>
              <center> 
            <div class="form-group mt-3">
              <form action = "" method="POST">
                <label><H5>Date 1</H5></label>
                  <input style="border-radius :5px; border: 1px solid #67b0d1; height: 37px; width: 400px;" type="date" name="date1" placeholder="recherche.." autocomplete="off">
                <label><H5>Date 2</H5></label>
                <input style="border-radius :5px; border: 1px solid #67b0d1; height: 37px; width: 400px;" type="date" name="date2" placeholder="recherche.." autocomplete="off">

                  <input type="submit" value="Recherche" style = "height: 37px;" class="btn btn-secondary" name="Recherche">
              </form>  
            </div>
            </center>       
          
          <div id='sectionAimprimer2'>
              <?php
                if(isset($_POST['Recherche'])){
                  if (isset($_POST['date1']) && isset($_POST['date2'])) {
                    if (!empty($_POST['date1']) && !empty($_POST['date2'])) {
                      $date1 = $_POST['date1'];
                      $date2 = $_POST['date2'];
                      $nombre = 0;
                      $recup_adhr = $bddGestion->prepare('SELECT * FROM ADHERENTS WHERE numAdherent IN ( SELECT adherent FROM SUIVRE WHERE dateAdhesion BETWEEN ? AND ?)');
                      $recup_adhr->execute(array($date1, $date2));
                      $recup_nombre = $bddGestion->prepare('SELECT COUNT(*) AS "nombre" FROM ADHERENTS WHERE numAdherent IN ( SELECT adherent FROM SUIVRE WHERE dateAdhesion BETWEEN ? AND ?)');
                      $recup_nombre->execute(array($date1, $date2));
                      $nombre = $recup_nombre->fetch();
                      echo("</br>");echo("</br>"); echo("</br>"); echo("</br>");
                      echo("<H5><strong> Le nombre d'adhérents : </strong>".$nombre['nombre']."</H5>");
                      echo("<table class='table table-striped'>");
                      echo("<thead>");
                      echo("<tr>");
                      echo'<th scope="col">nom</th>';
                      echo '<th scope="col">prenom</th>';
                      echo'<th scope="col">adresse</th>';
                      echo'</tr>';
                      echo'</thead>';
                      while($adherent = $recup_adhr->fetch()){
                        echo("<tr><th>".$adherent['nomAdherent']."</th>
                        <th>".$adherent['prenomAdherent']."</th>
                        <th>".$adherent['adresse']."</th>");             
                      }
                      echo("</table>");
				  ?>
						</div>
						<center><a href="#" style = "height: 37px;" class="btn btn-secondary" onClick="imprimer('sectionAimprimer2')">Imprimer</a>   </center>
                      <?php }
                      }
				}
                        
                    ?>
        </div>
        </div>
        <br><br><br><br>
         <div class="container">
		 <div id='sectionAimprimer'>
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Le nombre d'adherents par session </h2>
        </div>
            <br/><br/>
                    <?php

                        echo("<table class='table table-striped'>");
                        echo("<thead>");
                        echo("<tr>");
                        echo'<th scope="col">Année de la session</th>';
                        echo '<th scope="col">Numéro de la session</th>';
                        echo '<th scope="col">Nombre d\'adhérents</th>';
                        echo'</tr>';
                        echo'</thead>';
                        $recup_session = $bddGestion->query('SELECT anneSession, numOrdreSession ,COUNT(*) AS "nombre" FROM SUIVRE GROUP BY anneSession, numOrdreSession');
                        while($sessions = $recup_session->fetch()){
                          echo("<tr><th>".$sessions['anneSession']."</th>
                          <th>".$sessions['numOrdreSession']."</th>
                          <th>".$sessions['nombre']."</th>");
                                 
                                }
                                echo("</table>");
                    ?>
                    <br/>
</div>
<center><a href="#" style = "height: 37px;" class="btn btn-secondary" onClick="imprimer('sectionAimprimer')">Imprimer</a></center>
        </div>
        
        <br><br><br><br>
               <div class="container">
		 
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Les cours animés par un animateur </h2>
        </div>
                <div class="form-group mt-3">
                  <form action = "" method="POST">
                    <select class="form-control" name="animateur">
                      <?php
                        $recup_animateur = $bddGestion->query('SELECT * FROM `ANIMATEURS`');
                        while($animateur = $recup_animateur->fetch()){ 
                          echo'<option class="form-control" value='.$animateur['numEmbauche'].'>'.$animateur['nomAnimateur']. ' ' .$animateur['prenomAnimateur'].'</option>';
                        }
                      ?>
                    </select>
                   <center> <input type="submit" value="Rechercher cours" style = "height: 37px;" class="btn btn-secondary" name="Recherche2"></center>
                  </form>  
                </div>
              <div id='sectionAimprimer1'>
            
                    <?php
                      if (isset($_POST['Recherche2'])) {
                        if (!empty($_POST['Recherche2'])){
                          $animateur = $_POST['animateur'];
                          $recup_nbr = $bddGestion->prepare('SELECT COUNT(*) AS "nombre"FROM COURS WHERE animateur = ?');
                          $recup_nbr->execute(array($animateur));
                          $nbr = $recup_nbr->fetch();
                          echo("<p><strong> Le nombre de cours: </strong>".$nbr['nombre']."</p>");
                          
                          echo("<table class='table table-striped'>");
                          echo("<thead>");
                          echo("<tr>");
                          echo '<th scope="col">Libellé</th>';
                          echo'<th scope="col">Taux Horaire</th>';
                          echo'<th scope="col">Session</th>';
                          echo'</tr>';
                          echo'</thead>';
                          echo'<tbody>';
                          $recup_cours = $bddGestion->prepare('SELECT * FROM COURS WHERE animateur = ?');
                          
                          $recup_cours->execute(array($animateur));
                          
                          while($cours = $recup_cours->fetch()){
                            $recup_session = $bddGestion->prepare('SELECT * FROM `SESSIONS` WHERE NumOrdre = ? AND annee = ?');
                            $recup_session->execute(array($cours['numSession'], $cours['anneeSession']));
                            $sessions = $recup_session->fetch();
                            echo("<tr>
                            <th>".$cours['libelle']."</th>
                            <th>".$cours['tauxHoraire']."</th>");
                            echo(" <th>".$sessions['titre']."</th>");
                          }
                          echo'</tbody>';
                          echo("</table>");
						  ?>
						</div>
						<center><a href="#" style = "height: 37px;" class="btn btn-secondary" onClick="imprimer('sectionAimprimer1')">Imprimer</a></center>   
                      <?php }
                      }
                        
                    ?>
        </div><br><br><br>
		
		         <div class="container">
		 <div id='sectionAimprimer4'>
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Les animateurs qui sont également responsables des sessions</h2>
        </div>
            <br/><br/>
                    <?php

                        echo("<table class='table table-striped'>");
                        echo("<thead>");
                        echo("<tr>");
                        echo'<th scope="col">Nom de l\'animateur </th>';
                        echo '<th scope="col">Prénom de l\'animateur</th>';
                        echo'</tr>';
                        echo'</thead>';
                        $recup_session = $bddGestion->query('SELECT nomAnimateur,prenomAnimateur FROM ANIMATEURS where exists(select * from SESSIONS where responsable =numEmbauche)');
                        while($sessions = $recup_session->fetch()){
                          echo("<tr><th>".$sessions['nomAnimateur']."</th>
                          <th>".$sessions['prenomAnimateur']."</th>");
                                 
                                }
                                echo("</table>");
                    ?>
                    <br/>
</div>
<center><a href="#" style = "height: 37px;" class="btn btn-secondary" onClick="imprimer('sectionAimprimer4')">Imprimer</a></center>
        </div>
        

</section>
      </section>

    </main><!-- End #main -->
<script>
function imprimer(divName) {
      var printContents = document.getElementById(divName).innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }
</script>
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