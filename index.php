<?php

//un systeme de routage pour acceder aux controlleurs afin d appeler les views et les models  
if (array_key_exists("action", $_GET)) {

    switch ($_GET['action']) {
            //si index.php?action=contact ==alors il va appeler le controlleurs contact.php
            // qui va de son cote communiquer avec le model et faire l affichage dans la page(view)
        case "produit":
            include 'controllers/produit.php';
            break;
        case "contact":
            include 'controllers/contact.php';
            break;
        case "envoiMail":
            include 'controllers/envoiMail.php';
            break;
        case "produitOne":
            include 'controllers/produitOne.php';
            break;
        case "monCompte":
            include 'controllers/monCompte.php';
            break;
        case "login":
            include 'controllers/login.php';
            break;
        case "register":
            include 'controllers/register.php';
            break;
    }
} else {
    include('controllers/index.php');
}
