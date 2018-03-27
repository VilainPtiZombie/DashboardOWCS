<?php 
	//INPORT SETTINGS
	include('config/settings.php');

	//on verifie qu'il existe bien la variable d'URL 'id'
	if( empty($_GET['id'])){
		header('Location: les_vins.php');
	}

	//on cree une requete qui lit un livre
	$vins = $mysql->prepare('SELECT * FROM wine WHERE id = :i ');
	$vins->execute( array( ':i' => $_GET['id']) );

	//s'il n'y a eu aucun match
	if($vins->rowCount() == 0){
		header('Location: les_vins.php');

	//sinon, on lit le resultat
	}else{
		$data = $vins->fetch();
	}
 ?>


<!DOCTYPE html>

<head>

	<title>Vinostar | <?php echo $data["name"]; ?></title>


	<!-- INPORT HEAD -->
	<?php include('include/head.php'); ?>

</head>

<!-- BODY -->
<body class="container">

	<!-- INPORT HEADER -->
	<?php include('include/header.php'); ?>

	<!-- PAGE CONTENT -->

	<section class="wrapper">
		<!-- retour -->
		<?php //mise ici pour economi bd
			$wcold1s = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
			$wcold1s->execute(array(':a' => 'wine_cold1' ));
			$wcold1 = $wcold1s->fetch();

			$wines = $mysql->prepare('SELECT * FROM wine WHERE id = :i');
			$wines->execute(array(':i' => $_GET['id'] ));
			$wine = $wines->fetch();
 		?>
		<a href="http://localhost:8888/Vinostar_php/les_vins.php"><?php echo $wcold1['button'.$_SESSION['lang']]; ?></a>

		<h2><?php echo $data["name"]; ?></h2>

		<!-- Col gauche -->
		<div class="xl-col-5 l-col-5">

			<!-- miniature -->
			<img src="<?php echo vignette($wine['img']); ?>" alt="Vignette de <?php echo $wine['name']; ?>"/>

			<!-- picto -->
			<?php 
				if($wine['ab'] == 1){ ?>

				<img src="img/ab.png" alt="agriculture biologique">
			
			<?php }


				if($wine['bi'] == 1){ ?>

				<img src="img/bi.png" alt="biodynamie">
			
			<?php }

				if($wine['vn'] == 1){ ?>

				<img src="img/vn.png" alt="vin nature">
			
			<?php }

				if($wine['ar'] == 1){ ?>

				<img src="img/ar.png" alt="agriculture raisonée">
			
			<?php }

			 ?>


			<!-- prix -->	
			<p><?php echo $data["prix"]; ?></p>	

			<!-- accompagnement -->
			<?php 
					$wcolgs = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
					$wcolgs->execute(array(':a' => 'wine_colg' ));
					$wcolg = $wcolgs->fetch();
			?>
			<h3><?php echo $wcolg['title'.$_SESSION['lang']]; ?></h3>
			<ul>
				<li>
					<?php 
						if($wine['ap'] == 1){ ?>

						<img src="img/apon.png" alt="aperitif oui">
			
					<?php }else{ ?>
						
						<img src="img/apoff.png" alt="aperitif non">

					<?php } ?>
				</li>
				<li>
					<?php 
						if($wine['vr'] == 1){ ?>

						<img src="img/vron.png" alt="viande rouge oui">
			
					<?php }else{ ?>
						
						<img src="img/vroff.png" alt="viande rouge non">

					<?php } ?>
				</li>
				<li>
					<?php 
						if($wine['g'] == 1){ ?>

						<img src="img/grillon.png" alt="grill oui">
			
					<?php }else{ ?>
						
						<img src="img/grilloff.png" alt="grill non">

					<?php } ?>
				</li>
				<li>
					<?php 
						if($wine['gi'] == 1){ ?>

						<img src="img/gion.png" alt="gibier oui">
			
					<?php }else{ ?>
						
						<img src="img/gioff.png" alt="gibier non">

					<?php } ?>
				</li>
				<li>
					<?php 
						if($wine['vb'] == 1){ ?>

						<img src="img/vbon.png" alt="viande blanche oui">
			
					<?php }else{ ?>
						
						<img src="img/vboff.png" alt="viande blanche non">

					<?php } ?>
				</li>
				<li>
					<?php 
						if($wine['vp'] == 1){ ?>

						<img src="img/vpon.png" alt="viande de porc oui">
			
					<?php }else{ ?>
						
						<img src="img/vpoff.png" alt="viande de porc non">

					<?php } ?>
				</li>
				<li>
					<?php 
						if($wine['po'] == 1){ ?>

						<img src="img/poon.png" alt="poisson oui">
			
					<?php }else{ ?>
						
						<img src="img/pooff.png" alt="poisson non">

					<?php } ?>
				</li>
				<li>
					<?php 
						if($wine['f'] == 1){ ?>

						<img src="img/fon.png" alt="fromage oui">
			
					<?php }else{ ?>
						
						<img src="img/foff.png" alt="fromage non">

					<?php } ?>
				</li>
			</ul>
			<!-- Commande -->
			<a href="#"><?php echo $wcolg['button'.$_SESSION['lang']]; ?></a>
		</div>

		<!-- Col droite -->
		<div class="xl-col-7 l-col-7">

			<!-- Sous menu -->
			<ul id="menuvin">
				<?php 
					$titles = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
					$titles->execute(array(':a' => 'section_wine_title' ));

					//on lit les donnés menu de la BD
					while ($title = $titles->fetch()) {

					//on recupere le title dans la langue de lecture
					$titlee = $title['title'.$_SESSION['lang']];
				?>

				<li>
					<button><?php echo $titlee; ?></button>
				</li>

				<?php } ?> <!-- fermeture du while php -->
			</ul>

			<!-- vin -->
			<div id="vin">

				<!-- arome -->
				<?php
					$wcold2s = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
					$wcold2s->execute(array(':a' => 'wine_cold2' ));
					$wcold2 = $wcold2s->fetch();
				?>
				<h3><?php echo $wcold1['title'.$_SESSION['lang']]; ?></h3>
				<p><?php echo $data['arome'.$_SESSION['lang']]; ?></p>

				<!-- cuvee -->
				<h3><?php echo $wcold2['title'.$_SESSION['lang']]; ?></h3>
				<p><?php echo $data['cuve'.$_SESSION['lang']]; ?></p>

				<!-- Information -->
				<h3>Information</h3>

				<!-- Script jauges -->
					<script src="js/raphael.2.1.0.min.js"></script>
				    <script src="js/justgage.1.0.1.min.js"></script>
				    <script>

				    	var g1, g2, g3, g4, g5, g6, forc, acide, duree, sucre, tanim, persistance;

				    	var forc='<?php echo $data["forc"];?>';

				    	var acide='<?php echo $data["acidite"];?>';

				    	var duree='<?php echo $data["duree"];?>';

				    	var sucre='<?php echo $data["sucre"];?>';

				    	var tanim='<?php echo $data["tanim"];?>';

				    	var persistance='<?php echo $data["persistance"];?>';
				    	

				    	window.onload = function(){
					    	var g1 = new JustGage({
					        id: "g1", 
					        value: forc, 
					        min: 0,
					        max: 100,
					        title: "Force",  
					        gaugeWidthScale: 1,
					        levelColors: ["#e9414f"]           
						    });

						    var g2 = new JustGage({
					        id: "g2", 
					        value: acide, 
					        min: 0,
					        max: 100,
					        title: "Acidité",   
					        gaugeWidthScale: 1,
					        levelColors: ["#e9414f"]           
						    });

						    var g3 = new JustGage({
					        id: "g3", 
					        value: duree, 
					        min: 0,
					        max: 100,
					        title: "Durée",    
					        gaugeWidthScale: 1,
					        levelColors: ["#e9414f"]          
						    });

						    var g4 = new JustGage({
					        id: "g4", 
					        value: sucre, 
					        min: 0,
					        max: 100,
					        title: "Sucre",    
					        gaugeWidthScale: 1,
					        levelColors: ["#e9414f"]           
						    });

						    var g5 = new JustGage({
					        id: "g5", 
					        value: tanim, 
					        min: 0,
					        max: 100,
					        title: "Tanim",   
					        gaugeWidthScale: 1,
					        levelColors: ["#e9414f"]           
						    });

						    var g6 = new JustGage({
					        id: "g6", 
					        value: persistance, 
					        min: 0,
					        max: 100,
					        title: "Persistance",   
					        gaugeWidthScale: 1,
					        levelColors: ["#e9414f"]         
						    });

					      };
				    </script>

				<!-- Jauges -->
				<div id="g1"></div>
				<div id="g2"></div>
				<div id="g3"></div>
				<div id="g4"></div>
				<div id="g5"></div>
				<div id="g6"></div>

			</div>

			<!-- Région -->
			<div id="carte">
				<!-- carte -->
				<div id="map-canvas" class="#"></div>

			
			<!-- Script carte -->
				<script src="https://maps.googleapis.com/maps/api/js"></script>

				<?php //changement de coord map en fonction du vigneron

					$coords = $mysql->prepare('SELECT * FROM vignerons WHERE nom = :a');
					$coords->execute(array(':a' => $wine["vigneron"]));
					$coord = $coords->fetch();

					//var_dump($wine["vigneron"]);
					//var_dump($coord['coordonee']);

				 ?>

				<h3><?php echo $coord["region"]; ?></h3>

			    <script>
				    function initialize() {

				        var mapCanvas = document.getElementById('map-canvas');

				        var mapOptions = {
				        	//CENTRAGE MAP
				          	center: new google.maps.LatLng(<?php echo $coord['coordonee']; ?>),
				          	zoom: 10,
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
			</div>
			
			<!-- Vigneron -->
			<script>

				$(document).ready(function() {
					$("#menuvin li:last button").click(function(){
						document.location.href="les_vignerons.php"
					});
				});
			</script>

		</div>
		
		<!-- retour -->
		<a href="http://localhost:8888/Vinostar_php/les_vins.php"><?php echo $wcold1['button'.$_SESSION['lang']]; ?></a>
		
	</section>
		


	<!-- INPORT FOOTER -->
	<?php include('include/footer.php'); ?>
	
</body>


</html>





















