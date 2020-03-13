<header>
<nav class="navbar fixed-top navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="home.php">MENU</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class="nav-link" href="poledance.php">LA POLE DANCE</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="leclub.php">LE CLUB</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="lestarifs.php">TARIFS</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="planning.php">PLANNING</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="infopratique.php">INFOS PRATIQUE</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="galerie.php">GALERIE</a>
          </li>
        </ul>
           <ul class="navbar-nav ml-auto">
                <?php if (!isset($_SESSION['auth']['login'])) { ?>
                    <li class="nav-item"><a href="register.php" class="nav-link btn btn-default">Inscription</a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link btn btn-default">Connexion</a></li>
                <?php } else { ?>
                    <!-- Dropdown -->
                    <li class="nav-item">
                        <a class="nav-link" href="">Bonjour <?= ucfirst(strip_tags($_SESSION['auth']['lastname']))[0] ?> </a>                       
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link">Mon profil</a>                       
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">se déconnecter</a>                       
                    </li>
                <?php } ?>

            </ul>
      </div>
</nav>
   <div style="text-align: center">
       <a href="home.php"><img src="assets/images/50NP_Logo_DEF_01-50NP-CLR-Logo-Seul.png" alt="logo" class="logo" ></a>
      <h1>50 NUANCES DE POLE</h1>
      <p class="slogan">La vie a fleur de pôle...</p>
    </div>
</header>
<!--/.Navbar-->