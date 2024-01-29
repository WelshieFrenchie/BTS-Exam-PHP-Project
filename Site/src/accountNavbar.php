<!DOCTYPE html>
<html>
    <head>
    	<meta charset='utf-8'>
    	<meta name='viewport' content='width=device-width, initial-scale=1'>
    	<title>Accueil Fit4All</title>
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    	<link href="./css/style.css" rel="stylesheet">
    </head>
    <body>
    <?php
        session_start();
    ?>
        <nav class="navbar navbar-expand-lg bg-body-secondary">
          <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Fit4All</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Cours
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./fitness.php">Fitness</a></li>
                    <li><a class="dropdown-item" href="./muscu.php">Musculation</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="./aqua.php">Aquatique</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
              </ul>
              <button type="button" class="navbar-padding btn btn-secondary">Parametres</button>
              <button type="button" class="navbar-padding btn btn-danger" href=#>Se Deconnecter</button>
            </div>
          </div>
        </nav>
        <div class="modal fade" id="connexionModal" tabindex="-1" aria-labelledby="connexionLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="connexionLabel">Connexion</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
        		<form id="loginform" action="./php/login.php">
                  <div class="mb-3">
                    <label for="login" class="form-label">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="login">
                  </div>
                  <div class="mb-3">
                    <label for="pwd" class="form-label">Mot de Passe</label>
                    <input type="password" class="form-control" id="pwd">
                  </div>
                   <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Se Connecter</button>
              </div>
            	</form>
              </div>
            </div>
          </div>
        </div>
        
        <div class="modal fade" id="inscriptionModal" tabindex="-1" aria-labelledby="inscriptionLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="inscriptionlabel">Inscription</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
        		<form id="singupform" action="./php/signup.php">
                  <div class="mb-3">
                    <label for="login" class="form-label">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="login">
                  </div>
                  <div class="mb-3">
                    <label for="login" class="form-label">Adresser mail</label>
                    <input type="email" class="form-control" id="login">
                  </div>
                  <div class="mb-3">
                    <label for="pwd" class="form-label">Mot de Passe</label>
                    <input type="password" class="form-control" id="pwd">
                  </div>
                  <div class="mb-3">
                    <label for="pwd" class="form-label">Confirmer mot de passe</label>
                    <input type="password" class="form-control" id="confpwd">
                  </div>
                   <div class="modal-footer">
                <button type="submit" class="btn btn-primary">S'inscrire</button>
              </div>
            	</form>
              </div>
            </div>
          </div>
        </div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	</body>
</html>