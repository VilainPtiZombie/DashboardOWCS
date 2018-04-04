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
<style>
    
</style>
<!-- BODY -->
<body class="home-body">


	<!-- Home Login -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-home">
        </div>
        <!-- Fin HOME LOGIN -->

	
</body>


</html>
























