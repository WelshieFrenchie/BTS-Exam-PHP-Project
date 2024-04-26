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
    <br><br>
    <div id="abonOutput"></div>
    <script type="text/javascript">
    
        var selectElement = document.getElementById("abonForm");
        var divElement = document.getElementById("abonOutput");
    
        selectElement.onchange = function () {
        var selectedValue = selectElement.options[selectElement.selectedIndex].value;
    ';
    
    $req = $bdd->prepare('SELECT * FROM Cour');
    $req->execute();
    foreach ($req as $row) {
        echo 'if (selectedValue == "', $row['idCour'],'") {',
            '"<p class=\'h6\'>Durée: ', $row['dureeCour'], ' jours</p>" +',
        '}';
    }
    echo '};
    </script>';
?>