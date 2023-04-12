<?php
$conn = mysqli_connect('127.0.0.1','root','','essai_bdd');
if(!$conn){
    echo 'Error: ' . mysqli_connect_error();
}

$nom      =  $_POST['nom'];
$email    =  $_POST['email'];
$sujet   =  $_POST['sujet'];
$msg      =  $_POST['messages'];

$errors = [
    'nomErreur' => '',
    'prenomErreur' => '',
    'emailErreur' => '',
    'msgErreur' => '',
];

if(isset($_POST['submit'])){

    
    if(empty($nom)){
      $errors['nomErreur'] = 'veuillez introduire votre nom';
    }
    elseif(empty($sujet)){
        $errors['prenomErreur'] = 'veuillez introduire votre prénom';
    }
    elseif(empty($email)){
        $errors['emailErreur'] = 'veuillez introduire votre email';
    } 
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['emailErreur'] =  'veuillez introduire un email correct';
    }
    elseif(empty($msg)){
        $errors['msgErreur'] = 'veuillez introduire votre message';
    }
   
    if(!array_filter($errors)){    //ya pas erreurs
     $nom = mysqli_real_escape_string($conn,$_POST['nom']);
     $sujet = mysqli_real_escape_string($conn,$_POST['sujet']);
     $email = mysqli_real_escape_string($conn,$_POST['email']);
     $msg = mysqli_real_escape_string($conn,$_POST['messages']);        
     $sql = "INSERT INTO contact(nom,sujet,email,messages) VALUES('$nom','$sujet','$email','$msg')";
     if(mysqli_query($conn, $sql)){
        header('Location: index.html');}
     else{
         echo 'Error' . mysqli_error($conn);
        }
    }
    
}
?>

