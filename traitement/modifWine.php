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
		header('Location: ../back/modifWine.php');
		exit();
	}

	//Pour le Formulaire ajout de livres
	//on initialise les variables d'erreurs et de retour
	$error = false;
	$errorUrl = '../back/modifWine.php?';

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

		//on construit la requete de modif
		$set = 'name = :n, attribut = :a, vigneron = :v, robe = :r, region = :re, year = :y, prix = :p, arome_fr = :afr, arome_en = :aen, cuve_fr = :cfr, cuve_en = :cen, ab = :ab, bi = :bi, vn = :vn, ar = :ar, ap = :ap, vr = :vr, g = :g, gi = :gi, vb = :vb, vp = :vp, po = :po, f = :f, forc = :forc, acidite = :acidite, duree = :duree, sucre = :sucre, tanim = :tanim, persistance = :persistance';

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
			':forc' => $_POST['forc'],
			':acidite' => $_POST['acidite'],
			':duree' => $_POST['duree'],
			':sucre' => $_POST['sucre'],
			':tanim' => $_POST['tanim'],
			':persistance' => $_POST['persistance'],
			':i' => $_POST['id']
		);

		//s'il y a un fichier  envoye,
		if($_FILES['vignette']['size'] > 0){

			//on ajoute les modif dans la requete, et on bouge le fichier
			$set .= ', vignette = :c'; // veu dire la meme chose que $set = $set.', vignette = :c';
			$content['c'] = $_POST['id'].'.'.$extension_minuscule;

		//on deplace le fichier vers le dossier data
		move_uploaded_file($_FILES['vignette']['tmp_name'], '../data/wine/vignette/'.$_POST['id'].'.'.$extension_minuscule);
		}

		//on execute la requete
		$modif = $mysql->prepare('UPDATE wine SET '.$set.' WHERE id = :i');
		$modif -> execute($content);

		//on redirige vers la fiche du livre avec un message de confirmation
		header('Location: ../back/modifWine.php?id='.$_POST['id'].'&wineUpdated');

	}












