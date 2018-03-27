<?php
//Script de traitement du logIn

//on import la config
include('../config/settings.php');

// si l'utilisateur n'est pas connecté
if(empty($_SESSION['user'])){

	//on le renvoi vers la page de connexion
	header('Location: logIn.php');
}

//si on arrive sur cette page sans passer par le formulaire
if( empty($_POST) ){

	//on renvoi vers la page de changement de mot de passe
	header('Location: ../back/profil.php');
	exit();

}

//si le mot est vide
if(empty($_POST['pseudo'])){

	//on renvoi vers la page de changement de mot de passe
	header('Location: ../back/profil.php');
	exit();
}

//on cherche des doublon possible
$user = $mysql -> prepare('SELECT * FROM users WHERE id = :i');
$user -> execute(array(':i' => $_POST['id']));

//si il y un doublon
if( $user->rowCount() ==  0 ){

	//on le renvoi a la page de connexion avec un message d'erreur 
	header('Location: ../back/profil.php?existingUser');
	exit();

//sinon
}else{
		//on construit et execute la requete
		$modif = $mysql->prepare('UPDATE users SET pseudo = :p WHERE id = :i');
		$modif -> execute(array(':p' => $_POST['pseudo'],':i' => $_POST['id']));

	//on le renvoi vers la page d'accueil du back office
	header('Location: ../back/profil.php?&pseudochanged');
	exit();

}//fin du script






















