<?php 
	//INPORT SETTINGS
	include('config/settings.php');

	//on verifie qu'il existe bien la variable d'URL 'id'
	if( empty($_GET['id'])){
		header('Location: les_vignerons.php');
	}

	//on cree une requete qui lit un livre
	$vignerons = $mysql->prepare('SELECT * FROM vignerons WHERE id = :i ');
	$vignerons->execute( array( ':i' => $_GET['id']) );

	//s'il n'y a eu aucun match
	if($vignerons->rowCount() == 0){
		header('Location: les_vignerons.php');

	//sinon, on lit le resultat
	}else{
		$data = $vignerons->fetch();
	}
 ?>


<!DOCTYPE html>

<head>

	<title>Vinostar | <?php echo $data["nom"]; ?></title>


	<!-- INPORT HEAD -->
	<?php include('include/head.php'); ?>

</head>

<!-- BODY -->
<body class="container">

	<!-- INPORT HEADER -->
	<?php include('include/header.php'); ?>

	<!-- PAGE CONTENT -->

	<div class="xl-col-12">
		<img src="img/les_vignerons/v1.jpg" alt="#" class="xl-col-4">
		<div class="xl-col-5">
			<?php 

				$title1s = $mysql->prepare('SELECT * FROM winemaker WHERE attribut = :a');
				$title1s->execute(array(':a' => 'vigneronpersotitle1' ));

				$title1 = $title1s->fetch();

				$title2s = $mysql->prepare('SELECT * FROM winemaker WHERE attribut = :a');
				$title2s->execute(array(':a' => 'vigneronpersotitle2' ));

				$title2 = $title2s->fetch();

			 ?>
			<h2><?php echo $data["nom"]; ?></h2>
			<h3><?php echo $title1['title'.$_SESSION['lang']]; ?></h3>
			<p><?php echo $data['histoire'.$_SESSION['lang']]; ?></p>
			<h3><?php echo $title2['title'.$_SESSION['lang']]; ?></h3>
			<p><?php echo $data['domaine'.$_SESSION['lang']]; ?></p>
		</div>

		<div class="xl-col-3">
			<?php 

				$title3s = $mysql->prepare('SELECT * FROM winemaker WHERE attribut = :a');
				$title3s->execute(array(':a' => 'vigneronpersotitle3' ));

				$title3 = $title3s->fetch();

				$title4s = $mysql->prepare('SELECT * FROM winemaker WHERE attribut = :a');
				$title4s->execute(array(':a' => 'vigneronpersotitle4' ));

				$title4 = $title4s->fetch();

			 ?>

			<h3><?php echo $title3['title'.$_SESSION['lang']]; ?></h3>
			<div>map</div>
			<h3><?php echo $title4['title'.$_SESSION['lang']]; ?></h3>
			<p><?php echo $data["adresse"]; ?></p>
			<p><?php echo $data["tel"]; ?></p>
		</div>	
	</div>

	<div class="xl-col-12">
	<!-- galerie -->
		<a href="#" class="galerie xl-col-9 lightboximg">
			<!-- hover -->
			<div class="hover">
				<img src="img/les_vignerons/v3.png" alt="#">
				<p>texte</p>
			</div>
			<!-- fond -->
			<img src="img/les_vignerons/v2.jpg" alt="#" class="xl-col-12">
		</a>
		<p class="xl-col-3"><?php echo $data['citation'.$_SESSION['lang']]; ?></p>	
	</div>

	<!-- INPORT FOOTER -->
	<?php include('include/footer.php'); ?>
	
</body>


</html>





















