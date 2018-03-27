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

	<title>Les vins - Back Office</title>


	<!-- INPORT HEAD -->
	<?php include('../include/head_back.php'); ?>

</head>

<!-- BODY -->
<body class="container">

	<!-- INPORT HEADER -->
	<?php include('../include/header_back.php'); ?>

	<h2 class="page-header"> Ajouter un vin</h2>

	<a href="addWine.php">Ajouter un vin</a>


	<h2 class="page-header"> Liste des vins disponibles</h2>

	<!-- VINS -->
	<table class="table table-striped">

	<tr>
		<th>Région</th>
		<th>Nom</th>
		<th>Vigenron</th>
		<th>Date d'enregistrement</th>
		<th>Modifier / Supprimer</th>
	</tr>

	<?php 

	//on cree un requete qui lit les livres et les collones selectionnées
	$wines = $mysql->prepare('SELECT * FROM wine ORDER BY region ASC');
	$wines->execute();

	//on lit les résultats les uns après les autres
	while($data = $wines->fetch()){ ?>

		<tr>
			<td><?php echo $data['region']; ?></td>
			<td><?php echo $data['name']; ?></td>
			<td><?php echo $data['vigneron']; ?></td>
			<td><?php echo dateEU($data['created_at'],true); ?></td>
			<td><a href="modifWine.php?id=<?php echo $data['id']; ?>">Editer</a> / <a href="../traitement/deleteWine.php?id=<?php echo $data['id']; ?>">Supprimer ce vin</a></td>
		</tr>

	<?php
	} // fin while
	 ?>

	</table>
	


	<!-- INPORT FOOTER -->
	<?php include('../include/footer_back.php'); ?>
	
</body>


</html>
























