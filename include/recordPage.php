<?php

//On recupere l'adresse de la page en cours
$address = $_SERVER['REQUEST_URI'];

$tab = explode('/', $address);

$_SESSION['address'] = $tab[count($tab) - 1];