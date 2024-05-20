<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=projetsite', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$seance = $_POST['seance'];
$oldhoraire = $_POST['oldCourtime'];
$horaire = $_POST['courtime'];

$req = $bdd->prepare('UPDATE planning SET DateHeure = :horaire WHERE Cour = :seance AND DateHeure = :oldhoraire');
$req->bindValue(':seance', $seance);
$req->bindValue('oldhoraire', $oldhoraire);
$req->bindValue(':horaire', $horaire);
$req->execute();

header('Location: ../index.php');