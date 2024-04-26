<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Accueil Compte Fit4All</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
  </head>
  <body>
  
  <?php
    require("./accountNavbar.php");
    require("../php/abontest.php");
  ?>
  <div class="page-padding">
    <div class="row">
      <div class="card" style="width: 18rem;">
      <img src="..." class="card-img-top" alt="ajoutCour">
        <div class="card-body">
          <h5 class="card-title">Vous voulez faire une séance?</h5>
          <p class='card-text'>C'est ici que sa se passe!</p>
          <a href="./ajoutCour.php" class="btn btn-primary">Ajouter un cour de sport</a>
        </div>
      </div>

      <div style="width: 2em;"></div>
      <div class="card" style="width: 36rem;">
      <img src="..." class="card-img-top" alt="Cours">
        <div class="card-body">
          <h5 class="card-title">Vos Cours</h5>
          <a href="./profcours.php" class="btn btn-primary">Consulter les prochains cours</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	</body>
</html>