<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projetsite', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT * FROM cour JOIN prof ON cour.profCour = prof.idProf WHERE prof.login = :prof');
$req->bindValue(':prof',$_SESSION['login']);
$req->execute();

$count = 0;

foreach ($req as $row) {
    $count += 1;
    echo '<option value=', $row["idCour"], '>', $row["nomCour"], '</option>';
}

echo '</select>
    <br><br>'
?>