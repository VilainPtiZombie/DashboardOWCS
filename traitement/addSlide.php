<?php // script de traitement addSlide

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

		//on le renvoi vers la page d'ajout de slide
		header('Location: ../back/addSlide.php');
		exit();
	}

	//Pour le formulaire d'ajout de slide
	//on initialise les variables d'erreurs et de retour
	$error = false;
	$errorUrl = '../back/addSlide.php?';

	//si les titre sont vide
	if( empty($_POST['title_fr']) || empty($_POST['title_en']) ){
		$error = true;
		$errorUrl = $errorUrl.'&titleEmpty';
	}

	//si les textes sont vide
	if( empty($_POST['text_fr']) || empty($_POST['text_en']) ){
		$error = true;
		$errorUrl = $errorUrl.'&textEmpty';
	}

	//TRAITEMENT IMPORT IMAGE VIA FORMULAIRE
	//si on a recu un fichier et qu'il y a une erreur
	if($_FILES['slideimg']['size'] > 0 && $_FILES['slideimg']['error'] > 0){

		//on change les variable d'erreurs
		$error = true;
		$errorUrl = $errorUrl.'&fileError';
	}

	//si on a recu un fichier
	if($_FILES['slideimg']['size'] > 0){

		//on teste si on a la bonne extension
		$extensions_valides = array('png', 'jpg', 'jpeg', 'gif');

		//on recupère le nom d'origine du fichier
		$nomDuFichier = $_FILES['slideimg']['name'];

		//on décompose ce nom sous forme d'un tableau selon le motif '.'
		$patternDuFichier = explode('.', $nomDuFichier);

		//on recupere la derniere case de ce tableau c'est à dire l'extension
		$extension_du_fichier = $patternDuFichier[ count($patternDuFichier) - 1];

		//on transforme l'extention en minuscule
		$extension_minuscule = strtolower($extension_du_fichier);

		//si l'extension minuscule n'est pas dans le tableau des valides
		if( !in_array($extension_minuscule, $extensions_valides)) {

			//on declenche une erreur
			$error = true;
			$errorUrl = $errorUrl.'&extensionError';
		}
	}

	//si il y a une erreur
	if($error){

	//on revoi vers la page d'ajout de slide
	header('Location: '.$errorUrl);
	exit();

	}else{//on ajoute dans la bd

		//on initialise les variables qui nous permettent de construire la requete avec le pseudo et le mot de pass de l'utilisateur
		$cols = 'title_fr, title_en, text_fr, text_en, textlink_fr, textlink_en, link';
		$values = ':tifr, :tien, :tfr, :ten, :tlfr, :tlen, :l';
		$content = array(':tifr' => $_POST['title_fr'], ':tien' => $_POST['title_en'], ':tfr' => $_POST['text_fr'], ':ten' => $_POST['text_en'], ':tlfr' => $_POST['textlink_fr'], ':tlen' => $_POST['textlink_en'], ':l' => $_POST['link']);

		//on prepare et execute la requete@
		$ajout = $mysql->prepare('INSERT INTO slider ('.$cols.') VALUES ('.$values.')');
		$ajout->execute($content);

		//on recupere l'id ajoute automatiquement
		$id = $mysql->lastInsertId();

		if($_FILES['slideimg']['size'] > 0){
			//on construit le nouveau nom du fichier image
			$nom = $id.'.'.$extension_minuscule;

			//on deplace le fichier temporaire vers le dossier data avec le nouveau nom
			move_uploaded_file($_FILES['slideimg']['tmp_name'], '../data/slide/'.$nom);

			//on modifie la ligne dans la base de donnees
			$modif = $mysql -> prepare('UPDATE slider SET image = :c WHERE id = :i');
			$modif -> execute(array(':c' => $nom, ':i' => $id));
		}

		//on redirige vers la fiche du livre avec un message de confirmation
		header('Location: ../back/edithome.php?&slideAdded');


	}















