<?php session_start();
// WEBROOT => dossier du projet de la racine serveur
define('WEBROOT',str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
// ROOT => dossier du projet de la racine du disque dur
define('ROOT',str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>ecoForm</title>
	<link rel="stylesheet" href="<?= WEBROOT ?>css/style.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

	<header>
			<img src="<?= WEBROOT ?>img/logo.svg" alt="">
		<nav>	
			<a href="<?= WEBROOT ?>formation/index">Formations</a>
			<a href="<?= WEBROOT ?>user/index">Stagiaires</a>
			<a href="<?= WEBROOT ?>parcour/index">Parcoursaa</a>
		</nav>
			<?php 
			echo '<span>';
			if (isset($_SESSION['id'])) {
				echo 'Bienvenue '.$_SESSION['nom'].' '.$_SESSION['prenom'];
				echo ' <a href="'.WEBROOT.'user/logOut"><button>Déconnexion</button></a>';
			} else {
				echo '<a href="'.WEBROOT.'user/logIn"><button>Connexion</button></a>';
			}
			echo '</span>';
			 ?>
	</header>

	<?php 
		// Init 
		require_once('core/bdd.php');
		require_once('core/controller.php');
		require_once('core/abstractEntity.php');

		/*ROUTAGE*/
		// Page par default
		if (isset($_GET['p'])) {
			if ($_GET['p'] == "") {
				$_GET['p'] = "user/logIn";
			}
		} else {
			$_GET['p'] = "user/logIn";
		}


		// Chargement du controleur
		// $tabControlleur est le tableau contenant tout les nom de controlleurs accepté par l'appli
		$tabControlleur = array("user","formation","etape","questionnaire","question");

		// Affectation à $param de l'explode du $_GET['p'], permet de passer de l'url
		// 'Controller/action' à un tableau ['Controller','action']
		$param = explode("/",$_GET['p']);
		// Si le nom de controlleur venant de l'url est dans le $tabControlleur
		if (in_array($param[0], $tabControlleur)) {
			// Affectation a $controller du nom du controlleur demandé 
			$controller = ucfirst($param[0]);
			// Si il y a une action
			if (isset($param[1])) {
				// Affectation a $action du nom de l'action demandée
				$action = $param[1];
			} else {
				// Affectation a $action 'index' par default
				$action = 'index';
			}

			// Chargement du controlleur
			require_once('controlleur/'.$controller.'.ctrl.php');
			// Nomage de la classe du controlleur
			$controller = 'Ctrl'.$controller;
			// Intanciation du controlleur
			$controller = new $controller();
			
			// Si la methode $action existe dans l'objet $controller
			if (method_exists($controller,$action)) {
				// On enlève les indices 0 et 1 du tableau $param
				unset($param[0]);
				unset($param[1]);
				// Ont execute la methode $action de l'objet $controller avec $param en paramètre de la methode
				call_user_func_array(array($controller,$action), $param);
			// Sinon $action non présente dans $controller
			} else {
				// Page 404
				echo 'erreur 404 (mauvaise action)';
			}
		} else {
			// Page 404
			echo 'erreur 404 (mauvais controlleur)';
		}


		
	 ?>


	 <footer></footer>
	 <script src="<?= WEBROOT ?>js/script.js"></script>

	 <script>
	 	// passage de l'url sauvegardé de php à js
	 	var url = "<?php echo $_SESSION['url']?>";
	 	// execution au chargement de la méthode changeUrl avec url en paramètre
	 	window.onload = changeUrl(url);
	 </script>
	

</body>
</html>