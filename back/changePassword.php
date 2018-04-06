<?php
//Script de traitement du changement de mot de passe

//on import la config
include('../config/settings.php');

// si l'utilisateur n'est pas connecté
if(empty($_SESSION['user'])){

	//on le renvoi vers la page de connexion
	header('Location: logIn.php');
}

//si on arrive sur cette page sans passer par le formulaire
if( empty($_POST) ){

	//on renvoi vers la page de changement de mot de passe
	header('Location: ../back/adduser.php');
	exit();

}

$mdpChange = $mysql->prepare('SELECT * FROM users');
$mdpChange->execute();

//

while($mdpChanged = $mdpChange->fetch());

echo($_POST['id']);
echo($_POST['oldPass']);
echo($_POST['Npassword']);
echo($_POST['confirmPassword']);
//on verifie que l'utilisateur a bien donné l'ancien mot de passe
$verif = $mysql->prepare('SELECT * FROM users WHERE id = :i AND password = :p');
$verif->execute(array(
		':i' => $_POST['id'],
		':p' => crypte($_POST['oldPass'])
	));


//si il n'y a pas eu de resultat
if( $verif->rowCount() ==  0 ){

	//on le renvoi a la page de connexion avec un message d'erreur 
	//header('Location: ../back/adduser.php?passwordUnknow');
	exit();
}

//si le nouveau mot de passe est vide
if(empty($_POST['Npassword'])){
	header('Location: ../back/adduser.php?passwordEmpty');
	exit();
}

//on verifie que le nouveau mot de passe et la confirmation sont identique
if($_POST['Npassword'] != $_POST['confirmPassword']){
	header('Location: ../back/adduser.php?confirmationPassword');
	exit();
}else{

//on modifie la bd
$modif = $mysql->prepare('UPDATE users SET password = :p WHERE id = :i');
$modif->execute(array(':i'=>$_POST['id'],':p'=>crypte($_POST['Npassword'])));

//on le renvoi vers la page d'accueil du back office
header('Location: ../back/index.php');
exit();

}//fin du script






















