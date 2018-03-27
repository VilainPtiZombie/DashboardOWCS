<?php 
	//INPORT SETTINGS
	include('../config/settings.php');

	// si l'utilisateur n'est pas connecté
	if(empty($_SESSION['user'])){


		//on le renvoi vers la page de connexion
		header('Location: logIn.php');
	}

 ?>

<!DOCTYPE html>

<head>

	<title>mon profil - Back Office</title>


	<!-- INPORT HEAD -->
	<?php include('../include/head_back.php'); ?>

</head>

<!-- BODY -->
<body class="container">

	<!-- INPORT HEADER -->
	<?php include('../include/header_back.php'); ?>


	<h2 class="page-header"> Profil de <?php echo ($_SESSION['user']); ?></h2>

	<h3>Changement de pseudo</h3>

	<form action="../traitement/changePseudo.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>" /> 
		<p>
			<input type="text" name="pseudo" placeholder="Nouveau pseudo"/>
		</p>
		<p>
			<input type="submit" value="Changer de pseudo"/>
		</p>
	</form>

	<h3>Changement de mot de passe</h3>

	<form action="../traitement/changepassword.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>" /> 
		<p>
			<input type="password" name="oldPass" placeholder="Ancien mot de passe"/>
		</p>
		<p>
			<input type="password" name="password" placeholder="Nouveau mot de passe"/>
		</p>
		<p>
			<input type="password" name="confirmPassword" placeholder="Confirmation de mot de passe"/>
		</p>
		<p>
			<input type="submit" value="Changer le mot de passe"/>
		</p>
	</form>


	<!-- INPORT FOOTER -->
	<?php include('../include/footer_back.php'); ?>
	
</body>


</html>
























