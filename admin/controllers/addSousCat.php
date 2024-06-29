<?php
include('header.php');

$ajoutSousCatOk = false;

// Recuperation du bouton btAjout cliqué
$btAjout = filter_input(INPUT_POST, "btAjout");

if (isset($btAjout)) {
    $titre = filter_input(INPUT_POST, "titreSousCat");

    $newSousCategorie = new Souscategorie(0, $titre);
    $sousCategorieDAO->insert($newSousCategorie);

    $ajoutSousCatOk = true;
}


$template3 = "views/addSousCategorie";
include("./views/index.phtml");
