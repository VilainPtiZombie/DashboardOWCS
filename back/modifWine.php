<?php 
	//INPORT SETTINGS
	include('../config/settings.php');

	// si l'utilisateur n'est pas connecté
	if(empty($_SESSION['user'])){


		//on le renvoi vers la page de connexion
		header('Location: logIn.php');
	}

	// s"il y a pas d'id
	if(empty($_GET['id'])){
		//on le renvoi vers la page de connexion
		header('Location: index.php');
		exit();
	}

	//on cree une requete pour chercher le livre
	$wine = $mysql->prepare('SELECT * FROM wine WHERE id = :i ');
	$wine->execute( array( ':i' => $_GET['id']) );

	//s'il n'y a eu aucun match
	if($wine->rowCount() == 0){
		header('Location: index.php');
		exit();

	//sinon, on lit le resultat
	}else{
		$data = $wine->fetch();
	}

 ?>



<!DOCTYPE html>

<head>

	<title>Modifier un vin - Back Office</title>


	<!-- INPORT HEAD -->
	<?php include('../include/head_back.php'); ?>

</head>

<!-- BODY -->
<body class="container">

	<!-- INPORT HEADER -->
	<?php include('../include/header_back.php'); ?>


	<h2 class="page-header"> Modifier un vin</h2>

	<article class="row">
		<!-- Vignette du vin -->
		<figure class="col-md-6">

			<h3>Vignette</h3>
			<img class="imgarti" src="<?php echo vignette($data['img'], $back = true); ?>" alt="Vignette de <?php echo $data['name']; ?>"/>

			<h3>Image</h3>
			<img class="imgarti" src="<?php echo imgwine($data['imgwine'], $back = true); ?>" alt="Vignette de <?php echo $data['imgwine']; ?>"/>

		</figure>		
		<form action="../traitement/modifWine.php" method="POST" enctype="multipart/form-data" class="col-md-6">
			<input type="hidden" name="id" value="<?php echo $data['id']; ?>" /> <!-- pour retrouver l'ID dans le traitement -->

			<!-- Nom du vin -->
			<p>
				<input type="text" name="name" placeholder="Le nom" value="<?php echo $data['name']; ?>" />
			</p>

			<!-- Affichage dans la gallerie nouveauté -->
			<p>
				<input type="radio" name="attribut" id="new" value="new" <?php if( $data['attribut'] == 'new') echo 'checked'; ?> />
				<label for="new">Nouveauté</label>

				<input type="radio" name="attribut" id="normal" value="normal" <?php if( $data['attribut'] == 'normal') echo 'checked'; ?>/>
				<label for="normal">Normal</label>
			</p>			

			<!-- Choix du type de robe -->
			<p>
				<input type="radio" name="robe" id="rouge" value="rouge" <?php if( $data['robe'] == 'rouge') echo 'checked'; ?> />
				<label for="rouge">Rouge</label>

				<input type="radio" name="robe" id="blanc" value="blanc" <?php if( $data['robe'] == 'blanc') echo 'checked'; ?>/>
				<label for="blanc">Blanc</label>

				<input type="radio" name="robe" id="rosee" value="rosée" <?php if( $data['robe'] == 'rosée') echo 'checked'; ?>/>
				<label for="rosee">Rosée</label>

				<input type="radio" name="robe" id="champagne" value="champagne" <?php if( $data['robe'] == 'champagne') echo 'checked'; ?>/>
				<label for="champagne">Champagne</label>
			</p>

			<!-- Choix des label -->
			<p>
				<!-- Agriculture biologique -->
				<label for="ab">Agriculture Biologique</label>
				<input type="checkbox" name="ab"<?php if( $data['ab'] == '1') echo 'checked'; ?>/>

				<!-- Biodynamie -->
				<label for="bi">Biodynamie</label>
				<input type="checkbox" name="bi"<?php if( $data['bi'] == '1') echo 'checked'; ?>/>

				<!-- Vin nature -->
				<label for="vn">Vin Nature</label>
				<input type="checkbox" name="vn"<?php if( $data['vn'] == '1') echo 'checked'; ?>/>

				<!-- Agriculture raisonnee -->
				<label for="ar">Agriculture Raisonnée</label>
				<input type="checkbox" name="ar"<?php if( $data['ar'] == '1') echo 'checked'; ?>/>
			</p>

			<!-- Choix des accompagnements -->
			<p>
				<!-- Aperitif -->
				<label for="ap">Apéritif</label>
				<input type="checkbox" name="ap"<?php if( $data['ap'] == '1') echo 'checked'; ?>/>

				<!-- Viande rouge -->
				<label for="vr">Viande Rouge</label>
				<input type="checkbox" name="vr"<?php if( $data['vr'] == '1') echo 'checked'; ?>/>

				<!-- Grill -->
				<label for="g">Grill</label>
				<input type="checkbox" name="g"<?php if( $data['g'] == '1') echo 'checked'; ?>/>

				<!-- Gibier -->
				<label for="gi">Gibier</label>
				<input type="checkbox" name="gi"<?php if( $data['gi'] == '1') echo 'checked'; ?>/>

				<!-- Viande blanche -->
				<label for="vb">Viande Blanche</label>
	  			<input type="checkbox" name="vb"<?php if( $data['vb'] == '1') echo 'checked'; ?>/>

	  			<!-- Viande de porc -->
	  			<label for="vp">Viande de Porc</label>
	  			<input type="checkbox" name="vp"<?php if( $data['vp'] == '1') echo 'checked'; ?>/>

	  			<!-- Poisson -->
	  			<label for="po">Poisson</label>
	  			<input type="checkbox" name="po"<?php if( $data['po'] == '1') echo 'checked'; ?>/>

	  			<!-- Fromage -->
	  			<label for="f">Fromage</label>
	  			<input type="checkbox" name="f"<?php if( $data['f'] == '1') echo 'checked'; ?>/>
  			</p>

  			<!-- Choix des jauges -->
			<p>
				<!-- Force -->
				<label for="forc">Force</label>
				<input type="range" name="forc" min="0" max="100"/>

				<!-- Acidite -->
				<label for="acidite">Acidité</label>
				<input type="range" name="acidite" min="0" max="100"/>

				<!-- Duree -->
				<label for="duree">Durée</label>
				<input type="range" name="duree" min="0" max="100"/>

				<!-- Duree -->
				<label for="sucre">Sucre</label>
				<input type="range" name="sucre" min="0" max="100"/>

				<!-- Tanim -->
				<label for="tanim">Tanim</label>
				<input type="range" name="tanim" min="0" max="100"/>

				<!-- Tanim -->
				<label for="persistance">Persistance</label>
				<input type="range" name="persistance" min="0" max="100"/>
			</p>

			<!-- Choix du vigneron -->
			<p>
				<label for="vigneronid">Vigneron</label>
				<select name="vigneronid" size="1">
					<option selected="selected"><?php echo $data['vigneron']; ?></option>
					<?php 

						$vignerons = $mysql->prepare('SELECT DISTINCT nom FROM vignerons');
						$vignerons->execute();

						while ($vigneron = $vignerons->fetch()) {
					?>
						<option>

							<?php echo $vigneron["nom"]; ?>
						</option>

					<?php } ?>
				</select>
			</p>

			<!-- Choix de la region -->
			<p>
				<label for="region">Région</label>
				<select name="region" size="1">
					<option selected="selected"><?php echo $data['region']; ?></option>
					<option>Alsace</option>
					<option>Bourgogne</option>
					<option>Lorraine</option>
					<option>Savoie | Bugey</option>
					<option>Bordeaux</option>
					<option>Champagne</option>
					<option>Jura</option>
					<option>Loire</option>
					<option>Sud-Ouest</option>
					<option>Beaujolais</option>
					<option>Provence | Corse</option>
					<option>Lanquedoc-Rousillion</option>
					<option>Rhône</option>		
				</select>
			</p>

			<!-- ANNEE -->
			<p>
				<label for="year">Année</label>
				<input type="number" name="year" min="0" max="<?php echo date("Y"); ?>" value="<?php echo $data['year']; ?>">
			</p>

			<!-- PRIX -->
			<p>
				<label for="prix">Prix en €</label>
				<input type="number" name="prix" min="0" max="99999" value="<?php echo $data['prix']; ?>">
			</p>


			<!-- AROME -->
			<p>
				<!-- FR -->
				<label for="arome_fr">Arome en francais</label>
				<textarea name="arome_fr" id="arome_fr"><?php echo $data['arome_fr']; ?></textarea>
				<!-- EN -->
				<label for="arome_en">Arome en anglais</label>
				<textarea name="arome_en" id="arome_en"><?php echo $data['arome_en']; ?></textarea>
			</p>

			<!-- CUVEE -->
			<p>
				<!-- FR -->
				<label for="cuve_fr">Cuvée en francais</label>
				<textarea name="cuve_fr" id="cuve_fr"><?php echo $data['cuve_fr']; ?></textarea>
				<!-- EN -->
				<label for="cuve_en">Cuvée en anglais</label>
				<textarea name="cuve_en" id="cuve_en"><?php echo $data['cuve_en']; ?></textarea>
			</p>

			<!-- Traitement vignette -->
			<p>
				<label for="vignette">Vignette du vin</label>
				<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
				<!-- value est la taille en octet ici 1mo -->
				<input type="file" name="vignette">
				(1Mo max, 400x400 px, format autorisé : jpg, jpeg, png ou gif)
			</p>

			<!-- Traitement img -->
			<p>
				<label for="imggauche">Image pour le vin</label>
				<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
				<!-- value est la taille en octet ici 1mo -->
				<input type="file" name="imggauche">
				(1Mo max, format autorisé : jpg, jpeg, png ou gif)
			</p>

			<p>
				<input type="submit" value="Modifier"/>
			</p>

		</form>

	</article>


	<!-- INPORT FOOTER -->
	<?php include('../include/footer_back.php'); ?>
	
</body>


</html>
























