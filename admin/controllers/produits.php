<?php
include('header.php');

$delOK = false;

// Recuperation de la liste de tout les produits
$produits = $produitDAO->selectAll();

// Nombre de porduit par page
$produitsParPage = 10;

// Nombre de produit au total
$totalProduits = count($produits);

// Calculer le nombre de page neccessaire
$totalPages = ceil($totalProduits / $produitsParPage);

// Obtenir la page actuelle à partir de l'URL, par défaut la page est 1
$pageCourante = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculer le décalage pour la requête SQL
$offset = ($pageCourante - 1) * $produitsParPage;

// Récupérer les produits pour la page actuelle
$produitsPourPageCourante = array_slice($produits, $offset, $produitsParPage);

// Recuperation du bouton btDelete cliqué
$btDelete = filter_input(INPUT_POST, 'btDelete');


if (isset($btDelete)) {
    // Recuperation de l'id du produit a supprimer
    $idProdDel = filter_input(INPUT_GET, 'idProd');

    // Requete pour supprimer le produit
    $produitDAO->delete($idProdDel);

    $delOK = true;
}


$template3 = "views/produit";
include("./views/index.phtml");
