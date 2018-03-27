<?php // script de traitement addUser

	//INPORT SETTINGS
	include('../config/settings.php');

	// si l'utilisateur n'est pas connecté
	if(empty($_SESSION['user'])){

		//on le renvoi vers la page de connexion
		header('Location: ../back/logIn.php');
		exit();
	}

	// si le formulaire est vide
	if(empty($_POST)){

		//on le renvoi vers la page d'ajout d'utilisateur
		header('Location: ../back/adduser.php');
		exit();
	}

	//Pour le Formulaire ajout de d'utilisateurs
	//on initialise les variables d'erreurs et de retour
	$error = false;
	$errorUrl = '../back/adduser.php?';

	//si le pseudo est vide
	if(empty($_POST['pseudo'])){
		$error = true;
		$errorUrl = $errorUrl.'&pseudoEmpty';
	}else{
		$errorUrl = $errorUrl.'&pseudo='.$_POST['pseudo'];
	}

	//si le mot de passe est vide
	if(empty($_POST['password'])){
		$error = true;
		$errorUrl = $errorUrl.'&passwordEmpty';
	}else{
		$errorUrl = $errorUrl.'&author='.$_POST['password'];
	}

	//on verifie qu'il n'esxiste pas deja un utilisateur avec ce pseudo
	$verif = $mysql -> prepare('SELECT * FROM users WHERE pseudo = :p');
	$verif -> execute(array(':p' => $_POST['pseudo']));

	//s'il y a doublon on renvoi une erreur
	if( $verif -> rowcount() > 0){
		$error = true;
		$errorUrl = $errorUrl.'&existingUser';
	}

	//si il y a une erreur
	if($error){

	//on revoi vers la page d'ajout d'utilisateur
	header('Location: '.$errorUrl);
	exit();

	}else{//on ajoute dans la bd

		//on recupere le mot de passe crypte
		$pass = crypte($_POST['password']);

		//on initialise les variables qui nous permettent de construire la requete avec le pseudo et le mot de pass de l'utilisateur
		$cols = 'pseudo, password, level';
		$values = ':p, :m, :l';
		$content = array(':p' => $_POST['pseudo'], ':m' => $pass, ':l' => $_POST['levelselect']);

		//on prepare et execute la requete
		$ajout = $mysql->prepare('INSERT INTO users ('.$cols.') VALUES ('.$values.')');
		$ajout->execute($content);

		//on redirige vers la fiche du livre avec un message de confirmation
		header('Location: ../back/adduser.php?&userAdded');


	}// fin du script















