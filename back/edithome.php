<?php 
	//INPORT SETTINGS
	include('../config/settings.php');

	// si l'utilisateur n'est pas connecté
	if(empty($_SESSION['user'])){


		//on le renvoi vers la page de connexion
		header('Location: logIn.php');
	}


	//on cree un requete qui lit les livres et les collones selectionnées
	$slider = $mysql->prepare('SELECT * FROM slider ORDER BY id ASC');
	$slider->execute();

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


	<h2 class="page-header"> Modification de la page d'accueil</h2>

	<!-- SLIDER -->
	<h3>Slider</h3>

	<table class="table table-striped">
	<tr>
		<th>Titre</th>
		<th>Date d'enregistrement</th>
		<th>Modifier / Supprimer</th>
	</tr>

	<?php 
	//on lit les résultats les uns après les autres
	while($data = $slider->fetch()){ ?>

		<tr>
			<td><?php echo $data['title_fr']; ?></td>
			<td><?php echo dateEU($data['created_at'],true); ?></td>
			<td><a href="../traitement/deleteSlide.php?id=<?php echo $data['id']; ?>">Supprimer ce slide</a></td>
		</tr>

	<?php
	} // fin while
	 ?>

	</table>

	<button><a href="../back/addSlide.php">Ajouter un slide</a></button>

	<!-- ARTICLES -->
	<h3>Articles</h3>

	<table class="table table-striped">
	<tr>
		<th>Titre</th>
		<th>Date d'enregistrement</th>
		<th>Modifier / Supprimer</th>
	</tr>

	<?php 
	//on cree un requete qui lit les articles et les collones selectionnées
	$articles = $mysql->prepare('SELECT * FROM home_articles ORDER BY created_at ASC');
	$articles->execute();

	//on lit les résultats les uns après les autres
	while($article = $articles->fetch()){ ?>

		<tr>
			<td><?php echo $article['title'.$_SESSION['lang']]; ?></td>
			<td><?php echo dateEU($article['created_at'],false); ?></td>
			<td><a href="../traitement/deleteArticle.php?id=<?php echo $article['id']; ?>">Supprimer cet article</a></td>
		</tr>

	<?php
	} // fin while
	 ?>

	</table>

	<button><a href="../back/addArticle.php">Ajouter un article</a></button>
	
	


	<!-- INPORT FOOTER -->
	<?php include('../include/footer_back.php'); ?>
	
</body>


</html>
























