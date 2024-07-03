<?php
include("./models/Database.php");
require("./models/categorie.php");
require("./models/categorieDAO.php");
require("./models/sousCategorie.php");
require("./models/sousCategorieDAO.php");
require("./models/cat_sousCat.php");
require("./models/cat_sousCatDAO.php");
require("./models/produit.php");
require("./models/produitDAO.php");

$categorieDAO = new CategorieDAO;
$sousCategorieDAO = new SouscategorieDAO;
$cat_sousCatDAO = new Cat_sousCatDAO;
$produitDAO = new ProduitDAO;

// REQUETE PERMETTANT D'AVOIR LES CATEGORIES SUR LA PAGE INDEX
$categories = $categorieDAO->selectAll();

// Requete permettant d'avoir les sous-categories sur la page index
$sousCategories = $sousCategorieDAO->selectAll();

// Requete permettant d'avoir access a la table liant les 2
$cat_sousCat = $cat_sousCatDAO->selectAll();

// var_dump($cat_sousCat);

$template1 = "views/header";
$template4 = "views/footer";
