<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projetsite', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT a.nomSub, u.finAbonnement FROM abonnement a, users u WHERE login = :login AND u.typeAbonnement = a.idSub');
$req->bindValue(':login', $_SESSION['login']);
$req->execute();
$res = $req->fetch(PDO::FETCH_ASSOC);

if ($res !== false) {
    $date = new DateTimeImmutable($res['finAbonnement']);
    $finAbo = $date->format('d/m/Y');
    $_SESSION['finAbo'] = $finAbo;
    $_SESSION['typoAbo'] = $res['nomSub'];
} else {
    $_SESSION['finAbo'] = null;
    $_SESSION['typoAbo'] = null;
}
?>