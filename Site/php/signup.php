<?php 
    session_start();
    
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=Projetsite','root','');
    }
    catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    
    $login = $_POST['username'];
    $pwd = $_POST['password'];
    $confpwd = $_POST['confpassword'];
    
    if ($pwd == $confpwd) {
        $req = $bdd->prepare("INSERT INTO creds (login, pwd) VALUES (:login, :pwd)");
        $req->bindValue(':login',$login);
        $req->bindValue(':pwd',$pwd);
        
        $req->execute() or die(print_r($bdd->errorInfo()));
        
        $_SESSION['login']=$login;
        $_SESSION['pwd']=$pwd;
        
        header('Location: ../index.php');
    }
    else {
        header('Location: ./signupwrong.php');
    }
?>