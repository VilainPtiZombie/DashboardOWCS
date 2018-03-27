<?php // script de traitement modif de vin

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

		//on le renvoi vers la page du formulaire
		header('Location: ../back/addWine.php');
		exit();
	}

	//Pour le Formulaire ajout de livres
	//on initialise les variables d'erreurs et de retour
	$error = false;
	$errorUrl = '../back/addWine.php?';

	//si le nom est vide
	if(empty($_POST['name'])){
		$error = true;
		$errorUrl = $errorUrl.'&nameEmpty';
	}else{
		$errorUrl = $errorUrl.'&name='.$_POST['name'];
	}

	//si l'attribut
	if(empty($_POST['attribut'])){
		$error = true;
		$errorUrl = $errorUrl.'&attributEmpty';
	}else{
		$errorUrl = $errorUrl.'&attribut='.$_POST['attribut'];
	}

	//si la robe
	if(empty($_POST['robe'])){
		$error = true;
		$errorUrl = $errorUrl.'&robeEmpty';
	}else{
		$errorUrl = $errorUrl.'&robe='.$_POST['robe'];
	}

	//si le vigneron
	if(empty($_POST['vigneronid'])){
		$error = true;
		$errorUrl = $errorUrl.'&vigneronidEmpty';
	}else{
		$errorUrl = $errorUrl.'&vigneronid='.$_POST['vigneronid'];
	}

	//si la région
	if(empty($_POST['region'])){
		$error = true;
		$errorUrl = $errorUrl.'&regionEmpty';
	}else{
		$errorUrl = $errorUrl.'&region='.$_POST['region'];
	}

	//si l'annee
	if(empty($_POST['year'])){
		$error = true;
		$errorUrl = $errorUrl.'&yearEmpty';
	}else{
		$errorUrl = $errorUrl.'&year='.$_POST['year'];
	}

	//si le prix
	if(empty($_POST['prix'])){
		$error = true;
		$errorUrl = $errorUrl.'&prixEmpty';
	}else{
		$errorUrl = $errorUrl.'&prix='.$_POST['prix'];
	}

	//si l'arome FR
	if(empty($_POST['arome_fr'])){
		$error = true;
		$errorUrl = $errorUrl.'&aromefrEmpty';
	}else{
		$errorUrl = $errorUrl.'&arome_fr='.$_POST['arome_fr'];
	}

	//si l'arome EN
	if(empty($_POST['arome_en'])){
		$error = true;
		$errorUrl = $errorUrl.'&aromeenEmpty';
	}else{
		$errorUrl = $errorUrl.'&arome_en='.$_POST['arome_en'];
	}

	//si la cuvee FR
	if(empty($_POST['cuve_fr'])){
		$error = true;
		$errorUrl = $errorUrl.'&cuvefrEmpty';
	}

	//si la cuvee EN
	if(empty($_POST['cuve_en'])){
		$error = true;
		$errorUrl = $errorUrl.'&cuveenEmpty';
	}

	//TRAITEMENT IMPORT IMAGE VIA FORMULAIRE
	//si on a recu un fichier et qu'il y a une erreur
	if($_FILES['vignette']['size'] > 0 && $_FILES['vignette']['error'] > 0){

		//on change les variable d'erreurs
		$error = true;
		$errorUrl = $errorUrl.'&fileError';
	}

	//si on a recu un fichier
	if($_FILES['vignette']['size'] > 0){

		//on teste si on a la bonne extension
		$extensions_valides = array('png', 'jpg', 'jpeg', 'gif');

		//on recupère le nom d'origine du fichier
		$nomDuFichier = $_FILES['vignette']['name'];

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

	//s'il y a une erreur detecte
	if($error){
		$errorUrl = $errorUrl;
		header('Location: '.$errorUrl);
		exit();
		
	}else{//on ajoute dans la bd


		//on initialise les variables qui nous permettent de construire la requete

		$cols = 'name, attribut, vigneron, robe, region, year, prix, arome_fr, arome_en, cuve_fr, cuve_en, ab, bi, vn, ar, ap, vr, g, gi, vb, vp, po, f, forc, acidite, duree, sucre, tanim, persistance';

		$values = ':n, :a, :v, :r, :re, :y, :p, :afr, :aen, :cfr, :cen, :ab, :bi, :vn, :ar, :ap, :vr, :g, :gi, :vb, :vp, :po, :f, :forc, :acidite, :duree, :sucre, :tanim, :persistance';

		$content = array(
			':n' => $_POST['name'],
			':a' => $_POST['attribut'],
			':v' => $_POST['vigneronid'],
			':r' => $_POST['robe'],
			':re' => $_POST['region'],
			':y' => $_POST['year'],
			':p' => $_POST['prix'],
			':afr' => $_POST['arome_fr'],
			':aen' => $_POST['arome_en'],
			':cfr' => $_POST['cuve_fr'],
			':cen' => $_POST['cuve_en'],
			':ab' => intval(isset($_POST['ab'])),
			':bi' => intval(isset($_POST['bi'])),
			':vn' => intval(isset($_POST['vn'])),
			':ar' => intval(isset($_POST['ar'])),
			':ap' => intval(isset($_POST['ap'])),
			':vr' => intval(isset($_POST['vr'])),
			':g' => intval(isset($_POST['g'])),
			':gi' => intval(isset($_POST['gi'])),
			':vb' => intval(isset($_POST['vb'])),
			':vp' => intval(isset($_POST['vp'])),
			':po' => intval(isset($_POST['po'])),
			':f' => intval(isset($_POST['f'])),
			':forc' => intval(isset($_POST['forc'])),
			':acidite' => intval(isset($_POST['acidite'])),
			':duree' => intval(isset($_POST['duree'])),
			':sucre' => intval(isset($_POST['sucre'])),
			':tanim' => intval(isset($_POST['tanim'])),
			':persistance' => intval(isset($_POST['persistance']))
		);

		//on prepare et execute la requete
		$ajout = $mysql->prepare('INSERT INTO wine ('.$cols.') VALUES ('.$values.')');
		$ajout->execute($content);


		//on recupere l'id ajoute automatiquement
		$id = $mysql->lastInsertId();


		if($_FILES['vignette']['size'] > 0){
			//on construit le nouveau nom du fichier image
			$nom = $id.'.'.$extension_minuscule;

			//on deplace le fichier temporaire vers le dossier data avec le nouveau nom
			move_uploaded_file($_FILES['cover']['tmp_name'], '../data/wine/vignette/'.$nom);

			//on modifie la ligne dans la base de donnees
			$modif = $mysql -> prepare('UPDATE wine SET img = :c WHERE id = :i');
			$modif -> execute(array(':c' => $nom, ':i' => $id));
		}

		//on redirige vers la fiche du livre avec un message de confirmation
		header('Location: ../back/modifWine.php?id='.$id.'&wineAdded');


	}














