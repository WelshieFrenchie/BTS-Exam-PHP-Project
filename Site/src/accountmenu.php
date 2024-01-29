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
              </ul>
              <button type="button" class="navbar-padding btn btn-primary" data-bs-toggle="modal" data-bs-target="#connexionModal">Connexion</button>
              <button type="button" class="navbar-padding btn btn-danger" data-bs-toggle="modal" data-bs-target="#deconnectionModal">Déconnection</button>
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
        		<form id="loginform" action="../php/login.php" method="post">
                  <div class="mb-3">
                    <label for="login" class="form-label">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="login" name="login">
                  </div>
                  <div class="mb-3">
                    <label for="pwd" class="form-label">Mot de Passe</label>
                    <input type="password" class="form-control" id="password" name="password>
                  </div>
                   <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Se Connecter</button>
              </div>
            	</form>
              </div>
            </div>
          </div>
        </div>
        
        <div class="modal fade" id="deconnectionModal" tabindex="-1" aria-labelledby="deconnectionLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="deconnectionlabel">Vous êtes sur de vouloir vous déconnecter?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Vous pourriez toujours vous reconnecter depuis le site web Fit4All</p>
              </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Non</button>
                <button type="submit" class="btn btn-danger" href="../php/signout.php">Oui</button>  
                </div>
              </div>
            </div>
          </div>
        </div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	</body>
</html>