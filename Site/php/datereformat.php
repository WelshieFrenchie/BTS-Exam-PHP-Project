<?php
function getJourSemaine($date) {
    $nbJour = $date->format('w');

    $semaineEcrit = [
        'Dimanche',
        'Lundi',
        'Mardi',
        'Mercredi',
        'Jeudi',
        'Vendredi',
        'Samedi'
    ];

    return $semaineEcrit[$nbJour];
}

function getMois($date) {
    $nbMois = $date->format('n');

    $moisEcrit = [
        'Janvier',
        'Février',
        'Mars',
        'Avril',
        'Mai',
        'Juin',
        'Juillet',
        'Août',
        'Septembre',
        'Octobre',
        'Novembre',
        'Décembre'
    ];

    return $moisEcrit[$nbMois - 1];
}