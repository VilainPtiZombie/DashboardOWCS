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

	<title>New Slide - Back Office</title>


	<!-- INPORT HEAD -->
	<?php include('../include/head_back.php'); ?>

</head>

<!-- BODY -->
<body class="container">

	<!-- INPORT HEADER -->
	<?php include('../include/header_back.php'); ?>


	<h2 class="page-header"> Ajouter un slide</h2>

	<form action="../traitement/addSlide.php" method="POST" enctype="multipart/form-data">
		<h3>Titre</h3>
		<p>
			<input type="text" name="title_fr" placeholder="Titre francais"/>
		</p>
		<p>
			<input type="text" name="title_en" placeholder="Titre anglais"/>
		</p>

		<h3>Paragraphe</h3>
		<p>
			<textarea name="text_fr" placeholder="paragraphe francais"></textarea>
		</p>
		<p>
			<textarea name="text_en" placeholder="paragraphe anglais"></textarea>
		</p>

		<h3>Lien</h3>
		<p>
			<input type="text" name="textlink_fr" placeholder="texte du boutton francais"/>
		</p>
		<p>
		<p>
			<input type="text" name="textlink_en" placeholder="texte du boutton anglais"/>
		</p>
		<p>
			<input type="text" name="link" placeholder="lien"/>
		</p>


		<h3>Image</h3>
		<p>
			<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
			<!-- value est la taille en octet ici 1mo -->
			<input type="file" name="slideimg">
			(1Mo max, format autorisé : jpg, jpeg, png ou gif)
		</p>
		<p>
			<input type="submit" value="Ajouter"/>
		</p>
		
	</form>





	<!-- INPORT FOOTER -->
	<?php include('../include/footer_back.php'); ?>
	
</body>


</html>
























