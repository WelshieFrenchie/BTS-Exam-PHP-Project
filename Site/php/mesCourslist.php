<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=projetsite', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $req = $bdd->prepare('SELECT p.cour, p.dateHeure, p.nbPlacesLibre, c.nomCour, c.dureeCour, prof.nomProf, prof.prenomProf, e.user
                            FROM planning p
                            JOIN cour c ON p.Cour = c.idCour
                            JOIN prof ON c.profCour = prof.idProf
                            JOIN estInscrit e ON e.Cour = p.Cour AND e.dateHeure = p.dateHeure
                            WHERE c.profCour = prof.idProf AND p.Cour = c.idCour AND p.dateheure >= NOW() AND
                            p.cour = (SELECT cour FROM estInscrit e JOIN users u ON e.User = u.id WHERE u.login = :login) AND
                            p.dateHeure = (SELECT dateHeure FROM estInscrit e JOIN users u ON e.User = u.id WHERE u.login = :login)
                            ORDER BY p.dateHeure');
    $req->bindValue('login', $_SESSION['login'], PDO::PARAM_STR);
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
                <form id='deinscriptionCour' action='../php/deinscriptionCour.php' method='post'>
                    <input type='hidden' id='cour' name='cour' value='".$row['cour']."'>
                    <input type='hidden' id='dateHeure' name='dateHeure' value='".$row['dateHeure']."'>
                    <button type='submit' class='btn btn-primary'>Se désinscrire</button>
                </form>
            </div>
        </div>
        <br>";
    }
?>