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
          <h2>Contacts</h2>
        </div>	
        <div class="row">
         <table class="table table-striped">
               <thead>
				 <tr>
					<th scope="col">Nom</th>
					<th scope="col">Email</th>
					<th scope="col">Sujet</th>
					<th scope="col">Message</th>
				 </tr>
               </thead>	 
			   <tbody> 
        <?php
          $recup_Contacts = $bddGestion->query('SELECT * FROM `Contacts`');
          while($Contact = $recup_Contacts->fetch()){
              echo("
				 <tr>
					<td>".$Contact['nom']."</td>
					<td>".$Contact['email']."</td>
					<td>".$Contact['sujet']."</td>
					<td>".$Contact['message']."</td>
					<td><a href='supprimer_contact.php?id=".$Contact['id']."' class='delete' data-confirm='Etes vous sur de vouloir supprimer ce contact ?'><i class='material-icons' style='font-size:30px;'>delete</i></a></td>
				 </tr>"); 
				 }
        ?>
				</tbody>
		  </table>
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