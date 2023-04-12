<header id="header" class="fixed-top ">
      <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
          <h1 class="text-light"><a href="#"><span>webdev</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
          <ul>
		    <li><a class="nav-link scrollto " href="admin.php">Accueil</a></li>
		    <li class="dropdown"><a href="#"><span>Sessions</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="ajout_session.php">Ajouter session</a></li>
                <li><a href="liste_sessions.php">Lister sessions</a></li>
              </ul>
            </li>
			<!--li class="dropdown"><a href="#"><span>Cours</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="#">Ajouter cours</a></li>
                <li><a href="#">Lister cours</a></li>
              </ul>
            </li-->
			<li class="dropdown"><a href="#"><span>Animateurs</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="ajout_Formateur.php">Ajouter animateur</a></li>
                <li><a href="liste_Animateurs.php">Lister animateurs</a></li>
              </ul>
            </li>
            <li><a class="nav-link scrollto " href="liste_Adherents.php">Adhérents</a></li>
			<li><a class="nav-link scrollto " href="statistiques.php">Statistiques</a></li>
		    <li><a class="nav-link scrollto " href="contacts.php">Contacts</a></li>
			
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

      </div>
    </header><!-- End Header -->