<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=projetsite', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$seance = $_POST['seance'];
$horaire = $_POST['courtime'];

$req = $bdd->prepare('DELETE FROM planning WHERE Cour = :seance AND DateHeure = :horaire');
$req->bindValue(':seance', $seance);
$req->bindValue(':horaire', $horaire);
$req->execute();

header('Location: ../index.php');