<?php
session_start();
include("connexion_BDD.php");
if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $suppr_id = htmlspecialchars($_GET['id']);
   $suppr = $bddGestion->prepare('DELETE FROM ANIMATEURS WHERE numEmbauche = ?');
   $suppr->execute(array($suppr_id));
   header('Location: http://127.0.0.1/WebDev/admin/liste_Animateurs.php');
}
?>