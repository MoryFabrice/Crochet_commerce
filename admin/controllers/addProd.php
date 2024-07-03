<?php
include('header.php');

$ajoutOk = false;

// Recuperation du bouton btAjout cliqué
$btAjout = filter_input(INPUT_POST, "btAjout");

if (isset($btAjout)) {
    $nom = filter_input(INPUT_POST, "nomProd");
    $couleur = filter_input(INPUT_POST, "couleurProd");
    $nbPelote = filter_input(INPUT_POST, "nbPeloteProd");
    $prix = filter_input(INPUT_POST, "prixProd");
    $description = filter_input(INPUT_POST, "descriptionProd");
    $imagePrinc = filter_input(INPUT_POST, "imagePrincProd");
    $favoris = filter_input(INPUT_POST, "favProd");
    $categorie = filter_input(INPUT_POST, "selectCat");
    $sousCategorie = filter_input(INPUT_POST, "selectSousCat");

    // Permet de mettre favoris dans la BDD
    // Si newProd fav alors on enleve l'ancien favoris
    if ($favoris == "on") {
        $favoris = 1;
        $lastFav = $produitDAO->selectFav();
        $lastFavUp = new Produit($lastFav['id'], $lastFav['nom'], $lastFav['couleur'], $lastFav['nbPelote'], $lastFav['prix'], $lastFav['description'], $lastFav['imagePrinc'], 0, $lastFav['id_categorie'], $lastFav['id_sousCategorie']);
        $produitDAO->update($lastFavUp);
    } else {
        $favoris = 0;
    }

    $newProduit = new Produit(0, $nom, $couleur, $nbPelote, $prix, $description, $imagePrinc, $favoris, $categorie, $sousCategorie);
    $produitDAO->insert($newProduit);

    $ajoutOk = true;
}


$template3 = "views/addProduit";
include("./views/index.phtml");
