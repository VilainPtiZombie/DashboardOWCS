<?php 
	//INPORT SETTINGS
	include('../config/settings.php');

	//si l'utilisateur est connecte
	if( !empty($_SESSION['user'])){

		//on le vire vers l'accueil
		header('Location: index.php');
		exit();
	}

 ?>



<!DOCTYPE html>

<head>

	<title>Back Office</title>


	<!-- INPORT HEAD -->
	<?php include('../include/head_back.php'); ?>

</head>

<!-- BODY -->
<body class="home-body">

	<!-- INPORT HEADER -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-home">
	<form class="form-block" action="../traitement/logIn.php" method="POST">
	<!-- Home Login -->

           
		<h2 class="page-header">Plateforme Client</h2>
		<p>
			<input type="text" name="nom" placeholder="Identifiant" />
		</p>
		<p>
			<input type="password" name="motDePasse" placeholder="Password" />
		</p>
		<p>
			<input type="submit" value="Se connecter" />
		</p>
                 <?php
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
            ?>

	</form>
        </div>
        <!-- Fin HOME LOGIN -->

	
</body>


</html>
























