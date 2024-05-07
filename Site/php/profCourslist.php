<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projetsite', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT p.cour, p.dateHeure, p.nbPlacesLibre, c.nomCour, c.dureeCour, prof.nomProf, prof.prenomProf FROM planning p, cour c, prof WHERE p.dateheure >= NOW() AND prof.login = :login ORDER BY P.dateHeure');
$req->bindValue(':login',$_SESSION['login']);
$req->execute();

require('../php/datereformat.php');

$count = 0;
foreach ($req as $row) {
    $count += 1;
    $time = $row['dateHeure'];
    $date = date_create($row['dateHeure']);
    $semaine = getJourSemaine($date);
    $jour = date_format($date, 'd');
    $mois = getMois($date);
    $heure = date_format($date, 'H:i:s');

    echo "<div class='card'>
        <div class='card-body'>
            <h5 class='card-title'>".$row['nomCour']."</h5>
            <p class='card-text'>".$semaine." ".$jour." ".$mois." - ".$heure."</p>
            <p class='card-text'>Places de libre: ".$row['nbPlacesLibre']."</p>
            <a class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#participantModal".$count."'>
                Voir la liste de participants
            </a>
        </div>
    </div>
    <br>
    <div class='modal fade' id='participantModal".$count."' tabindex='-1' aria-labelledby='participantModalLabel".$count."' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
    <div class='modal-content'>
        <div class='modal-header'>
        <h5 class='modal-title' id='participantModalLabel".$count."'>Liste de participants</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
    ";

    $req = $bdd->prepare('SELECT login FROM users u JOIN estinscrit e ON e.User = u.id JOIN planning p ON p.DateHeure = e.DateHeure WHERE e.DateHeure = :date');
    $req->bindValue(':date',$time);
    $req->execute();

    foreach ($req as $row) {
        echo "<h6>".$row['login']."</h6>";
    }
    echo '</div>
    </div>
    </div>
    </div>';
}
?>