<?php
include('header.php');

// Recuperation de l'id de la categorie selectionné dans l'header
$idCategorie = filter_input(INPUT_GET, "idCategorie");

// Récuperation de la categorie grace a l'id
$categorieP = $categorieDAO->selectOne($idCategorie);

// Nombre de porduit par page
$produitsParPage = 3;

// Récuperation des produits grâce a l'id de la categorie
$produitsByCat = $produitDAO->selectAllByCat($idCategorie);

// Nombre de produit au total
$totalProduits = count($produitsByCat);

// Calculer le nombre de page neccessaire
$totalPages = ceil($totalProduits / $produitsParPage);

// Obtenir la page actuelle à partir de l'URL, par défaut la page est 1
$pageCourante = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculer le décalage pour la requête SQL
$offset = ($pageCourante - 1) * $produitsParPage;

// Récupérer les produits pour la page actuelle
$produitsPourPageCourante = array_slice($produitsByCat, $offset, $produitsParPage);

// var_dump ($produitsByCat);




$template2 = "views/produit";
include("./views/index.phtml");
