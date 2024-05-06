<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projetsite', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT p.cour, p.dateHeure, p.nbPlacesLibre, c.nomCour, c.dureeCour, prof.nomProf, prof.prenomProf FROM planning p, cour c, prof WHERE p.dateheure >= NOW() ORDER BY P.dateHeure');
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
            <a href='' class='btn btn-primary'>S'inscrire</a>
        </div>
    </div>
    <br>";
}
?>
