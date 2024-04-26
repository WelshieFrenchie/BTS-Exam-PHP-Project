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
      <p class="h3">Ajouter une Séance:</p>
    </div>
    <br>
    <div class="row" >
      <?php
        if (isset($_SESSION['error'])) {
          if ($_SESSION['error'] == 'value0') {
            echo '<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
            <div>
            Veuillez entrer un option:
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
          unset($_SESSION['error']);
        }
      ?>
    </div>
    <div class="row">
    <form id="abonFormAdd" action="../php/addCour.php" method="post">
      <div class="form-row align-items-center">
        <div class="col-auto my-1">
          <label class="mr-sm-2" for="abonform">Cours:</label>
          <select name="formOption" class="custom-select mr-sm-2" id="abonForm" required>
            <option value="0" selected disabled>Choisissez une option:</option>
            <?php
              require("../php/checkCourProf.php");
            ?>
        </div>
        <label for="courtime">Horaire:</label>  
        <input type="datetime-local" id="courtime" name="courtime">
        </br>
        </br>
        <div class="col-auto my-1">
          <button type="submit" class="btn btn-primary">Valider</button>
        </div>
      </div>
    </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	</body>
</html>