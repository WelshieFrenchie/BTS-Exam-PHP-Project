<!DOCTYPE html>
<html>
	<link href="../css/menustyle.css" rel="stylesheet">
    <body>
        <?php
            require("./navbar.php");
            
            if (isset($_SESSION['error']) == 'difpwd') {
                echo '<div class="modal bg-danger" tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Vos mots de passes ne sont pas identiques. Veuillez ré-essayer</p>
                          </div>
                        </div>
                      </div>
                    </div>';
            }
        ?>
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../img/gym.jpg" class="d-block w-100" alt="...">
                    
                    <div class="container">
                        <div class="carousel-caption text-start">
                        <h1>Cours sportives pour tout les niveaux</h1>
                        <p>Consultez notre liste de cours disponibles dans nos salles de sports</p>
                        <p><a class="btn btn-lg btn-primary" href="./fitness.php">Savoir plus</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                	<img src="../img/muscu.jpg" class="d-block w-100" alt="...">
                		<div class="container">
                        <div class="carousel-caption">
                            <h1>Materiel sportif a libre service</h1>
                            <p>Salles et materiel pour débutants et professionels</p>
                            <p><a class="btn btn-lg btn-primary" href="./muscu.php">Voir les photos</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                   <img src="../img/aquaAerobics.jpg" class="d-block w-100" alt="...">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>Piscine pour cours et loisirs</h1>
                            <p>Piscine chauffé pour profiter des cours aquatiques en tout tranquilité</p>
                            <p><a class="btn btn-lg btn-primary" href="./aqua.php">Consulter</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
            	<span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        
        <div class="container marketing">
            <div class="row">
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                    
                    <h2>Heading</h2>
                    <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                    <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                    
                    <h2>Heading</h2>
                    <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
                    <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                </div>
                    <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                    
                    <h2>Heading</h2>
                    <p>And lastly this, the third column of representative placeholder content.</p>
                    <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                </div>
            </div>
        </div>
</html>