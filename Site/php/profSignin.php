<?php
    session_start();
    
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=projetsite','root','');
    }
    catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    
    $login = $_POST['proflogin'];
    $password = $_POST['profpwd'];
    
    $req = $bdd->prepare('SELECT * FROM prof WHERE login=:login AND pwd=:pwd;');
    $req->bindValue(':login', $login);
    $req->bindValue(':pwd', $password);
    
    $req->execute() or die(print_r($bdd->errorInfo()));
    
    if ($req->rowCount() > 0) {
        $_SESSION['login']=$login;
        $_SESSION['pwd']=$password;
        $_SESSION['isprof']=true;
        header('Location: ../index.php');
    }
    else {
        $_SESSION['error']='wronglogin';
        header('Location: ../src/connectionProf.php');
    }
?>