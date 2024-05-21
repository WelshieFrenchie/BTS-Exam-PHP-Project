<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Accueil Compte Fit4All</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
    </svg>
  </head>
  <body>
  
  <?php
    require("./accountNavbar.php");
    require("../php/abontest.php");

    if (isset($_SESSION['info'])) {
      if ($_SESSION['info'] == 'inscriptionReussite') {
          echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
          <svg class="bi bi-info-circle-fill me-2" width="1em" height="1em" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
            Vous êtes bien inscrit!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
      if ($_SESSION['info'] == 'deinscriptionReussite') {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <svg class="bi bi-info-circle-fill me-2" width="1em" height="1em" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
          Vous êtes desinscrit au cour
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
      if ($_SESSION['info'] == 'inscriptionEchec') {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <svg class="bi bi-info-circle-fill me-2" width="1em" height="1em" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
          Vous avez pas le bon abonnement! Veuillez prendre un abonnement valable
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
      unset($_SESSION['info']);
    }
  ?>
  <div class="page-padding">
    <div class="row">
      <div class="card" style="width: 18rem;">
      <img src="..." class="card-img-top" alt="abonnement">
        <div class="card-body">
          <h5 class="card-title">Abonnement</h5>
          <?php
           if ($_SESSION["typoAbo"] !== null) {
              echo "<p class='card-text'>Vous êtes abonné au forfait: ", $_SESSION["typoAbo"], " jusqu'au ", $_SESSION["finAbo"], "</p>";
           }
           else {
              echo "<p class='card-text'>Vous n'avez pas d'abonnement</p>";
           }
          ?>
          <a href="./abonnement.php" class="btn btn-primary">Gérer mon abonnement</a>
        </div>
      </div>

      <div style="width: 2em;"></div>
      <div class="card" style="width: 36rem;">
      <img src="..." class="card-img-top" alt="Cours">
        <div class="card-body">
          <h5 class="card-title">Cours</h5>
          <a href="./cours.php" class="btn btn-primary">Consulter les prochains cours</a>
        </div>
      </div>
      
      <div style="width: 2em;"></div>
      <div class="card" style="width: 18rem;">
      <img src="..." class="card-img-top" alt="VosCours">
        <div class="card-body">
          <h5 class="card-title">Vos Cours</h5>
          <a href="./mesCours.php" class="btn btn-primary">Consulter les cours auquel vous êtes inscrit</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	</body>
</html>