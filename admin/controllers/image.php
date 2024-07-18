<?php
include('header.php');

$delImageOK = false;

// Recuperation de la liste de tout les categories
$images = $imageDAO->selectAll();

// Recuperation du bouton btDelete est cliqué
$btDelete = filter_input(INPUT_POST, 'btDelete');


if (isset($btDelete)) {
    // Recuperation de l'id de la categorie a supprimer
    $idImageDel = filter_input(INPUT_GET, 'idImage');

    // Requete pour supprimer la categorie
    $imageDAO->delete($idImageDel);

    $delImageOK = true;
}

$template3 = "views/image";
include("./views/index.phtml");
