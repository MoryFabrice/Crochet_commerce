<?php
include('header.php');

$modifCatOk = false;

// Recuperation de l'id de la catégorie a updaté
$idCat = filter_input(INPUT_GET, "idCat");

// Recuperation de la catégorie a update grace a l'id
$catUp = $categorieDAO->selectOne($idCat);

// Recuperation du bouton btAjout cliqué
$btModif = filter_input(INPUT_POST, "btModif");

if (isset($btModif)) {
    $titre = filter_input(INPUT_POST, "titreCat");

    $upCategorie = new Categorie($idCat, $titre);
    $categorieDAO->update($upCategorie);

    $modifCatOk = true;
}


$template3 = "views/upCategorie";
include("./views/index.phtml");
