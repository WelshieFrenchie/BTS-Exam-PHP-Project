<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projetsite', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$req = $bdd->prepare('SELECT typeAbonnement FROM users WHERE login = :login');
$req->bindValue(':login',$_SESSION['login']);
$req->execute();
$res = $req->fetch(PDO::FETCH_ASSOC);
if (!empty($res['typeAbonnement'])) {
    echo '<div class="row">
        <form id="abonFormAdd" action="../php/abonformremove.php" method="post">
        <button type="submit" class="btn btn-danger">Annuler son abonnement</button>
        </form>
    </div>';
}
?>