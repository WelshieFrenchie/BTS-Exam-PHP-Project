<?php 
    session_start();
    
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=projetsite','root','');
    }
    catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confpassword = $_POST['confpassword'];
    
    if ($password == $confpassword) {
        $req = $bdd->prepare("INSERT INTO users (login, mail, pwd) VALUES (:login, :email,:pwd)");
        $req->bindValue(':login',$login);
        $req->bindValue(':email',$email);
        $req->bindValue(':pwd',$password);
        
        $req->execute() or die(print_r($bdd->errorInfo()));
        
        $_SESSION['login']=$login;
        $_SESSION['pwd']=$pwd;
        
        header('Location: ../index.php');
    }
    else {
        $_SESSION['error']='difpwd';
        header('Location: ../index.php');
    }
?>