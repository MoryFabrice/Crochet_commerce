<?php
include("./../models/Database.php");
require("./../models/categorie.php");
require("./../models/categorieDAO.php");
require("./../models/produit.php");
require("./../models/produitDAO.php");

$categorieDAO = new CategorieDAO;
$produitDAO = new ProduitDAO;

// REQUETE PERMETTANT D'AVOIR LES CATEGORIES SUR LA PAGE INDEX
$categories = $categorieDAO->selectAll();

$template1 = "views/header";
$template2 = "views/nav";
$template4 = "views/footer";
