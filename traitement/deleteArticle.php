<?php // script de traitement deleteArticle

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

	//on recupere le nom du fichier image
	$delarticle = $mysql -> prepare('SELECT * FROM home_articles WHERE id = :i');
	$delarticle -> execute(array(':i' => $_GET['id']));

	$data = $delarticle->fetch();

	if(file_exists('../data/article/' .$data['image'])){

		//on supprime l'image du dossier data
		unlink('../data/article/' .$data['image']);
	}

	
	//on supprime la ligne dans la bd
	$delete = $mysql -> prepare('DELETE FROM home_articles WHERE id = :i');
	$delete -> execute(array(':i' => $_GET['id']));

	

	//on redirige vers l'accueil avec un message
	header('Location: ../back/edithome.php?&articleDeleted');

	//fin script



















