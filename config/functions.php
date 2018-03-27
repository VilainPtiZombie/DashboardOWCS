<?php

//on cree une fonction qui traduit les dates du format informatique vers le format europeen
//$date correspond a la date a traduire
//$heure correspond a vrai ou faux, si l'on veut avoir l'heure
//par defaut, on n'affiche pas l'heure
function dateEU($date, $heure = false){

	//si la date est vide
	if( $date == ''){
		return 'nc';
	}else{
		//on construit l'objet temps qui correspond a la date qu'on veut
		$t = new DateTime($date);

		//si on veut l'heure (ie si $heure vaut true)
		if($heure){

			//on retourne avec le format qui contient l'heure
			return date_format($t, 'd/m/Y, à H:i:s');
		//sinon
		}else{

			//on retourne le format sans l'heure
			return date_format($t, 'd/m/Y');

		//fin du test
		}
	}
}


//on cree un fonction qui calcul le chemin vers le fichier image a afficher
function vignette($vignette, $back = false){
	$chemin ='';

	//si on est sur le backoffice
	if($back){
		$chemin = '../';
	}

	//si $vignette est vide 
	if( $vignette == '')

		//on donne l'adresse de empty
		return $chemin.'img/vignetteempty.jpg';
	//sinon
	else

		//on donne l'adresse du fichier image
		return $chemin.'data/wine/vignette/'.$vignette;
}

//on cree un fonction qui calcul le chemin vers le fichier image a afficher
function imgwine($imgwine, $back = false){
	$chemin1 ='';

	//si on est sur le backoffice
	if($back){
		$chemin1 = '../';
	}

	//si $imgwine est vide 
	if( $imgwine == '')

		//on donne l'adresse de empty
		return $chemin1.'img/imgwineempty.jpg';
	//sinon
	else

		//on donne l'adresse du fichier image
		return $chemin1.'data/wine/img/'.$imgwine;
}


//on cree une fonction qui crypte, salt et recrypte une chaine de caractere passee en parametre
function crypte($mot){

	//$crypt1 = hash('sha512', $mot);
	//$salt = $crypt1.'chat';
	//$crypt2 = hash('sha512', $salt);

	//return $crypt2;

	//equivalent
	return hash('sha512', hash('sha512', $mot).'chat');
}



































