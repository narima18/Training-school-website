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
		<div id='sectionAimprimer'>
         <table class="table table-striped">
               <thead>
				 <tr>
					<th scope="col">Nom</th>
					<th scope="col">Email</th>
					<th scope="col">Sujet</th>
					<th scope="col">Message</th>
				 </tr>
               </thead>	  
        <?php
          $recup_Contacts = $bddGestion->query('SELECT * FROM `Contacts`');
          while($Contact = $recup_Contacts->fetch()){
              echo("<tbody>
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
		  </div><a href="#" onClick="imprimer('sectionAimprimer')">Imprimer</a>
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


<script>
function imprimer(divName) {
      var printContents = document.getElementById(divName).innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }
</script>
</body>
</html>