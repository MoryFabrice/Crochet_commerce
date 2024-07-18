<?php
include('header.php');

// Recuperation de l'id du produit selectionné
$idProduit = filter_input(INPUT_GET, "idProd");

// Recuperation du produit grace a son id
$produit = $produitDAO->selectOne($idProduit);

// Recuperation de la categorie du produit
$catProd = $categorieDAO->selectOne($produit['id_categorie']);

// Recuperation des images additionelle du produit
$imageProd = $imageDAO->selectOne($idProduit);


$template2 = "views/produitOne";
include('./views/index.phtml');
