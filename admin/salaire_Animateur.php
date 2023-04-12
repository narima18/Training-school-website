<?php
  session_start();
  include("connexion_BDD.php");   
  $id = $_GET['id'];
  $res=$bddGestion->query('SELECT tauxHoraire * salaireHeure AS "salaire" FROM cours, salaire WHERE animateur ='.$id.' ');
  $res1=$bddGestion->query('SELECT responsable FROM sessions WHERE responsable ='.$id.' ');
  $res2=$bddGestion->query('SELECT primeResponsabilite AS "Prime" FROM salaire');
  $res2=$res2->fetch();
  $s=0;
  while($row = $res->fetch()){
	  $s=$s+$row['salaire'];
  }
  if($res1->rowCount() > 0){
	  $s=$s+$res1->rowCount()* $res2['Prime'];
  }
?>		
<script>
	alert(" Son salaire est de <?php echo $s; ?>");
	location.href = 'liste_Animateurs.php';
</script>
