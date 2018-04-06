<?php 
	//INPORT SETTINGS
	include('../config/settings.php');

	// si l'utilisateur n'est pas connecté
	if(empty($_SESSION['user'])){


		//on le renvoi vers la page de connexion
		header('Location: logIn.php');
	}

?>



<!DOCTYPE html>

<head>

	<title>Vinostar - Back Office</title>


	<!-- INPORT HEAD -->
	<?php include('../include/head_back.php'); ?>

</head>

<!-- BODY -->
<body class="container col-12">

	<!-- INPORT HEADER -->
	<?php include('../include/header_back.php'); ?>

            
            


	<!-- INPORT FOOTER -->
	<?php include('../include/footer_back.php'); ?>
</div>	
</body>


</html>
























