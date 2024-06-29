<?php
include('header.php');

$delSousCatOK = false;

// Recuperation de la liste de tout les categories
$sousCategories = $sousCategorieDAO->selectAll();

// Recuperation du bouton btDelete est cliqué
$btDelete = filter_input(INPUT_POST, 'btDelete');


if (isset($btDelete)) {
    // Recuperation de l'id de la categorie a supprimer
    $idSousCatDel = filter_input(INPUT_GET, 'idSousCat');

    // Requete pour supprimer la categorie
    $sousCategorieDAO->delete($idSousCatDel);

    $delSousCatOK = true;
}

$template3 = "views/sousCategories";
include("./views/index.phtml");
