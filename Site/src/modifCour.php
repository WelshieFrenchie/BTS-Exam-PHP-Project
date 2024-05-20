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
      <p class="h3">Modifier Séance:</p>
    </div>
    <br>
    <div class="row" >
    </div>
    <class="row">
    <form id="abonFormChange" action="../php/changeCour.php" method="post">
      <div class="form-row align-items-center">
        <?php
          echo"<input type='hidden' id='seance' name='seance' value='".$_POST['cour']."'>
          <input type='hidden' id='oldCourtime' name='oldCourtime' value='".$_POST['dateHeure']."'>";
        ?>
        <label for="courtime">Horaire:</label>  
        <input type="datetime-local" id="courtime" name="courtime" required>
        </br>
        </br>
        <div class="col-auto my-1">
          <button type="submit" class="btn btn-primary">Valider</button>
        </div>
      </div>
    </form>
    <form id="abonFormDelete" action="../php/deleteCour.php" method="post">
      <div class="form-row align-items-center">
        <?php
          echo"<input type='hidden' id='seance' name='seance' value='".$_POST['cour']."'>
          <input type='hidden' id='courtime' name='courtime' value='".$_POST['dateHeure']."'>";
        ?> 
        <div class="col-auto my-1">
          <button type="submit" class="btn btn-danger">Supprimer la séance</button>
        </div>
      </div>
    </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	</body>
</html>