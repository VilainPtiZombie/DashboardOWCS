<?php
//Script de traitement du logIn

//on import la config
include('../config/settings.php');

//si on arrive sur cette page sans passer par le formulaire
if( empty($_POST) ){

	//on renvoi vers la page de connexion
	header('Location: ../back/logIn.php');
	exit();

}

//si le pseudo est vide ou le mot de passe est vide
if( empty($_POST['nom']) || empty($_POST['motDePasse']) ){

	//on revoi vers la page de connexion avec un message d'erreur
	header('Location: ../back/logIn.php?logEmpty');
	exit();
}

//on recupere le mot de passe crypte
$pass = crypte($_POST['motDePasse']);

//on cree une requette pour lire les utilisateurs avec ce couple pseudo/passeword
$user = $mysql -> prepare('SELECT * FROM users WHERE pseudo = :pseudo AND password = :password');
$user -> execute(array(
		':pseudo' => $_POST['nom'],
		':password' => $pass
	));

//si il n'y a pas eu de resultat
if( $user->rowCount() ==  0 ){

	//on le renvoi a la page de connexion avec un message d'erreur 
	header('Location: ../back/logIn.php?userUnknow');
	exit();

//sinon
}else{
	$data = $user->fetch();

	//on cree les donnees de session
	$_SESSION['user'] = $_POST['nom'];
	$_SESSION['id'] = $data['id'];
	$_SESSION['level'] = $data['level'];
        $_SESSION['entreprise'] = $data['entreprise'];
        $_SESSION['avancement'] = $data['avancement'];
        $_SESSION['contrat'] = $data['contrat'];
        $_SESSION['drive'] = $data['drive'];
        


	//on le renvoi vers la page d'accueil du back office
	header('Location: ../back/index.php');
	exit();

}//fin du script

session_start();
if (isset($_POST["pseudo"]) && !empty($_POST["pseudo"]) && isset($_POST["password"]) && !empty($_POST["password"]))
$pseudoCo = $_POST['pseudo'];
$passCo = $_POST['password'];
    
    if ( $pseudoCo & $passCo == true ){
       $_SESSION['alerte'] = "<h1> youhou</h1>";
    } 
    else
        {
        $_SESSION['alerte'] = "<h1> zs</h1>";
    };

//test de la maj GIt
// Bien reçu


















