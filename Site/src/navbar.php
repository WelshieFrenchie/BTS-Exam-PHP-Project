<!DOCTYPE html>
<html>
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
                                        <li><a class="dropdown-item disabled" aria-disabled="true" disabled>Aquatique</a></li>
                                    </ul>
                                </li>
                            <li class="nav-item">
                            	<a class="nav-link" href="./photos.php">Photos</a>
                            </li>
                            <li class="nav-item">
                            	<a class="nav-link" href="./contact.php">Contactez-nous</a>
                            </li>
                        </ul>
                    <button type="button" class="navbar-padding btn btn-primary" data-bs-toggle="modal" data-bs-target="#connexionModal">Connexion</button>
                    <button type="button" class="navbar-padding btn btn-primary" data-bs-toggle="modal" data-bs-target="#inscriptionModal">Inscription</button>
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
                                <input type="text" class="form-control" id="login" name="login" placeholder="Entrez votre nom d'utilisateur">
                            </div>
                            <div class="mb-3">
                                <label for="pwd" class="form-label">Mot de Passe</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de Passe">
                            </div>
                            <div class="modal-footer">
                            	<button type="submit" class="btn btn-primary">Se Connecter</button>
                            </div>
                        </form>
                        <div class="modal-footer">
                    		<a class="btn btn-primary" href="./connectionProf.php">Espace Professeur</a>
                    	</div>
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
                        <form id="signupform" action="../php/signup.php" method="post">
                            <div class="mb-3">
                                <label for="login" class="form-label">Nom d'utilisateur</label>
                                <input type="text" class="form-control" id="login" name="login" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Adresser mail</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de Passe</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Confirmer mot de passe</label>
                                <input type="password" class="form-control" id="confpassword" name="confpassword" required>
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