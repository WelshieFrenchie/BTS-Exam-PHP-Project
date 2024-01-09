<!DOCTYPE html>
<html>
    <head>
    	<meta charset='utf-8'>
    	<meta name='viewport' content='width=device-width, initial-scale=1'>
    	<title>Accueil Uncopyrighted.gym</title>
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <?php
        session_start();
    ?>
        <nav class="navbar navbar-expand-lg bg-body-secondary">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Uncopright.gym</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Cours
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
              </ul>
                <?php
                    if (!isset($_SESSION['login'])) {
                    	echo "<a class='btn btn-light' href=''>Connexion</a>";
                    	echo "<a class='btn btn-primary' href=''>Inscription</a>";
                    }
                    else {
                        echo "<a class='btn btn-light' href=''>Modifier mdp</a>";
                        echo "<a class='btn btn-danger' href=''>Deconnexion</a>";
                    }
                ?>
            </div>
          </div>
        </nav>
   		<div class='position-relative'>
    		<p class='display-4 text-center'>Bienvenue à Uncopyrighted.gym!</p>
    	</div>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>