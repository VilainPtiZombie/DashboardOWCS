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
<body class="container">

	<!-- INPORT HEADER -->
	<?php include('../include/header_back.php'); ?>

	<form action="../traitement/logIn.php" method="POST">

		<h2 class="page-header">Se connecter</h2>
		<p>
			<input type="text" name="nom" placeholder="Le pseudo" />
		</p>
		<p>
			<input type="password" name="motDePasse" placeholder="Le passeword" />
		</p>
		<p>
			<input type="submit" value="Se connecter" />
		</p>

	</form>

	<!-- INPORT FOOTER -->
	<?php include('../include/footer_back.php'); ?>
	
</body>


</html>
























