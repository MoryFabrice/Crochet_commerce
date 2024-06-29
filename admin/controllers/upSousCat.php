<?php
include('header.php');

$modifSousCatOk = false;

// Recuperation de l'id de la catégorie a updaté
$idSousCat = filter_input(INPUT_GET, "idSousCat");

// Recuperation de la catégorie a update grace a l'id
$sousCatUp = $sousCategorieDAO->selectOne($idSousCat);

// Recuperation du bouton btAjout cliqué
$btModif = filter_input(INPUT_POST, "btModif");

if (isset($btModif)) {
    $titre = filter_input(INPUT_POST, "titreSousCat");

    $upSousCategorie = new Souscategorie($idSousCat, $titre);
    $sousCategorieDAO->update($upSousCategorie);

    $modifSousCatOk = true;
}


$template3 = "views/upSousCategorie";
include("./views/index.phtml");
