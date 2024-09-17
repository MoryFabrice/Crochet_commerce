<?php
header("Content-Type: text/html; charset=UTF-8");

header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Origin: *");

//connexion a la BD
require_once '../models/Database.php';
$pdo = new Database;
$pdo = $pdo->connect();

require_once "../models/utilisateurDAO.php";
$utilisateurDAO = new UtilisateurDAO;

include("../models/utilisateur.php");

$inscription_ok = "0";

$entrer = filter_input(INPUT_POST, "entrer");

try {
    // Recupération des inputs
    $nom = filter_input(INPUT_POST, "nom");
    $prenom = filter_input(INPUT_POST, "prenom");
    $adresse = filter_input(INPUT_POST, "adresse");
    $cp = filter_input(INPUT_POST, "cp");
    $email = filter_input(INPUT_POST, "email");
    $mdp = filter_input(INPUT_POST, "mdp");

    // Cryptage du MDP
    $mdp_hashed = password_hash($mdp, PASSWORD_DEFAULT);

    // Instanciation d'un nouveau client
    $utilisateur = new Utilisateur(0, $nom, $prenom, $adresse, $cp, $email, $mdp_hashed, "harley.png", 2);

    // REQUETE PERMETTANT D'INSCRIRE UN UTILISATEUR
    $inscription_ok = $utilisateurDAO->insert($utilisateur);

    // if ($count == 1) {

    //     $inscription_ok = $count;
    // } else {
    //     $inscription_ok = $count;
    // }
} catch (PDOException $e) {
    $inscription_ok = $e->getMessage();
}

echo $inscription_ok;
