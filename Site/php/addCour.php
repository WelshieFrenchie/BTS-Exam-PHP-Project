<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=projetsite', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$seance = $_POST['seance'];
$horaire = $_POST['courtime'];
$nbplaces = $_POST['nbplaces'];

$req = $bdd->prepare('INSERT INTO planning VALUES (:seance, :horaire, :nbplaces, :nbplaces)');
$req->bindValue(':seance', $seance);
$req->bindValue(':horaire', $horaire);
$req->bindValue(':nbplaces', $nbplaces);
$req->execute();

header('Location: ../index.php');