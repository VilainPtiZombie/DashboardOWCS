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
<body class="container">

	<!-- INPORT HEADER -->
	<?php include('include/header.php'); ?>

	<!-- PAGE CONTENT -->
	<section>
		<h2>Nouveauté</h2>
		<ul class="row">

			<!-- VIN NEWS -->
			<?php 

				$winenews = $mysql->prepare('SELECT * FROM wine WHERE attribut = :a');
				$winenews->execute(array(':a' => 'new' ));
				//on lit les donnés menu de la BD
				while ($winenew = $winenews->fetch()) {
			?>

			<li class="xl-col-3 l-col-3 m-col-3">
				<!-- miniature vin -->
				<a href="http://localhost:8888/Vinostar_php/vin.php?id=<?php echo $winenew['id']; ?>">

					<img src="<?php echo vignette($winenew['img']); ?>" alt="Vignette de <?php echo $winenew['name']; ?>"/>

					<!-- hover -->
					<div>
						<p><?php echo $winenew['name']; ?></p>
						<p><?php echo $winenew['region']; ?></p>
						<p><?php echo $winenew['year']; ?></p>	
					</div>
				</a>
			</li>

			<?php } ?> <!-- fermeture du while php -->
		</ul>		
	</section>


	<section id='vins'>

		<h2>Nos vins</h2>

		<!-- Recherche de vins -->
		<form method="GET" action="#vins">

			<label for="robe">Robe</label>

			<select name="robe" size="1">
				<option selected="selected"></option>
				<?php 

					$robes = $mysql->prepare('SELECT DISTINCT robe FROM wine');
					$robes->execute();

					while ($robe = $robes->fetch()) {
				?>
					<option>
						<?php echo $robe['robe']; ?>
					</option>

				<?php } ?>
			</select>

			<label for="region">Region</label>

			<select name="region" size="1">
				<option selected="selected"></option>
				<?php 

					$regions = $mysql->prepare('SELECT DISTINCT region FROM wine');
					$regions->execute();

					while ($region = $regions->fetch()) {
				?>
					<option>
						<?php echo $region['region']; ?>
					</option>

				<?php } ?>
			</select>

			<label for="year">Année</label>

			<select name="year" size="1">
				<option selected="selected"></option>
				<?php 

					$years = $mysql->prepare('SELECT DISTINCT year FROM wine');
					$years->execute();

					while ($year = $years->fetch()) {
				?>
					<option>
						<?php echo $year['year']; ?>
					</option>

				<?php } ?>
			</select>
			<input type="submit" value="OK" />
		</form>

		<ul class="row">

			<?php //script recherche

				//on initialise la recherche
				$conditions = '1';
				$values =array();

				if(empty($_GET)){ // si pas de form on affiche toute la liste

					$wines = $mysql->prepare('SELECT * FROM wine');
					$wines->execute();

				}else{

					//on test les champs et on complete la condition

					//si le robe n'est pas vide
					if(!empty($_GET['robe'])){
						$conditions .= ' AND robe LIKE :r';
						$values[':r'] = '%'.$_GET['robe'].'%';
					}

					//si la region n'est pas vide
					if(!empty($_GET['region'])){
						$conditions .= ' AND region LIKE :re';
						$values[':re'] = '%'.$_GET['region'].'%';
					}

					//si les mots l'année n'est pas vide
					if(!empty($_GET['year'])){
						$conditions .= ' AND year LIKE :y';
						$values[':y'] = '%'.$_GET['year'];
					}

					//on lance la requete qui cherche les vins
					$wines = $mysql->prepare('SELECT * FROM wine WHERE '.$conditions);
					$wines->execute($values);
				}


				//s'il n'y a pas eu de résultats
				if( $wines->rowcount() == 0){
					echo '<p>Aucun résultat pour cette recherche</p>';

				}else{//s'il y a eu des resultats

					while ($data = $wines->fetch()) {
					?>

					<li class="xl-col-3 l-col-3 m-col-3">
						<!-- miniature vin -->
						<a href="http://localhost:8888/Vinostar_php/vin.php?id=<?php echo $data['id']; ?>">

							<img src="<?php echo vignette($data['img']); ?>" alt="Vignette de <?php echo $data['name']; ?>"/>

							<!-- hover -->
							<div>
								<p><?php echo $data['name']; ?></p>
								<p><?php echo $data['region']; ?></p>
								<p><?php echo $data['year']; ?></p>	
							</div>
						</a>
					</li>

					<?php
					}
				}
			?>	<!-- FIN PHP -->
		</ul>
	</section>


	<!-- INPORT FOOTER -->
	<?php include('include/footer.php'); ?>
	
</body>


</html>
























