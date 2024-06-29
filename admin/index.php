<?php

//un systeme de routage pour acceder aux controlleurs afin d appeler les views et les models  
if (array_key_exists("action", $_GET)) {

    switch ($_GET['action']) {
            //si index.php?action=contact ==alors il va appeler le controlleurs contact.php
            // qui va de son cote communiquer avec le model et faire l affichage dans la page(view)
        case 'produits':
            include('controllers/produits.php');
            break;
        case 'addProduit':
            include('controllers/addProd.php');
            break;
        case 'upProduit':
            include('controllers/upProd.php');
            break;
        case 'delProduit':
            include('controllers/produits.php');
            break;
        case 'categories':
            include('controllers/categories.php');
            break;
        case 'addCategorie':
            include('controllers/addCat.php');
            break;
        case 'upCategorie':
            include('controllers/upCat.php');
            break;
        case 'delCategorie':
            include('controllers/categories.php');
            break;
        case 'sousCategories':
            include('controllers/sousCategories.php');
            break;
        case 'addSousCategorie':
            include('controllers/addSousCat.php');
            break;
        case 'upSousCategorie':
            include('controllers/upSousCat.php');
            break;
        case 'delSousCategorie':
            include('controllers/sousCategories.php');
            break;
    }
} else {
    include('controllers/index.php');
}
