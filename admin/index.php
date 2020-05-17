<?php
	
	include '../functions/main-function.php';

	#scan du contenu du dossier pages et recuperation du contenu
	$pages = scandir('pages/');
	#si la var d'url qui defini la page a afficher est defiinie et non vide alors:
	if (isset($_GET['page']) AND !empty($_GET['page'])) {
		#s'il ya le contenu de la var d'url page dans le tableau $pages
		if (in_array($_GET['page'].'.php', $pages)) {
			
			$page = $_GET['page'];
		}else{

			$page = "error";
		}

	}else{
		#dans le cas l'internaute n'a rien mis,on le redirige ver la page home:
		$page = 'dashboard';
	}

	#scan du dossier function 
	$pages_function = scandir('functions/');
	if (in_array($page.'.func.php', $pages_function)) {
		include "functions/".$page.".func.php";

	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Blog 2.0 | Administration</title>
		<!--Import Google Icon Font-->
      	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      	<!--Import materialize.css-->
		<link rel="stylesheet" type="text/css" href="../css/materialize.css">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta charset="utf-8"/>
	</head>
	<body>

		<?php 
			#la page login doit etre la seule accessible a n'importe qui... donc si
			#ce n'est pas login on redirige vers login pour qu'il se connecte \sans sessions pas d'acces au dasboard
			if ($page != 'login' && $page != 'new' && !isset($_SESSION['admin'])) {
				header("Location:index.php?page=login");
			}


			include "body/topbar.php";
		?>
		<div class="container">
			<?php
			#inclusion de la page qui se trouve dans le dossier pages et qui porte le nom de la var $page
			 include "pages/".$page.".php";
			 ?>
		</div>
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="../jquery.js"></script>
		<script type="text/javascript" src="../js/materialize.js"></script>
		<!-- fichier js global pour le menu -->
		<script type="text/javascript" src="../js/script.js"></script>
		<?php
		#scan du dossier js 
		$pages_js = scandir('js/');
		if (in_array($page.'.func.js', $pages_js)) {
			#si jamais je trouve la $page.func.js allors j'inclu 
		?>
			<script type="text/javascript" src="js/<?= $page?>.func.js"></script>
			
		<?php
		}
		?>
	</body>
</html>