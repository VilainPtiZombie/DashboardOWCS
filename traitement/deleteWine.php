<?php // script de traitement deleteWine

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
	$wine = $mysql -> prepare('SELECT * FROM wine WHERE id = :i');
	$wine -> execute(array(':i' => $_GET['id']));

	$data = $wine->fetch();

	if(file_exists('../data/wine/' .$data['img'])){

		//on supprime la couverture du dossier data
		unlink('../data/wine/' .$data['img']);
	}
	
	//on supprime la ligne dans la bd
	$delete = $mysql -> prepare('DELETE FROM wine WHERE id = :i');
	$delete -> execute(array(':i' => $_GET['id']));


	//on redirige vers l'accueil avec un message
	header('Location: ../back/editwine.php?&vinDeleted');



















