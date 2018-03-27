<?php // script de traitement deleteBook

	//INPORT SETTINGS
	include('../config/settings.php');

	// si l'utilisateur n'est pas connecté
	if(empty($_SESSION['user'])){

		//on le renvoi vers la page de connexion
		header('Location: ../back/logIn.php');
		exit();
	}

	//s'il n'y a pas id dans l'adresse url
	if(empty($_GET['id'])){

		//on renvoi vers la page d'accueil
		header('Location: ../back/index.php');
		exit();
	}

	//on recupere le ,om du fichier image
	$deluser = $mysql -> prepare('SELECT * FROM users WHERE id = :i');
	$deluser -> execute(array(':i' => $_GET['id']));

	$data = $deluser->fetch();
	
	//on supprime la ligne dans la bd
	$delete = $mysql -> prepare('DELETE FROM users WHERE id = :i');
	$delete -> execute(array(':i' => $_GET['id']));


	//on redirige vers l'accueil avec un message
	header('Location: ../back/adduser.php?&userDeleted');



















