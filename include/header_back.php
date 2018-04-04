<?php 

	//on recupere le nom du fichier affiche
	$page = explode('/',$_SERVER['PHP_SELF']);

	$nom = $page[count($page) - 1]; 


 ?>

	<h1 class="page-header">Back Office - Vinostar</h1>

	<nav class="navbar navbar-default">
		<ul class="nav navbar-nav">

			<li <?php if($nom == 'index.php') echo 'class="active"'; ?> ><a href="index.php">Accueil</a></li>

			<?php 

			//si l'utilisateur n'est pas connecte
			if( empty($_SESSION['user'])){
			 ?>
			

			<li <?php if($nom == 'logIn.php') echo 'class="active"'; ?> ><a href="logIn.php">Se connecter</a></li>
			

			<?php 

			//fin (si connecte)
			}
			//sinon (s'il est connecte)
			else{ ?>
			
			<li <?php if($nom == 'editsite.php') echo 'class="active"'; ?> ><a href="editsite.php">Modification du site web</a></li>

			<li <?php if($nom == 'adduser.php') echo 'class="active"'; ?> ><a href="adduser.php">Modifier les utilisateurs</a></li>

			<li <?php if($nom == 'profil.php') echo 'class="active"'; ?> ><a href="profil.php">Mon profil</a></li>

			<li><a href="../traitement/logOut.php">Se déconnecter</a></li>

			<?php } //fin du else ?>

		</ul>
	</nav>

	<?php

	//si l'utilisateur est connecte
	if( !empty($_SESSION['user']) ){

		//message de bienvenue
        echo '<div class="container Recap-Head"> <div class="row"> <p class="col-lg-3">Bonjour '.$_SESSION['user'].'.</p>'; echo ' <p class="col-lg-3">Projet : '.$_SESSION['projet'].'.</p>'; echo ' <p class="col-lg-3">Avancement : '.$_SESSION['avancement'].'.</p>'; echo ' <p class="col-lg-3">Contrat : '.$_SESSION['contrat'].'.</p> </div></div>';
                

	}


	//s'il existe la variable d'url logEmpty
	if( isset($_GET['logEmpty']) ){

		//on affiche un message pour prevenir l'utilisateur
		echo '<p class="alert alert-danger">Le pseudo et le mot de passe sont obligatoire.</p>';

	}

	//s'il existe la variable d'url userUnknow
	if( isset($_GET['userUnknow']) ){

		//on affiche un message pour prevenir l'utilisateur
		echo '<p class="alert alert-danger">Ce couple utilisateur/mot de passe est inconnu.</p>';

	}


	//ADDUSER	
	// s'il existe la variable d'url bookAdded
	if( isset($_GET['userAdded'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-success"> L\'utilisateur à été enregistré. </p>';
	}

	// s'il existe la variable d'url existingUser
	if( isset($_GET['existingUser'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-danger"> L\'utilisateur à déja été enregistré choisissez un autre pseudo. </p>';
	}

	// s'il existe la variable d'url passwordEmpty
	if( isset($_GET['passwordEmpty'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-danger"> Le mot de passe est obligatoire </p>';
	}

	// s'il existe la variable d'url pseudoEmpty
	if( isset($_GET['pseudoEmpty'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-danger"> Le pseudo est obligatoire </p>';
	}

	//CHANGEPASSWORD	
	// s'il existe la variable d'url passwordchanged
	if( isset($_GET['passwordchanged'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-success"> Votre nouveau mot de passe est enregistré. </p>';
	}

	//CHANGEPSEUDO	
	// s'il existe la variable d'url pseudochanged
	if( isset($_GET['pseudochanged'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-success"> Votre nouveau pseudo est enregistré. </p>';
	}

	//DELETEUSER
	// s'il existe la variable d'url userDeleted
	if( isset($_GET['userDeleted'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-success"> L\'administrateur a été supprimé. </p>';
	}


	//HOME
	//SLIDER ERROR / SUCESS

	//DELETESIDE
	// s'il existe la variable d'url slideDeleted
	if( isset($_GET['slideDeleted'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-success"> Le slide a été supprimé. </p>';
	}

	//AJOUTSIDE
	// s'il existe la variable d'url slideAdded
	if( isset($_GET['slideAdded'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-success"> Le slide a été ajouté. </p>';
	}

	//Titre manquant
	// s'il existe la variable d'url titleEmpty
	if( isset($_GET['titleEmpty'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-danger"> Le titre est obligatoire. </p>';
	}

	//Paragraphe manquant
	// s'il existe la variable d'url textEmpty
	if( isset($_GET['textEmpty'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-danger"> Le texte est obligatoire. </p>';
	}

	//HOME
	//ARTICLE ERROR / SUCESS

	//AJOUTARTICLE
	// s'il existe la variable d'url articleAdded
	if( isset($_GET['articleAdded'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-success"> L\'article a été ajouté. </p>';
	}

	//DELETEARTICLE
	// s'il existe la variable d'url articleDeleted
	if( isset($_GET['articleDeleted'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-success"> L\'article a été supprimé. </p>';
	}



	//VINS
	//VINS ERROR / SUCESS

	//ERROR
	// s'il existe la variable d'url nameEmpty
	if( isset($_GET['nameEmpty'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-danger"> Le nom est obligatoire. </p>';
	}

	// s'il existe la variable d'url attributEmpty
	if( isset($_GET['attributEmpty'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-danger"> Vous devez choisir entre nouveauté et normal. </p>';
	}

	// s'il existe la variable d'url robeEmpty
	if( isset($_GET['robeEmpty'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-danger"> La robe du vin est obligatoire. </p>';
	}

	// s'il existe la variable d'url vigneronidEmpty
	if( isset($_GET['vigneronidEmpty'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-danger"> Le nom du vigneron est obligatoire. </p>';
	}

	// s'il existe la variable d'url regionEmpty
	if( isset($_GET['regionEmpty'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-danger"> Le nom de la région est obligatoire. </p>';
	}

	// s'il existe la variable d'url yearEmpty
	if( isset($_GET['yearEmpty'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-danger"> L\'année de mise en bouteille est obligatoire. </p>';
	}

	// s'il existe la variable d'url prixEmpty
	if( isset($_GET['prixEmpty'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-danger"> Le prix est obligatoire. </p>';
	}

	// s'il existe la variable d'url aromefrEmpty
	if( isset($_GET['aromefrEmpty'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-danger"> Le texte sur l\'arome en francais est obligatoire. </p>';
	}

	// s'il existe la variable d'url aromeenEmpty
	if( isset($_GET['aromeenEmpty'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-danger"> Le texte sur l\'arome en anglais est obligatoire. </p>';
	}

	// s'il existe la variable d'url cuvefrEmpty
	if( isset($_GET['cuvefrEmpty'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-danger"> Le texte sur la cuvée en francais est obligatoire. </p>';
	}

	// s'il existe la variable d'url cuveenEmpty
	if( isset($_GET['cuveenEmpty'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-danger"> Le texte sur la cuvée en anglais est obligatoire. </p>';
	}

	//SUPPRESSION
	// s'il existe la variable d'url vinDeleted
	if( isset($_GET['vinDeleted'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-success"> Le vin a été supprimé. </p>';
	}

	//AJOUT
	// s'il existe la variable d'url wineAdded
	if( isset($_GET['wineAdded'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-success"> Le vin a été ajouté. </p>';
	}

	//EDITION
	// s'il existe la variable d'url wineUpdated
	if( isset($_GET['wineUpdated'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-success"> Le vin a été édité. </p>';
	}








	 ?>





















