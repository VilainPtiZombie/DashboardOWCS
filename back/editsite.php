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

	<title>Modification - Back Office</title>


	<!-- INPORT HEAD -->
	<?php include('../include/head_back.php'); ?>

</head>

<!-- BODY -->
<body class="container">

	<!-- INPORT HEADER -->
	<?php include('../include/header_back.php'); ?>


	<h2 class="page-header"> Liste des pages disponibles</h2>
	
	<table class="table table-striped">

	<tr>
		<th>Nom de la page</th>
		<th>Description</th>
		<th>Modifier</th>
	</tr>
	<tr>
		<td>Accueil</td>
		<td>Page d'accueil du site</td>
		<td><a href="../back/edithome.php">Modifier cette page</a></td>
	</tr>
	<tr>
		<td>Nos Vins</td>
		<td>Page des vins</td>
		<td><a href="../back/editwine.php">Modifier cette page</a></td>
	</tr>
	<tr>
		<td>Nos Vignerons</td>
		<td>Page de présentation des vignerons</td>
		<td><a href="../back/editwinemen.php">Modifier cette page</a></td>
	</tr>
	<tr>
		<td>Contact</td>
		<td>Page de contact</td>
		<td><a href="../back/editcontact.php">Modifier cette page</a></td>
	</tr>


	</table>

	


	<!-- INPORT FOOTER -->
	<?php include('../include/footer_back.php'); ?>
	
</body>


</html>
























