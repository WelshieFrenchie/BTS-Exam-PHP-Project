<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=projetsite', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$value = $_POST['formOption'];

$req = $bdd->prepare('SELECT typeAbonnement, finAbonnement FROM users');
$req->execute();
$res = $req->fetch(PDO::FETCH_ASSOC);

echo $value;

if ($value == 0 ) {
    $_SESSION['error'] = 'value0';
    header('Location: ../src/abonnement.php');
}
else {
    $req = $bdd->prepare("UPDATE users SET typeAbonnement = :value WHERE login = :login");
    $req->bindValue(':value', $value);
    $req->bindValue(':login', $_SESSION['login']);
    $req->execute();
    header('Location: ../index.php');
}