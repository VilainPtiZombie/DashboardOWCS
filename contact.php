<?php 
	//INPORT SETTINGS
	include('config/settings.php');

 ?>



<!DOCTYPE html>

<head>

	<title>Vinostar | Home</title>


	<!-- INPORT HEAD -->
	<?php include('include/head.php'); ?>

</head>

<!-- BODY -->
<body class="wrapper">

	<!-- INPORT HEADER -->
	<?php include('include/header.php'); ?>

	<!-- PAGE CONTENT -->

	<section >

		
		

		<form action="#" method="POST" id="formulaire">


			<div class="row">
				<label class="" for="nom_prenom">Nom/Prénom</label>
				<label class="" for="mail">Adresse mail</label>
				<label class="" for="objet">Objet</label>
			</div>

				<input class="" type="text" name="nom_prenom" placeholder="Alain ROSENBERG"/><input class="" type="text" name="mail" placeholder="alain.rosenberg@gmail.com"/><input class="" type="text" name="objet" placeholder="Demande de vins"/>


			<label for="message">Message</label>

			<div class="row">
				<textarea   name="message" id="" cols="30" rows="10"></textarea>

				<div id="contactinfo">
					<h2>Contactez Mila</h2>
					<p>+33 (0)6 45 32 90 62</p>
					<p>9 Avenue de Triatlon</p>
					<p>75 000 PARIS</p>
					<p>vinostar@gmail.com</p>
				</div>
			</div>

			<input class="xl-col-4" type="submit" name="envoyer" value="envoyer">
		</form>
	</section>



	<!-- INPORT FOOTER -->
	<?php include('include/footer.php'); ?>
	
</body>


</html>
























