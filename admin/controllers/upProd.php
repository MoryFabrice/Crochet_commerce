<?php
include('header.php');

$modifOk = false;

// Recuperation de l'id du produit a updaté
$idProd = filter_input(INPUT_GET, "idProd");

// Recuperation du produit a update grace a l'id
$prodUp = $produitDAO->selectOne($idProd);

// Recuperation du bouton btUpdate cliqué
$btUpdate = filter_input(INPUT_POST, "btUpdate");

if (isset($btUpdate)) {
    // Recuperation de toutes les variables neccessaires pour la modif du produit
    $id = filter_input(INPUT_GET, "idProd");
    $nom = filter_input(INPUT_POST, "nomProd");
    $couleur = filter_input(INPUT_POST, "couleurProd");
    $nbPelote = filter_input(INPUT_POST, "nbPeloteProd");
    $prix = filter_input(INPUT_POST, "prixProd");
    $description = filter_input(INPUT_POST, "descriptionProd");
    $imagePrinc = filter_input(INPUT_POST, "imagePrincProd");
    $favoris = filter_input(INPUT_POST, "favProd");
    $categorie = filter_input(INPUT_POST, "selectCat");

    // Permet de mettre favoris dans la BDD
    // Si newProd fav alors on enleve l'ancien favoris
    if ($favoris == "on") {
        $favoris = 1;
        $lastFav = $produitDAO->selectFav();
        $lastFavUp = new Produit($lastFav['id'], $lastFav['nom'], $lastFav['couleur'], $lastFav['nbPelote'], $lastFav['prix'], $lastFav['description'], $lastFav['imagePrinc'], 0, $lastFav['id_categorie']);
        $produitDAO->update($lastFavUp);
    } else {
        $favoris = 0;
    }

    // Creation d'un produit pour la modif
    $upProduit = new Produit($id, $nom, $couleur, $nbPelote, $prix, $description, $imagePrinc, $favoris, $categorie);
    // Requete permettant la modif
    $produitDAO->update($upProduit);

    $modifOk = true;
}


$template3 = "views/upProduit";
include("./views/index.phtml");
