<?php
    session_start();
    
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=projetsite','root','');
    }
    catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    $req = $bdd->prepare('SELECT * FROM users WHERE login=:login AND pwd=:pwd;');
    $req->bindValue(':login', $login);
    $req->bindValue(':pwd', $password);
    
    $req->execute() or die(print_r($bdd->errorInfo()));
    
    if ($req->rowCount() > 0) {
        $_SESSION['login']=$login;
        $_SESSION['pwd']=$password;
        header('Location: ../index.php');
    }
    else {
        $_SESSION['error']='wronglogin';
        header('Location: ../index.php');
    }
?>