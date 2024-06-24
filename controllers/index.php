<?php
include('header.php');

$produitFav = $produitDAO->selectFav();

$categorieFav = $categorieDAO->selectOne($produitFav['id_categorie']);

$template2 = "views/features";
$template3 = "views/aPropos";

include("./views/index.phtml");
