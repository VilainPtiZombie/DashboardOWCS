<?php 
	//INPORT SETTINGS
	include('../config/settings.php');

	// si l'utilisateur n'est pas connecté
	if(empty($_SESSION['user'])){
		//on le renvoi vers la page de connexion
		header('Location: logIn.php');
		exit;
	}

	//si l'utilisateur n'est pas admin
	if($_SESSION['level'] == 'user'){
		header('Location: index.php');
		exit();
	}


	//on cree un requete qui lit les livres et les collones selectionnées
	$users = $mysql->prepare('SELECT * FROM users ORDER BY pseudo ASC');
	$users->execute();

 ?>



<!DOCTYPE html>

<head>

	<title>Administrer les utilisateurs - Back Office</title>


	<!-- INPORT HEAD -->
	<?php include('../include/head_back.php'); ?>

</head>

<!-- BODY -->
<body class="container">

	<!-- INPORT HEADER -->
	<?php include('../include/header_back.php'); ?>


	<h2 class="page-header"> Administrer les utilisateurs</h2>

	<form action="../traitement/addUser.php" method="POST" class="col-md-6">
		<h3>Ajouter un nouvel utilisateur</h3>

		<label for="pseudo">Le nouveau pseudo</label>
		<p>
			<input type="text" name="pseudo" placeholder="Pseudo" value="<?php if(!empty($_GET['pseudo'])) echo $_GET['pseudo']; ?>" />
		</p>

		<label for="password">Le nouveau mot de passe</label>
		<p>
			<input type="password" name="password" placeholder="Mot de passe" value="<?php if(!empty($_GET['password'])) echo $_GET['password']; ?>" />
		</p>

		<label for="levelselect">Le rang du nouvel utilisateur</label>
		<p>
			<select name="levelselect" id="levelselect">
					<option value="user">Clients</option>
					<option value="admin">Administrateur</option>			
			</select>
		</p>

		<p>
			<input type="submit" value="Ajouter"/>
		</p>
	</form>

	<article class="col-md-6">
		<h3>Liste des utilisateurs actuels</h3>	
		<table class="table table-striped">
		<tr>
			<th>Pseudo</th>
			<th>Date d'enregistrement</th>
			<th>Grade</th>
			<th>Supprimer</th>
		</tr>

		<?php 
		//on lit les résultats les uns après les autres
		while($data = $users->fetch()){ ?>

			<tr>
				<td><?php echo $data['pseudo']; ?></td>
				<td><?php echo dateEU($data['created_at'],true); ?></td>
				<td><?php echo $data['level']; ?></td>
				<td>
					<?php //si l'utilisateur n'est pas superadmin, on ajoute le lien de suppression
					if($data['level'] != 'superadmin'){
						echo '(<a href="../traitement/deleteUser.php?id='.$data['id'].'">Supprimer</a>)';
					} ?>
				</td>
			</tr>

		<?php
		} // fin while
		 ?>

		</table>
	</article>




	<!-- INPORT FOOTER -->
	<?php include('../include/footer_back.php'); ?>
	
</body>


</html>
























