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

	<title>Ajouter un vin - Back Office</title>


	<!-- INPORT HEAD -->
	<?php include('../include/head_back.php'); ?>

</head>

<!-- BODY -->
<body class="container">

	<!-- INPORT HEADER -->
	<?php include('../include/header_back.php'); ?>

	<h2 class="page-header"> Ajouter un vin</h2>

			
	<form action="../traitement/addWine.php" method="POST" enctype="multipart/form-data" class="col-md-6">

		<!-- Nom du vin -->
		<p>
			<input type="text" name="name" placeholder="Le nom" value="<?php if(!empty($_GET['name'])) echo $_GET['name']; ?>" />
		</p>


		<!-- Affichage dans la gallerie nouveauté -->
		<p>
			<input type="radio" name="attribut" id="new" value="new" <?php if( !isset($_GET['attribut']) || $_GET['attribut'] == 'new') echo 'checked'; ?> />
			<label for="new">Nouveauté</label>

			<input type="radio" name="attribut" id="normal" value="normal" <?php if( !isset($_GET['attribut']) || $_GET['attribut'] == 'normal') echo 'checked'; ?>/>
			<label for="normal">Normal</label>
		</p>			

		<!-- Choix du type de robe -->
		<p>
			<input type="radio" name="robe" id="rouge" value="rouge" <?php if( !isset($_GET['robe']) || $_GET['robe'] == 'rouge') echo 'checked'; ?> />
			<label for="rouge">Rouge</label>

			<input type="radio" name="robe" id="blanc" value="blanc" <?php if( !isset($_GET['robe']) || $_GET['robe'] == 'blanc') echo 'checked'; ?>/>
			<label for="blanc">Blanc</label>

			<input type="radio" name="robe" id="rosee" value="rosée" <?php if( !isset($_GET['robe']) || $_GET['robe'] == 'rosse') echo 'checked'; ?>/>
			<label for="rosee">Rosée</label>

			<input type="radio" name="robe" id="champagne" value="champagne" <?php if( !isset($_GET['robe']) || $_GET['robe'] == 'champagne') echo 'checked'; ?>/>
			<label for="champagne">Champagne</label>
		</p>

		<!-- Choix des label -->
		<p>
			<!-- Agriculture biologique -->
			<label for="ab">Agriculture Biologique</label>
			<input type="checkbox" name="ab"<?php if(!empty($_GET['ab'])) echo $_GET['ab']; ?>/>

			<!-- Biodynamie -->
			<label for="bi">Biodynamie</label>
			<input type="checkbox" name="bi"<?php if(!empty($_GET['bi'])) echo $_GET['bi']; ?>/>

			<!-- Vin nature -->
			<label for="vn">Vin Nature</label>
			<input type="checkbox" name="vn"<?php if(!empty($_GET['vn'])) echo $_GET['vn']; ?>/>

			<!-- Agriculture raisonnee -->
			<label for="ar">Agriculture Raisonnée</label>
			<input type="checkbox" name="ar"<?php if(!empty($_GET['vn'])) echo $_GET['vn']; ?>/>
		</p>

		<!-- Choix des accompagnements -->
		<p>
			<!-- Aperitif -->
			<label for="ap">Apéritif</label>
			<input type="checkbox" name="ap"<?php if(!empty($_GET['ap'])) echo $_GET['ap']; ?>/>

			<!-- Viande rouge -->
			<label for="vr">Viande Rouge</label>
			<input type="checkbox" name="vr"<?php if(!empty($_GET['vr'])) echo $_GET['vr']; ?>/>

			<!-- Grill -->
			<label for="g">Grill</label>
			<input type="checkbox" name="g"<?php if(!empty($_GET['g'])) echo $_GET['g']; ?>/>

			<!-- Gibier -->
			<label for="gi">Gibier</label>
			<input type="checkbox" name="gi"<?php if(!empty($_GET['gi'])) echo $_GET['gi']; ?>/>

			<!-- Viande blanche -->
			<label for="vb">Viande Blanche</label>
  			<input type="checkbox" name="vb"<?php if(!empty($_GET['vb'])) echo $_GET['vb']; ?>/>

  			<!-- Viande de porc -->
  			<label for="vp">Viande de Porc</label>
  			<input type="checkbox" name="vp"<?php if(!empty($_GET['vp'])) echo $_GET['vp']; ?>/>

  			<!-- Poisson -->
  			<label for="po">Poisson</label>
  			<input type="checkbox" name="po"<?php if(!empty($_GET['po'])) echo $_GET['po']; ?>/>

  			<!-- Fromage -->
  			<label for="f">Fromage</label>
  			<input type="checkbox" name="f"<?php if(!empty($_GET['f'])) echo $_GET['f']; ?>/>
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
				<option selected="selected"><?php if(!empty($_GET['vigneronid'])) echo $_GET['vigneronid']; ?></option>
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
				<option selected="selected"><?php if(!empty($_GET['region'])) echo $_GET['region']; ?></option>
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
			<input type="number" name="year" min="0" max="<?php echo date("Y"); ?>" value="<?php if(!empty($_GET['year'])) echo $_GET['year']; ?>">
		</p>

		<!-- PRIX -->
		<p>
			<label for="prix">Prix en €</label>
			<input type="number" name="prix" min="0" max="99999" value="<?php if(!empty($_GET['prix'])) echo $_GET['prix']; ?>">
		</p>


		<!-- AROME -->
		<p>
			<!-- FR -->
			<label for="arome_fr">Arome en francais</label>
			<textarea name="arome_fr" id="arome_fr"><?php if(!empty($_GET['arome_fr'])) echo $_GET['arome_fr']; ?></textarea>
			<!-- EN -->
			<label for="arome_en">Arome en anglais</label>
			<textarea name="arome_en" id="arome_en"><?php if(!empty($_GET['arome_en'])) echo $_GET['arome_en']; ?></textarea>
		</p>

		<!-- CUVEE -->
		<p>
			<!-- FR -->
			<label for="cuve_fr">Cuvée en francais</label>
			<textarea name="cuve_fr" id="cuve_fr"><?php if(!empty($_GET['cuve_fr'])) echo $_GET['cuve_fr']; ?></textarea>
			<!-- EN -->
			<label for="cuve_en">Cuvée en anglais</label>
			<textarea name="cuve_en" id="cuve_en"><?php if(!empty($_GET['cuve_en'])) echo $_GET['cuve_en']; ?></textarea>
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

	<!-- INPORT FOOTER -->
	<?php include('../include/footer_back.php'); ?>
	
</body>


</html>
























