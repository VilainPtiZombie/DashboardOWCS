$(document).ready(function() {
	
	//SLIDER
	//variables
	var nbli = $("#slider li").length;//nombre li
	var lslide = nbli * 100 + '%';//taille li %

	//calculs
	$("#slider li").css({width: (100/nbli + '%')});
	$("#slider ul").css({width: (lslide)});
	
	//fonction GAUCHE
	function defile() {
		//anti spam
		$("span").addClass("occupe");
		//transition
		$("#slider ul").animate({left:- 100 + '%'},2000,function(){
			$("#slider ul li:last").after($("#slider ul li:first"));
			$("#slider ul").css({left:0});
			//anti spam out
			$("span").removeClass("occupe");
		});
	}

	//fonction DROITE
	function defileRight() {
		//anti spam
		$("span").addClass("occupe");
		//transition
		$("#slider ul").css({left:- 100 + '%'});
		$("#slider ul li:first").before($("#slider ul li:last"));
		//function en troisème argument car sinon il execute tout les codes en meme temps
		$("#slider ul").animate({left:0},2000,function(){
			//Trouver et changer le texte de legende
			$("#slider div:first").fadeIn(3000);
			$("span").removeClass("occupe");
		});
		
	}

	//AUTOMATISME
	var mavar = setInterval(defile,5000);
	//stoper le defilement lorsque l'utilisateur survol le carrousel
	$("#slider").mouseenter(function(){
		clearInterval(mavar);
	});
	//redémarer le defilement lorsque l'utilisateur quitte le carrousel
	$("#slider").mouseleave(function(){
		mavar = setInterval(defile,5000);
	});

	//BOUTON SLIDER
	//defilement vers la gauche #next
	$("#next").click(function(){
		if(!$(this).hasClass("occupe")) {// if(!$ "si il n'y a pas"
			defile();
		}
	});
	//defilement vers la droite #prev
	$("#prev").click(function(){
		if(!$(this).hasClass("occupe")) {
			defileRight();
		}
	});
	// FIN SLIDER


	// TRIADE APROPOS SERVICES NOUVEAUTE
	$("#sous_menu li:first button").click(function(){
		$("#apropos").fadeIn(800);
		$("#services").hide();
		$("#nouveaute").hide();
	});
	$("#sous_menu li:nth-of-type(2) button").click(function(){
		$("#apropos").hide();
		$("#services").fadeIn(800);
		$("#nouveaute").hide();
	});
	$("#sous_menu li:last button").click(function(){
		$("#apropos").hide();
		$("#services").hide();
		$("#nouveaute").fadeIn(800);
	});

	// TRIADE vin
	$("#menuvin li:first button").click(function(){
		$("#vin").fadeIn(800);
		$("#carte").hide();
	});
	$("#menuvin li:nth-of-type(2) button").click(function(){
		$("#vin").hide();
		$("#carte").fadeIn(800);
	});

	//hover carte
	$("#cartehover").mouseenter(function(){

		$("#cartehover .hover").animate({'opacity': 0}, 800, function(){ console.log(1); $("#cartehover .hover").hide();});
		//$("#cartehover .hover").fadeOut(800, function(){ console.log(1)});
	});

	$("#cartehover").mouseleave(function(){
		$("#cartehover .hover").show();
		$("#cartehover .hover").animate({'opacity': 1}, 800, function(){ console.log(2); });

		//$("#cartehover .hover").fadeIn(800, function(){ console.log(2)});
	});



});


