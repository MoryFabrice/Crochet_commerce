<?php
include('header.php');

// recuperation du bouton entrer cliqué
$entrer = filter_input(INPUT_POST, "entrer");

// si bouton cliqué alors on ajoute un client
if (isset($entrer)) {
    // on recupere toutes les variables a inserer dans la BDD
    $nom = filter_input(INPUT_POST, 'nom');
    $prenom = filter_input(INPUT_POST, 'prenom');
    $adresse = filter_input(INPUT_POST, 'adresse');
    $cp = filter_input(INPUT_POST, 'cp');
    $email = filter_input(INPUT_POST, 'email');
    $mdp = filter_input(INPUT_POST, 'mdp');
    $mdp2 = filter_input(INPUT_POST, 'mdp2');

    // hachage du motDePasse


    // insertion dans la BDD


    // Validation 
}


$template2 = "views/register";
include('./views/index.phtml');
