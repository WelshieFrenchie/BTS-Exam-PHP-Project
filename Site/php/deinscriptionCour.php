<?php
session_start();
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projetsite', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$login = $_SESSION['login'];
$pwd = $_SESSION['pwd'];
$cour = $_POST['cour'];
$dateHeure = $_POST['dateHeure'];

$req = $bdd->prepare('DELETE FROM estInscrit WHERE User = (SELECT id FROM users WHERE login = :login AND pwd = :pwd) AND Cour = :cour AND dateHeure = :dateHeure');
$req->bindValue(':login', $login, PDO::PARAM_STR);
$req->bindValue(':pwd', $pwd, PDO::PARAM_STR);
$req->bindValue(':cour', $cour, PDO::PARAM_INT);
$req->bindValue(':dateHeure', $dateHeure, PDO::PARAM_STR);
$req->execute();
$_SESSION['info'] = 'deinscriptionReussite';
header('Location: ../index.php');