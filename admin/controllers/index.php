<?php
include('header.php');

$categories = $categorieDAO->selectAllTitre();

for ($i = 1; $i < count($categories) + 1; $i++) {
    $valeurs[] = count($produitDAO->selectAllByCat($i));
}

$template3 = "./views/dashboard";
include("./views/index.phtml");
