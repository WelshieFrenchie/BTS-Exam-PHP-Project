<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=projetsite', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('UPDATE users SET typeAbonnement = null WHERE login = :login');
$req->bindValue(':login', $_SESSION['login']);
$req->execute();
$res = $req->fetch(PDO::FETCH_ASSOC);

header('Location: ../index.php');