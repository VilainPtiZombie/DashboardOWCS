<?php // script de traitement pour l'abonnement a la newsletter

	//INPORT SETTINGS
	include('../config/settings.php');

	// si le formulaire est vide
	if(empty($_POST)){

		//on le renvoi vers la page d'accueil'
		header('Location: ../index.php1');
		exit();
	}

	//RAPPORT D'ERREUR
	$error = false;
	$errorUrl = '../index.php?2';

	//Verif remplissage formulaire
	if( empty($_POST['newsletter'])){
		$error = true;
		$errorUrl = $errorUrl.'&mailEmpty';
	}

	//on verifie qu'il n'existe pas un mail egal a celui rentré dans le formulaire
	$verif = $mysql -> prepare('SELECT * FROM home_newsletter WHERE email = :e');
	$verif -> execute(array(':e' => $_POST['newsletter']));

	//s'il n'y a pas de doublon sinon on declenche une erreur
	if( $verif -> rowcount() > 0){
		$error = true;
		$errorUrl = $errorUrl.'&existingMail';
	}


	//si il y a une erreur
	if($error){

		//on revoi vers la page d'acceuil avec un message d'erreur
		header('Location: '.$errorUrl);
		exit();

	}else{//on ajoute dans la bd

		//on prepare et execute la requete pour ajouter le mail a la bd
		$ajout = $mysql->prepare('INSERT INTO home_newsletter (email) VALUES (:e)');
		$ajout->execute(array(':e' => $_POST['newsletter']));

		//on redirige vers la page d'accueil avec un message de confirmation
		header('Location: ../index.php?&mailAdded');

	}//FIN SCRIPT















