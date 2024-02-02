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
  ?>
  <div class="page-padding">
    <div class="row">
      <div class="card" style="width: 18rem;">
      <img src="..." class="card-img-top" alt="abonnement">
        <div class="card-body">
          <h5 class="card-title">Abonnement</h5>
          <p class="card-text">Vous êtes abonné au forfait xxxx jusqu'au xx/xx/xxxx</p>
          <a href="./abonnement.php" class="btn btn-primary">Gérer mon abonnement</a>
        </div>
      </div>

      <div class="card" style="width: 36rem;">
      <img src="..." class="card-img-top" alt="abonnement">
        <div class="card-body">
          <h5 class="card-title">Abonnement</h5>
          <p class="card-text">Vous êtes abonné au forfait xxxx jusqu'au xx/xx/xxxx</p>
          <a href="./abonnement.php" class="btn btn-primary">Gérer mon abonnement</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	</body>
</html>