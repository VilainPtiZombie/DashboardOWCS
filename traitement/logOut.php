<?php
//logOut.php dans traitement

//on demare la session
session_start();


//on vide les variable de la session
unset($_SESSION['user']);

//on tue la session
session_destroy();

//on redirige vers le front office
header('Location: ..');

//fin du scipt