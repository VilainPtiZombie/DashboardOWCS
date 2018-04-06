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

	<form action="../traitement/addUser.php" method="POST" class="col-lg-6" form-inline">
		<h3 class="col-lg-12">Ajouter un nouvel utilisateur</h3>
                <input id="inlineFormInput" class="form-control col-2" type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>" />
		
                <label id="inlineFormInput" class="col-lg-3" for="pseudo">
			<input class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" type="text" name="pseudo" placeholder="Pseudo" />
		</label>

		<label id="inlineFormInput" class="col-lg-3"  for="password">
			<input class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" type="password" name="password" placeholder="Mot de passe" />
		</label>

		<label id="inlineFormInput" class="col-lg-3"  for="entreprise">
			<input class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" type="text" name="entreprise" placeholder="Entreprise" />
		</label>

		<label id="inlineFormInput" class="col-lg-3"  for="Contrat">
			<input class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" type="text" name="contrat" placeholder="Contrat" />
		</label>
                <label id="inlineFormInput" class="col-lg-3" for="avancement">
			<input class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" type="text" name="avancement" placeholder="Avancement" />
		</label>

		<label id="inlineFormInput" class="col-lg-3" for="Drive">
			<input class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" type="text" name="drive" placeholder="Url Drive" />
		</label>
                
		<label id="inlineFormInput" class="col-lg-3" for="levelselect">
			<select class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" name="levelselect" id="levelselect">
					<option value="user">Clients</option>
					<option value="admin">Administrateur</option>			
			</select>
                </label>

		<label id="inlineFormInput" class="col-lg-3" >
			<input class="form-control mb-2 mr-sm-2 mb-sm-0 btn btn-info " id="inlineFormInput" type="submit" value="Ajouter"/>
		</label>
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
					if($data['level'] != 'clients'){
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
























