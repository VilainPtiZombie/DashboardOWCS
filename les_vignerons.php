<?php 
	//INPORT SETTINGS
	include('config/settings.php');
 ?>



<!DOCTYPE html>

<head>

	<title>Vinostar | Les Vignerons</title>


	<!-- INPORT HEAD -->
	<?php include('include/head.php'); ?>

</head>

<!-- BODY -->
<body class="container">

	<!-- INPORT HEADER -->
	<?php include('include/header.php'); ?>

	<!-- PAGE CONTENT -->

	<!-- Bloc descriptif des vignerons -->
	<section class="row" id="vignerons">

		<img src="img/les_vignerons/v1.jpg" alt="#" class="xl-col-4" />

		<div class="xl-col-8"> <!-- bloc vignerons -->
			<?php 

				$wtitles = $mysql->prepare('SELECT * FROM winemaker WHERE attribut = :a');
				$wtitles->execute(array(':a' => 'title' ));

				$wtitle = $wtitles->fetch();


				$wbloc1s = $mysql->prepare('SELECT * FROM winemaker WHERE attribut = :a');
				$wbloc1s->execute(array(':a' => 'bloc1' ));

				$wbloc1 = $wbloc1s->fetch();

				$wbloc2s = $mysql->prepare('SELECT * FROM winemaker WHERE attribut = :a');
				$wbloc2s->execute(array(':a' => 'bloc2' ));

				$wbloc2 = $wbloc2s->fetch();

				$cartes = $mysql->prepare('SELECT * FROM winemaker WHERE attribut = :a');
				$cartes->execute(array(':a' => 'carte' ));

				$carte = $cartes->fetch();

			 ?>

			<h2><?php echo $wtitle['title'.$_SESSION['lang']]; ?></h2>

			<div class="row"> <!-- bloc d'alignement -->

				<!-- colonne gauche -->
				<div class="xl-col-6">
					<h3><?php echo $wbloc1['title'.$_SESSION['lang']]; ?></h3>
					<p><?php echo $wbloc1['text'.$_SESSION['lang']]; ?></p>
				</div>

				<!-- colonne droite -->
				<div class="xl-col-6">
					<h3><?php echo $wbloc2['title'.$_SESSION['lang']]; ?></h3>
					<p><?php echo $wbloc2['text'.$_SESSION['lang']]; ?></p>
				</div>

			</div><!-- fin bloc d'alignement -->

			<!-- galerie -->
			<a href="#" class="galerie">
				<!-- hover -->
				<div class="hover">
					<img src="img/les_vignerons/v3.png" alt="#">
					<p><?php echo $wbloc2['button'.$_SESSION['lang']]; ?></p>
				</div>
				<!-- fond -->
				<img src="img/les_vignerons/v2.jpg" alt="#" class="xl-col-12">
			</a>

		</div> <!-- fin bloc vignerons -->
		
	</section>

	<!-- Bloc carte -->
	<section id="carte">

		<!-- carte -->
		<div id="cartehover">
			<!-- hover carte -->
			<div class="xl-col-12 hover">
				<p><?php echo $carte['title'.$_SESSION['lang']]; ?></p>
				<p><?php echo $carte['text'.$_SESSION['lang']]; ?></p>
				<img src="#" alt="#">
			</div>
			<div id="map-canvas" class="#"></div>
		</div>
		
		<!-- Script carte -->
			<script src="https://maps.googleapis.com/maps/api/js"></script>

		    <script>
			    function initialize() {

			        var mapCanvas = document.getElementById('map-canvas');

			        var mapOptions = {
			        	//CENTRAGE MAP
			          	center: new google.maps.LatLng(48.868568, 2.337778),
			          	zoom: 6,
			          	mapTypeId: google.maps.MapTypeId.ROADMAP
			        }

			        var map = new google.maps.Map(mapCanvas, mapOptions)

			        //STYLE
			        var styles = [
					  {
					    "stylers": [
					      { "saturation": -67 },
					      { "hue": "#ffb300" }
					    ]
					  },{
					  },{
					    "featureType": "water",
					    "stylers": [
					      { "hue": "#003bff" },
					      { "saturation": -67 }
					    ]
					  },{
					    "featureType": "administrative"  }
					];

					map.setOptions({styles: styles});


			        //OPTIONS DES MARQUEURS
			        <?php
				        $vignerons = $mysql->prepare('SELECT * FROM vignerons');
						$vignerons->execute();

						$d = 0;
						//on lit les donnés menu de la BD
						while ($vigneron = $vignerons->fetch()) {

						$d++;
					?>

						var markerOptions<?php echo $d ?> = {
					    position: new google.maps.LatLng(<?php echo $vigneron['coordonee']; ?>),
					    map: map
						};

						var marker<?php echo $d ?> = new google.maps.Marker(markerOptions<?php echo $d ?>);
						marker<?php echo $d ?>.setMap(map);
						

						var infoWindowOptions<?php echo $d ?> = {
						    content: '<div id="test"><img src="#" alt="#" class="xl-col-6"/><div class="xl-col-6"><h2><?php echo $vigneron["nom"]; ?></h2><h3><?php echo $vigneron['region']; ?></h3><a href="http://localhost:8888/Vinostar_php/vigneron.php?id=<?php echo $vigneron['id']; ?>">lien</a></div></div>'
						};

						var infoWindow<?php echo $d ?> = new google.maps.InfoWindow(infoWindowOptions<?php echo $d ?>);
						google.maps.event.addListener(marker<?php echo $d ?>,'click',function(e){
						  
						  infoWindow<?php echo $d ?>.open(map, marker<?php echo $d ?>);
						  
						});

					<?php } ?>

			    }

			   	google.maps.event.addDomListener(window, 'load', initialize);

		    </script>

		<!-- listing -->
		<div>
	    	<h2>Les vignerons par région</h2 :>
	    	<!-- GROSSE LISTE ! -->
	    	<ul>
	    		<li class="xl-col-4">
	    			<h3>Alsace</h3>
					<ul>
		    			<?php

				       	//BD
						$alsaces = $mysql->prepare('SELECT * FROM vignerons WHERE region = :a');
						$alsaces->execute(array(':a' => 'alsace' ));

						//on lit les donnés menu de la BD
						while ($alsace = $alsaces->fetch()) {
						?>
							<li>
								<a href="http://localhost:8888/Vinostar_php/vigneron.php?id=<?php echo $alsace['id']; ?>"><?php echo $alsace["nom"]; ?></a>
							</li>

						<?php } ?>
					</ul>
	    		</li>
	    		<li class="xl-col-4">
	    			<h3>Bordeaux</h3>
	    			<ul>
		    			<?php

				       	//BD
						$bordeauxs = $mysql->prepare('SELECT * FROM vignerons WHERE region = :a');
						$bordeauxs->execute(array(':a' => 'bordeaux' ));

						//on lit les donnés menu de la BD
						while ($bordeaux = $bordeauxs->fetch()) {
						?>
							<li>
								<a href="http://localhost:8888/Vinostar_php/vigneron.php?id=<?php echo $bordeaux['id']; ?>"><?php echo $bordeaux["nom"]; ?></a>
							</li>

						<?php } ?>
					</ul>
	    		</li>
	    		<li class="xl-col-4">
	    			<h3>Beaujolais</h3>
	    			<ul>
		    			<?php

				       	//BD
						$beaujolaiss = $mysql->prepare('SELECT * FROM vignerons WHERE region = :a');
						$beaujolaiss->execute(array(':a' => 'beaujolais' ));

						//on lit les donnés menu de la BD
						while ($beaujolais = $beaujolaiss->fetch()) {
						?>
							<li>
								<a href="http://localhost:8888/Vinostar_php/vigneron.php?id=<?php echo $beaujolais['id']; ?>"><?php echo $beaujolais["nom"]; ?></a>
							</li>

						<?php } ?>
					</ul>
	    		</li>
	    		<li class="xl-col-4">
	    			<h3>Bourgogne</h3>
	    			<ul>
		    			<?php

				       	//BD
						$bourgognes = $mysql->prepare('SELECT * FROM vignerons WHERE region = :a');
						$bourgognes->execute(array(':a' => 'bourgogne' ));

						//on lit les donnés menu de la BD
						while ($bourgogne = $bourgognes->fetch()) {
						?>
							<li>
								<a href="http://localhost:8888/Vinostar_php/vigneron.php?id=<?php echo $bourgogne['id']; ?>"><?php echo $bourgogne["nom"]; ?></a>
							</li>

						<?php } ?>
					</ul>
	    		</li>
	    		<li class="xl-col-4">
	    			<h3>Champagne</h3>
	    			<ul>
		    			<?php

				       	//BD
						$champagnes = $mysql->prepare('SELECT * FROM vignerons WHERE region = :a');
						$champagnes->execute(array(':a' => 'champagne' ));

						//on lit les donnés menu de la BD
						while ($champagne = $champagnes->fetch()) {
						?>
							<li>
								<a href="http://localhost:8888/Vinostar_php/vigneron.php?id=<?php echo $champagne['id']; ?>"><?php echo $champagne["nom"]; ?></a>
							</li>

						<?php } ?>
					</ul>
	    		</li>
	    		<li class="xl-col-4">
	    			<h3>Provence | Corse</h3>
	    			<ul>
		    			<?php

				       	//BD
						$pcs = $mysql->prepare('SELECT * FROM vignerons WHERE region = :a');
						$pcs->execute(array(':a' => 'provence' ));

						//on lit les donnés menu de la BD
						while ($pc = $pcs->fetch()) {
						?>
							<li>
								<a href="http://localhost:8888/Vinostar_php/vigneron.php?id=<?php echo $pc['id']; ?>"><?php echo $pc["nom"]; ?></a>
							</li>

						<?php } ?>
					</ul>
	    		</li>
	    		<li class="xl-col-4">
	    			<h3>Jura</h3>
	    			<ul>
		    			<?php

				       	//BD
						$juras = $mysql->prepare('SELECT * FROM vignerons WHERE region = :a');
						$juras->execute(array(':a' => 'jura' ));

						//on lit les donnés menu de la BD
						while ($jura = $juras->fetch()) {
						?>
							<li>
								<a href="http://localhost:8888/Vinostar_php/vigneron.php?id=<?php echo $jura['id']; ?>"><?php echo $jura["nom"]; ?></a>
							</li>

						<?php } ?>
					</ul>
	    		</li>
	    		<li class="xl-col-4">
	    			<h3>Lanquedoc-Rousillion</h3>
	    			<ul>
		    			<?php

				       	//BD
						$lrs = $mysql->prepare('SELECT * FROM vignerons WHERE region = :a');
						$lrs->execute(array(':a' => 'lanquedoc' ));

						//on lit les donnés menu de la BD
						while ($lr = $lrs->fetch()) {
						?>
							<li>
								<a href="http://localhost:8888/Vinostar_php/vigneron.php?id=<?php echo $lr['id']; ?>"><?php echo $lr["nom"]; ?></a>
							</li>

						<?php } ?>
					</ul>
	    		</li>
	    		<li class="xl-col-4">
	    			<h3>Lorraine</h3>
	    			<ul>
		    			<?php

				       	//BD
						$lorraines = $mysql->prepare('SELECT * FROM vignerons WHERE region = :a');
						$lorraines->execute(array(':a' => 'lorraine' ));

						//on lit les donnés menu de la BD
						while ($lorraine = $lorraines->fetch()) {
						?>
							<li>
								<a href="http://localhost:8888/Vinostar_php/vigneron.php?id=<?php echo $lorraine['id']; ?>"><?php echo $lorraine["nom"]; ?></a>
							</li>

						<?php } ?>
					</ul>
	    		</li>
	    		<li class="xl-col-4">
	    			<h3>Loire</h3>
	    			<ul>
		    			<?php

				       	//BD
						$loires = $mysql->prepare('SELECT * FROM vignerons WHERE region = :a');
						$loires->execute(array(':a' => 'loire' ));

						//on lit les donnés menu de la BD
						while ($loire = $loires->fetch()) {
						?>
							<li>
								<a href="http://localhost:8888/Vinostar_php/vigneron.php?id=<?php echo $loire['id']; ?>"><?php echo $loire["nom"]; ?></a>
							</li>

						<?php } ?>
					</ul>
	    		</li>
	    		<li class="xl-col-4">
	    			<h3>Rhône</h3>
	    			<ul>
		    			<?php

				       	//BD
						$rhones = $mysql->prepare('SELECT * FROM vignerons WHERE region = :a');
						$rhones->execute(array(':a' => 'rhône' ));

						//on lit les donnés menu de la BD
						while ($rhone = $rhones->fetch()) {
						?>
							<li>
								<a href="http://localhost:8888/Vinostar_php/vigneron.php?id=<?php echo $rhone['id']; ?>"><?php echo $rhone["nom"]; ?></a>
							</li>

						<?php } ?>
					</ul>
	    		</li>
	    		<li class="xl-col-4">
	    			<h3>Savoie | Bugey</h3>
	    			<ul>
		    			<?php

				       	//BD
						$sbs = $mysql->prepare('SELECT * FROM vignerons WHERE region = :a');
						$sbs->execute(array(':a' => 'savoie' ));

						//on lit les donnés menu de la BD
						while ($sb = $sbs->fetch()) {
						?>
							<li>
								<a href="http://localhost:8888/Vinostar_php/vigneron.php?id=<?php echo $sb['id']; ?>"><?php echo $sb["nom"]; ?></a>
							</li>

						<?php } ?>
					</ul>
	    		</li>
	    		<li class="xl-col-4">
	    			<h3>Sud-Ouest</h3>
	    			<ul>
		    			<?php

				       	//BD
						$sos = $mysql->prepare('SELECT * FROM vignerons WHERE region = :a');
						$sos->execute(array(':a' => 'sudouest' ));

						//on lit les donnés menu de la BD
						while ($so = $sos->fetch()) {
						?>
							<li>
								<a href="http://localhost:8888/Vinostar_php/vigneron.php?id=<?php echo $so['id']; ?>"><?php echo $so["nom"]; ?></a>
							</li>

						<?php } ?>
					</ul>
	    		</li>
	    	</ul>
	    </div>
	</section>












	<!-- INPORT FOOTER -->
	<?php include('include/footer.php'); ?>
	
</body>


</html>
























