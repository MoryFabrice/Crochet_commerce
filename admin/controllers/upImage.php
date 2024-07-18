<?php
include('header.php');

$modifImageOk = false;

// Recuperation de l'id de la catégorie a updaté
$idImage = filter_input(INPUT_GET, "idImage");

// Recuperation de tout les produits pour l'affichage du select
$produits = $produitDAO->selectAll();

// Recuperation de la catégorie a update grace a l'id
$imageUp = $imageDAO->selectOne($idImage);

// Recuperation du bouton btAjout cliqué
$btModif = filter_input(INPUT_POST, "btModif");

if (isset($btModif)) {
    $url = filter_input(INPUT_POST, "url");
    $idProduit = filter_input(INPUT_POST, "idProduit");

    $upImage = new Image($idImage, $url, $idProduit);
    $imageDAO->update($upImage);

    $modifImageOk = true;
}


$template3 = "views/upImage";
include("./views/index.phtml");
