<?php
header("Content-Type: text/html; charset=UTF-8");

header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Origin: *");


//connexion a la BD
require_once '../DAO/Database.php';
$pdo = new Database;
$pdo = $pdo->connect();

require_once("../DAO/DAOClient.php");
$clientDao = new ClientDAO;

require_once("../DAO/DAOVille.php");
$villeDao = new VilleDAO;

$inscription_ok = "0";

$valider = filter_input(INPUT_POST, "valider");
// var_dump($valider);

try {
    // Recupération des inputs
    $mdp = filter_input(INPUT_POST, "mdp");
    $cp = filter_input(INPUT_POST, "cp");
    $nom = filter_input(INPUT_POST, "nom");
    $prenom = filter_input(INPUT_POST, "prenom");
    $telephone = filter_input(INPUT_POST, "telephone");
    $email = filter_input(INPUT_POST, "email");
    $adresse = filter_input(INPUT_POST, "adresse");

    // Cryptage du MDP
    $mdp_hashed = password_hash($mdp, PASSWORD_DEFAULT);

    // Récupération de l'idVille
    $ville = $villeDao->selectOne($pdo, new Ville(0, "", $cp));

    // Instanciation d'un nouveau client
    $client = new Client($mdp_hashed, $ville['idVille'], $nom, $prenom, $telephone, $email, $adresse);

    // REQUETE PERMETTANT D'INSCRIRE UN UTILISATEUR
    $inscription_ok = $clientDao->insert($pdo, $client);

    // if ($count == 1) {

    //     $inscription_ok = $count;
    // } else {
    //     $inscription_ok = $count;
    // }
} catch (PDOException $e) {
    $inscription_ok = $e->getMessage();
}

echo $inscription_ok;

// Deconnexion de la BD
// $pdo = $bdd->disconnect();
