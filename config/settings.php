<?php

//on lance les sessions
session_start();

//s'il n'existe de langue predefinie dans la session 
if(empty($_SESSION['lang'])){

	//cas la on cree ce parametre
	$_SESSION['lang'] = '_fr';
}
//Création de l'extraction des contnues des users

//on se connecte a la base de données
	define('SQL_HOST','localhost');// port pas le meme que local host !!!
	define('SQL_USER','root');
	define('SQL_PASS','');
	define('SQL_DBNAME','vinostar');

	try{
		$mysql = new PDO('mysql:dbname='.SQL_DBNAME.';charset=utf8;host='.SQL_HOST,SQL_USER,SQL_PASS);

	} catch(Exception $e){
		die('Erreur :'.$e->getMessage());
	}


//on inclu un fichier de fonction
include('functions.php');