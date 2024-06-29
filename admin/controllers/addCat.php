<?php
include('header.php');

$ajoutCatOk = false;

// Recuperation du bouton btAjout cliqué
$btAjout = filter_input(INPUT_POST, "btAjout");

if (isset($btAjout)) {
    $titre = filter_input(INPUT_POST, "titreProd");

    $newCategorie = new Categorie(0, $titre);
    $categorieDAO->insert($newCategorie);

    $ajoutCatOk = true;
}


$template3 = "views/addCategorie";
include("./views/index.phtml");
