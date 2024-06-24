<?php
include("header.php");


$retour = filter_input(INPUT_GET, "retour");

if (!isset($retour)) {
    $retour = false;
}


$template2 = "views/contact";
include("./views/index.phtml");
