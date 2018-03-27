<?php

//INPORT SETTINGS
include('../config/settings.php');

$redirect = '../'.$_SESSION['address'];

//si on a recu la langue dans l'url et que cette langue est valide
if(!empty($_GET['lang']) && ($_GET['lang'] == '_fr' || $_GET['lang'] == '_en')){

	$_SESSION['lang'] = $_GET['lang'];

}

//on redirige
header('Location: '.$redirect);