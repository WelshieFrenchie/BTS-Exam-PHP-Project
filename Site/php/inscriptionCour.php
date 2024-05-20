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

    $req = $bdd->prepare('SELECT typeAbonnement FROM users WHERE login = :login AND pwd = :pwd');
    $req->bindValue(':login', $login, PDO::PARAM_STR);
    $req->bindValue(':pwd', $pwd, PDO::PARAM_STR);
    $req->execute();

    if ($req->fetch(PDO::FETCH_ASSOC) == 2 || $req->fetch(PDO::FETCH_ASSOC) == 5) {

        $req = $bdd->prepare('SELECT id FROM users WHERE login = :login AND pwd = :pwd');
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':pwd', $pwd, PDO::PARAM_STR);
        $req->execute();

        $user = $req->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $userId = $user['id'];

            $req = $bdd->prepare('INSERT INTO estinscrit (User, Cour, DateHeure) VALUES (:user, :cour, :dateheure)');
            $req->bindValue(':user', $userId, PDO::PARAM_INT);
            $req->bindValue(':cour', $cour, PDO::PARAM_INT);
            $req->bindValue(':dateheure', $dateHeure, PDO::PARAM_STR);
            $req->execute();
            $_SESSION['info'] = 'inscriptionReussite';
            header('Location: ../index.php');
        }
    }

    else {
        $_SESSION['info'] = 'inscriptionEchec';
        header('Location: ../index.php');
    }
?>
