<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projetsite', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT idSub, NomSub FROM abonnement');
$req->execute();

$count = 0;

foreach ($req as $row) {
    $count += 1;
    echo '<option value="', $row["idSub"], '">', $row["NomSub"], '</option>';
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
    
    $req = $bdd->prepare('SELECT * FROM abonnement');
    $req->execute();
    foreach ($req as $row) {
        echo 'if (selectedValue == "', $row['idSub'],'") {',
            'divElement.innerHTML = "<p class=\'h6\'>', $row['descSub'], '</p>" +',
            '"<p class=\'h6\'>Durée: ', $row['dureeSub'], ' jours</p>" +',
            '"<p class=\'h6\'>Prix: ', $row['prixSub'], '€</p>";',
        '}';
    }
    echo '};
    </script>';
?>