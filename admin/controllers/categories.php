<?php
include('header.php');

// Recuperation de la liste de tout les categories
$categories = $categorieDAO->selectAll();

$template3 = "views/categorie";
include("./views/index.phtml");
