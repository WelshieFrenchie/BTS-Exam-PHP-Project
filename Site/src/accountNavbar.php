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
      <button type="button" class="navbar-padding btn btn-danger" data-bs-toggle="modal" data-bs-target="#deconnectionModal">Déconnection</button>
    </div>
  </div>
</nav>

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
      <button class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Non</button>
      <form id="signoutForm" action="../php/signout.php" method="post">
        <button type="submit" class="btn btn-danger" href="../php/signout.php">Oui</button>  
      </form>
    </div>
    </div>
  </div>
</div>