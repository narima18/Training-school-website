<?php 
  session_start();
  include("connexion_BDD.php");  
  if (isset($_GET['num']) && !empty($_GET['num']) && isset($_GET['an']) && !empty($_GET['an'])) {
    $getan = $_GET['an'];
    $getnum = $_GET['num'];
    $recupSession = $bddGestion->prepare('SELECT * FROM `SESSIONS` WHERE NumOrdre = ? AND annee = ?');
    $recupSession->execute(array($getnum, $getan)); 
    if ($recupSession->rowCount() > 0){
        $supprmSession = $bddGestion->prepare('DELETE FROM `SESSIONS` WHERE NumOrdre = ? AND annee = ?');
        $supprmSession->execute(array($getnum, $getan));
        echo "<script>location.href = 'liste_sessions.php'</script>";

    }else{
        echo"aucun élément n'a été trouvé";
    }
    
  }else{
      echo"l'identifiant n'a pas été récupéré";
  }
?>