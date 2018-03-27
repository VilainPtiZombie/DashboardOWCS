<?php 
	//INPORT SETTINGS
	include('config/settings.php');

	include('include/recordPage.php');

	$menus = $mysql->prepare('SELECT * FROM menu');
	$menus->execute();
	//on lit les donnés menu de la BD
	$menu = $menus->fetch();
	//on recupere le page dans la langue de lecture
	$page = $menu['page'.$_SESSION['lang']];

 ?>



<!DOCTYPE html>

<head>

	<title><?php echo $page; ?></title>


	<!-- INPORT HEAD -->
	<?php include('include/head.php'); ?>

</head>

<!-- BODY -->
<body class="#">

	<!-- INPORT HEADER -->
	<?php include('include/header.php'); ?>

	<!-- PAGE CONTENT -->
	<!-- SLIDER -->
	<div id="slider" class="xl-col-12 l-col-12 m-col-12">

		<ul>
			<?php 

				$slides = $mysql->prepare('SELECT * FROM slider');
				$slides->execute();

				while ($slide = $slides->fetch()) { ?>
					<li>
						<?php echo '<img src="data/slide/'.$slide['image'].'" alt="#">' ?>
						<h2><?php echo $slide['title'.$_SESSION['lang']]; ?></h2>
						<p><?php echo $slide['text'.$_SESSION['lang']]; ?></p>
						<a href="<?php echo $slide['link']; ?>"><?php echo $slide['textlink'.$_SESSION['lang']]; ?></a>
					</li>

			<?php } ?>
		</ul>
		
		<span id="prev" class="icon-chevron-thin-left">gauche</span>
		<span id="next" class="icon-chevron-thin-right">droite</span>
	</div><!-- FIN SLIDER -->


	<!-- A PROPOS | SERVICE | NOUVEAUTES -->
	<div>

		<!-- SOUS MENU TRIADE -->
		<ul id="sous_menu" class="xl-col-4 l-col-4 xl-offset-4 l-offset-4">
			<!-- TITRE -->
			<?php 
				$triade_titles = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
				$triade_titles->execute(array(':a' => 'section_title' ));
				//on lit les donnés menu de la BD
				while ($triade_title = $triade_titles->fetch()) {

				//on recupere le tile dans la langue de lecture
				$title = $triade_title['title'.$_SESSION['lang']];
			?>

			<li>
				<button><?php echo $title; ?></button>
			</li>
			<?php } ?> <!-- fermeture du while php -->
		</ul>

		<!-- A PROPOS -->
		<?php 

			$abouts1 = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
			$abouts1->execute(array(':a' => 'about1' ));

			$about1 = $abouts1->fetch();

			$abouts2 = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
			$abouts2->execute(array(':a' => 'about2' ));

			$about2 = $abouts2->fetch();

		 ?>
		<div id="apropos" class="row xl-col-8 l-col-10 xl-offset-2 l-offset-1">
			<h3 class="xl-col-12 l-col-12">VINOSTAR</h3>
			<!-- COLONNE GAUCHE -->
			<div class="xl-col-6 l-col-6">
				<h4><?php echo $about1['title'.$_SESSION['lang']]; ?></h4>
				<p><?php echo $about1['text'.$_SESSION['lang']]; ?></p>
			</div>
			<!-- COLONNE DROITE -->
			<div class="xl-col-6 l-col-6">
				<h4><?php echo $about2['title'.$_SESSION['lang']]; ?></h4>
				<p><?php echo $about2['text'.$_SESSION['lang']]; ?></p>
			</div>
			<!-- PICTO -->
			<ul id="picto_apropos" class="xl-col-4 l-col-4 xl-offset-4 l-offset-4">
				<li>1</li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
			</ul>
			<!-- BOUTTON -->
			<a class="xl-col-4 l-col-4 xl-offset-4 l-offset-4" href="http://localhost:8888/Vinostar_php/contact.php"><?php echo $about1['button'.$_SESSION['lang']]; ?></a>
		</div><!-- FIN A PROPOS -->	

		<!-- SERVICES -->
		<div id="services" class="row xl-col-8 l-col-10 xl-offset-2 l-offset-1">
			<!-- COLONNE GAUCHE -->
			<?php 

				$service_titles1 = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
				$service_titles1->execute(array(':a' => 'service_title1' ));

				$service_title1 = $service_titles1->fetch();

				$service_1_1 = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
				$service_1_1->execute(array(':a' => 'service_1_1' ));

				$service_1_1 = $service_1_1->fetch();

				$service_1_2 = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
				$service_1_2->execute(array(':a' => 'service_1_2' ));

				$service_1_2 = $service_1_2->fetch();

				$service_1_3 = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
				$service_1_3->execute(array(':a' => 'service_1_3' ));

				$service_1_3 = $service_1_3->fetch();

			 ?>
			<div class="xl-col-4 l-col-4">
				<img src="img/evenementiel.png" alt="#">
				<h3><?php echo $service_title1['title'.$_SESSION['lang']]; ?></h3>
				<h4><?php echo $service_1_1['title'.$_SESSION['lang']]; ?></h4>
				<p><?php echo $service_1_1['text'.$_SESSION['lang']]; ?></p>
				<h4><?php echo $service_1_2['title'.$_SESSION['lang']]; ?></h4>
				<p><?php echo $service_1_2['text'.$_SESSION['lang']]; ?></p>
				<h4><?php echo $service_1_3['title'.$_SESSION['lang']]; ?></h4>
				<p><?php echo $service_1_3['text'.$_SESSION['lang']]; ?></p>
			</div>
			<!-- COLONNE CENTRALE -->
			<?php 

				$service_titles2 = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
				$service_titles2->execute(array(':a' => 'service_title2' ));

				$service_title2 = $service_titles2->fetch();

				$service_2_1 = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
				$service_2_1->execute(array(':a' => 'service_2_1' ));

				$service_2_1 = $service_2_1->fetch();

				$service_2_2 = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
				$service_2_2->execute(array(':a' => 'service_2_2' ));

				$service_2_2 = $service_2_2->fetch();

				$service_2_3 = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
				$service_2_3->execute(array(':a' => 'service_2_3' ));

				$service_2_3 = $service_2_3->fetch();

			 ?>
			<div class="xl-col-4 l-col-4">
				<img src="img/conseils.png" alt="#">
				<h3><?php echo $service_title2['title'.$_SESSION['lang']]; ?></h3>
				<h4><?php echo $service_2_1['title'.$_SESSION['lang']]; ?></h4>
				<p><?php echo $service_2_1['text'.$_SESSION['lang']]; ?></p>
				<h4><?php echo $service_2_2['title'.$_SESSION['lang']]; ?></h4>
				<p><?php echo $service_2_2['text'.$_SESSION['lang']]; ?></p>
				<h4><?php echo $service_2_3['title'.$_SESSION['lang']]; ?></h4>
				<p><?php echo $service_2_3['text'.$_SESSION['lang']]; ?></p>
			</div>
			<!-- COLONNE DROITE -->
			<?php 

				$service_titles3 = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
				$service_titles3->execute(array(':a' => 'service_title3' ));

				$service_title3 = $service_titles3->fetch();

				$service_3_1 = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
				$service_3_1->execute(array(':a' => 'service_3_1' ));

				$service_3_1 = $service_3_1->fetch();

				$service_3_2 = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
				$service_3_2->execute(array(':a' => 'service_3_2' ));

				$service_3_2 = $service_3_2->fetch();

				$service_3_3 = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
				$service_3_3->execute(array(':a' => 'service_3_3' ));

				$service_3_3 = $service_3_3->fetch();

			 ?>
			<div class="xl-col-4 l-col-4">
				<img src="img/vinobox.png" alt="#">
				<h3><?php echo $service_title3['title'.$_SESSION['lang']]; ?></h3>
				<h4><?php echo $service_3_1['title'.$_SESSION['lang']]; ?></h4>
				<p><?php echo $service_3_1['text'.$_SESSION['lang']]; ?></p>
				<h4><?php echo $service_3_2['title'.$_SESSION['lang']]; ?></h4>
				<p><?php echo $service_3_2['text'.$_SESSION['lang']]; ?></p>
				<h4><?php echo $service_3_3['title'.$_SESSION['lang']]; ?></h4>
				<p><?php echo $service_3_3['text'.$_SESSION['lang']]; ?></p>
				<!-- ABONNEZ-VOUS -->
				<form action="traitement/newsletter.php" method="POST">
					<input type="text" placeholder="e-mail" name="newsletter"/>
					<input type="submit" value="envoyer"/>
				</form>
			</div>
		</div><!-- FIN SERVICES -->	

		<!-- NOUVEAUTES -->
		<?php 

				$news_1_1 = $mysql->prepare('SELECT * FROM content WHERE attribut = :a');
				$news_1_1->execute(array(':a' => 'news_title' ));

				$new_1_1 = $news_1_1->fetch();

			 ?>

		<div id="nouveaute" class="row xl-col-8 l-col-10 xl-offset-2 l-offset-1">

			<!-- ABONNEZ-VOUS -->
			<h3 class="xl-col-6 l-col-8 xl-offset-3 l-offset-2"><?php echo $new_1_1['title'.$_SESSION['lang']]; ?></h3>
			<form action="traitement/newsletter.php" method="POST">
				<input class="xl-col-6 l-col-8 xl-offset-3 l-offset-2" type="text" placeholder="e-mail" name="newsletter"/>
				<input type="submit" value="envoyer"/>
			</form>

			<!-- ARTICLES -->
			<?php 

				$articles = $mysql->prepare('SELECT * FROM home_articles ORDER BY created_at');
				$articles->execute();

				while ($article = $articles->fetch()) { ?>

			<article class="xl-col-9 l-col-10 xl-offset-2 l-offset-1">
				<figure class="xl-col-6 l-col-6">
					<?php echo '<img src="data/article/'?><?php echo $article['image']?> <?php echo '"/>'?>
				</figure>

				<div class="xl-col-6 l-col-6">
					<h4><?php echo $article['title'.$_SESSION['lang']]; ?></h4>
					<p><?php echo $article['text'.$_SESSION['lang']]; ?></p>	
				</div>
			</article>

			<?php } ?>
					
		</div><!-- FIN NOUVEAUTES -->

	</div><!-- FIN A PROPOS | SERVICE | NOUVEAUTES -->





	<!-- INPORT FOOTER -->
	<?php include('include/footer.php'); ?>
	
</body>


</html>
























