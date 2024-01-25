<?php
    session_start();
    
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=projetsite','root','');
    }
    catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    
    $login = $_POST['username'];
    $pwd = $_POST['password'];
    
    $req = $bdd->prepare('SELECT * FROM creds WHERE login=:login AND pwd=:pwd;');
    $req->bindValue(':login', $login);
    $req->bindValue(':pwd', $pwd);
    
    $req->execute() or die(print_r($bdd->errorInfo()));
    
    if ($req->rowCount() > 0) {
        $_SESSION['login']=$login;
        $_SESSION['pwd']=$pwd;
        header('Location: ../index.php');
    }
    else {
        $_SESSION['wronglogin']=true;
        header('Location: ./loginwrong.php');
    }
?>