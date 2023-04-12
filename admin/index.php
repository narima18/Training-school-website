<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/png" sizes="30x30" href="assets/img/wd.png">
<title>WebDev</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
}

button:hover {
  opacity: 0.8;
}


.box {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 20%;
  border-radius: 50%;
}

/*.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens*/ 
@media screen and (max-width: 1200px) {

  input[type=text], input[type=password] {
  width: 80%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 80%;
}  
span.psw {
     display: block;
     float: none;
  }
}
</style>
</head>
  <body>
    <main id="main">
	<section class="slider">
   <div class="box">
      <h1 class="title">Espace de connexion administrateur</h1>
	<img src="assets/img/admin1.png" alt="Avatar" class="avatar"></br>
            <form action = "" method="POST">

                <input type="text" name="userName" class="form-control" placeholder="Nom d'utilistateur" autocomplete="off"><br />

                <input type="password" name="pwd" class="form-control" placeholder="Mot de passe" autocomplete="off"><br />
                <input type="submit" name="Ajouter">
            </form>
    </div>   
</section>			
        <?php
		include("connexion_BDD.php");
        if(isset($_POST['Ajouter'])){
            if (!empty($_POST['userName']) && !empty($_POST['pwd'])){
                $userName_saisi = htmlspecialchars($_POST['userName']);
                $passwd_saisi = sha1(htmlspecialchars($_POST['pwd']));
                $trouve = 0;
                $recup_admin = $bddGestion->query('SELECT * FROM `ADMINISTRATEUR`');
                while(($admin = $recup_admin->fetch()) && ($trouve == 0)){ 
                    if(($userName_saisi == $admin['userName']) && ($passwd_saisi == $admin['passwd'])){
                        $trouve = 1;
                    }
                }  
                if($trouve == 1){
                  session_start();
                  $_SESSION ['AdminLoginId'] = $admin['ID'];
				  $_SESSION['Admin']=$_POST['userName'];
                  echo "<script>location.href = 'admin.php'</script>";
                }else{
                    ?><script>
                        alert("Votre nom d'utilisateur ou votre mot de passe est incorrect.");
                    </script>
                <?php
                }
            }else{
                ?><script>
                alert("Veuillez remplir tout les champs.");
                </script>
                <?php
            }
        }
        ?>      

    </main><!-- End #main -->
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