<?php
  try{
    $bddAdmin = new PDO('mysql:host=localhost;dbname=Administrateur;', 'root', '');
  }catch (Exception $e1){
    die('Erreur : ' . $e1->getMessage());
  } 
  try{
    $bddGestion = new PDO('mysql:host=localhost;dbname=Gestion_Sessions;', 'root', '');
  }catch (Exception $e2){
    die('Erreur : ' . $e2->getMessage());
  }   
 
?>