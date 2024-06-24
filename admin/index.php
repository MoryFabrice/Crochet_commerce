<?php

//un systeme de routage pour acceder aux controlleurs afin d appeler les views et les models  
if (array_key_exists("action", $_GET)) {

    switch ($_GET['action']) {
            //si index.php?action=contact ==alors il va appeler le controlleurs contact.php
            // qui va de son cote communiquer avec le model et faire l affichage dans la page(view)
        case 'produits':
            include('controllers/produits.php');
            break;
        case 'addProd':
            include('controllers/addProd.php');
            break;
        case 'categories':
            include('controllers/categories.php');
            break;
    }
} else {
    include('controllers/index.php');
}
