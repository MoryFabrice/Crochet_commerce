<?php
include('header.php');

$ajoutImageOk = false;

$produits = $produitDAO->selectAll();

// Recuperation du bouton btAjout cliqué
$btAjout = filter_input(INPUT_POST, "btAjout");

if (isset($btAjout)) {
    $url = filter_input(INPUT_POST, "url");
    $idProduit = filter_input(INPUT_POST, "idProduit");

    $newImage = new Image(0, $url, $idPtoduit);
    $imageDAO->insert($newImage);

    $ajoutImageOk = true;
}


$template3 = "views/addImage";
include("./views/index.phtml");
