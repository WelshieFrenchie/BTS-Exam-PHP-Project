<?php

    $login = $_SESSION['login'];
    $pwd = $_SESSION['pwd'];

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=projetsite', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $req = $bdd->prepare('SELECT p.cour, p.dateHeure, p.nbPlacesLibre, c.nomCour, c.dureeCour, prof.nomProf, prof.prenomProf
                        FROM planning p, cour c, prof
                        WHERE c.profCour = prof.idProf AND p.Cour = c.idCour AND p.dateheure >= NOW()
                        ORDER BY P.dateHeure');
    $req->execute();

    require('../php/datereformat.php');

    foreach ($req as $row) {
        $date = date_create($row['dateHeure']);
        $semaine = getJourSemaine($date);
        $jour = date_format($date, 'd');
        $mois = getMois($date);
        $heure = date_format($date, 'H:i:s');

        echo "<div class='card'>
            <div class='card-body'>
                <h5 class='card-title'>".$row['nomCour']."</h5>
                <p class='card-text'>".$semaine." ".$jour." ".$mois." - ".$heure."</p>
                <p class='card-text'>Professeur: ".$row['nomProf']." ".$row['prenomProf']."</p>
                <p class='card-text'>Places de libre: ".$row['nbPlacesLibre']."</p>
                <form id='inscriptionCour' action='../php/inscriptionCour.php' method='post'>
                    <input type='hidden' id='cour' name='cour' value='".$row['cour']."'>
                    <input type='hidden' id='dateHeure' name='dateHeure' value='".$row['dateHeure']."'>";

                    $req = $bdd->prepare('SELECT * FROM estInscrit
                                        WHERE User = (SELECT id FROM users WHERE login = :login AND pwd = :pwd) AND Cour = :cour AND dateHeure = :dateHeure');
                    $req->bindValue(':login', $login, PDO::PARAM_STR);
                    $req->bindValue(':pwd', $pwd, PDO::PARAM_STR);
                    $req->bindValue(':cour', $row['cour'], PDO::PARAM_INT);
                    $req->bindValue(':dateHeure', $row['dateHeure'], PDO::PARAM_STR);
                    $req->execute();

                    if ($req->rowCount() > 0) {
                        echo"<button type='submit' class='btn btn-secondary' disabled>Déja inscrit</button>";
                    } 
                    else {
                        echo"<button type='submit' class='btn btn-primary'>S'inscrire</button>";
                    }
                echo "</form>
            </div>
        </div>
        <br>";
    }
?>