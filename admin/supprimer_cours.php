<?php 
  session_start();
  include("connexion_BDD.php");  
  if (isset($_GET['code']) && !empty($_GET['code'])) {
    $code = $_GET['code'];
    $recupCours = $bddGestion->prepare('SELECT * FROM `COURS` WHERE codeCours = ?');
    $recupCours->execute(array($code)); 
    if ($recupCours->rowCount() > 0){
        $supprmCours = $bddGestion->prepare('DELETE FROM `COURS` WHERE codeCours = ?');
        $supprmCours->execute(array($code));
        echo "<script>location.href = 'liste_sessions.php'</script>";
    }else{
        echo"aucun élément n'a été trouvé";
    }
    
  }else{
      echo"l'identifiant n'a pas été récupéré";
  }
?>