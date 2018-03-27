<?php 

	//on recupere le nom du fichier affiche
	$page = explode('/',$_SERVER['PHP_SELF']);

	$nom = $page[count($page) - 1];


	$menus = $mysql->prepare('SELECT * FROM menu');
	$menus->execute();

	//BARRE DE RECHERCHE
	//on initialise la recherche
	$conditions = '1';
	$values =array();

	//si on a recu un formulaire
	if( !empty($_GET)){

		//on test les champs et on complete la condition

		//si les mots clefs ne sont pas vide
		if(!empty($_GET['recherche'])){
			$conditions .= ' AND synopsis LIKE :m';
			$values[':m'] = '%'.$_GET['recherche'].'%';
		}

		//var_dump($_GET);
	}

	//on lance la requete qui cherche les livres
	$search = $mysql->prepare('SELECT * FROM users WHERE '.$conditions);
	$search->execute($values);

 ?>

	<h1 id="logo" class="xl-col-3 l-col-3"><a href="#">LOGO</a></h1>

	<ul id="langue" class="xl-col-1 l-col-1">
		<li><a href="traitement/langue.php?lang=_fr">Fr</a></li>
		<li><a href="traitement/langue.php?lang=_en">En</a></li>
	</ul>

	<nav id="menu" class="xl-col-5 l-col-5">

		<ul>
			<!-- MENU -->
			<?php 
				//on lit les donnés menu de la BD
				while ($menu = $menus->fetch()) {

				//on recupere le page dans la langue de lecture
				$page = $menu['page'.$_SESSION['lang']];
			?>

			<li>
				<a href="<?php echo $menu['link']; ?>" <?php if($nom == $menu['link']){echo 'class="active"';} ?>><?php echo $page; ?></a>
			</li>


			<?php } ?> <!-- fermeture du while php -->

			<!-- BARRE DE RECHERCHE -->
			<?php 
			//on lance la requete qui cherche les textes
			$searchs = $mysql->prepare('SELECT * FROM home_search');
			$searchs->execute();
			$search = $searchs->fetch();
			 ?>
			<form action="index.php" method="GET">
				<p>
					<input type="text" name="recherche" placeholder="<?php echo $search['placeholder'.$_SESSION['lang']]; ?>"/>
					<input type="submit" value="<?php echo $search['button'.$_SESSION['lang']]; ?>" />
				</p>
				
			</form>

		</ul>

	</nav>

	<ul class="xl-col-3 l-col-3 RS">
		<li>
			<a href="#">
				Linked'in
			</a>
		</li>
		<li>
			<a href="#">
				Facebook
			</a>
		</li>
		<li>
			<a href="#">
				Instagram
			</a>
		</li>
	</ul>


	<?php 

	//ADDMAIL	
	// s'il existe la variable d'url mailAdded
	if( isset($_GET['mailAdded'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-success"> Merci pour votre abonnement </p>';
	}

	// s'il existe la variable d'url existingMail
	if( isset($_GET['existingMail'])){
	// on affiche un message pour prevenir l'utilisateur 
	echo '<p class=" alert alert-danger"> Ce mail est déja enregistré ! </p>';
	}

	 ?>

















