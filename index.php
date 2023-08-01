<?php
session_start();

/*
Cette page génère les différentes vues de l'application en utilisant des templates situés dans le répertoire "templates". Un template ou 'gabarit' est un fichier php qui génère une partie de la structure XHTML d'une page. 

La vue à afficher dans la page index est définie par le paramètre "view" qui doit être placé dans la chaîne de requête. En fonction de la valeur de ce paramètre, on doit vérifier que l'on a suffisamment de données pour inclure le template nécessaire, puis on appelle le template à l'aide de la fonction include

Les formulaires de toutes les vues générées enverront leurs données vers la page data.php pour traitement. La page data.php redirigera alors vers la page index pour réafficher la vue pertinente, généralement la vue dans laquelle se trouvait le formulaire. 
*/


	include_once "libs/maLibUtils.php";

	// Dans tous les cas, on affiche l'entete, 
	// qui contient les balises de structure de la page, le logo, etc. 
	// Le formulaire de recherche ainsi que le lien de connexion 
	// si l'utilisateur n'est pas connecté 
	include("templates/header.php");

	// on récupère le paramètre view éventuel 
	$view = valider("view"); // $view = $_["view"]

	// S'il est vide, on charge la vue home par défaut
	if (!$view) $view = "home"; 

	// En fonction de la vue à afficher, on appelle tel ou tel template
	switch($view)
	{		

		case "home" : 
			include("templates/home.php");
		break;

		case "coach_dashboard" : 
			include("templates/coach_dashboard.php");
		break;

		case "coach_exercices" : 
			include("templates/coach_exercises.php");
		break;
		
		case "coach_workouts" : 
			include("templates/coach_workouts.php");
		break;
		
		case "coach_groups" : 
			include("templates/coach_groups.php");
		break;
		
		case "coach_requests" : 
			include("templates/coach_requests.php");
		break;

		default : // si le template correspondant à l'argument existe, on l'affiche
			if (file_exists("templates/$view.php"))
				include("templates/$view.php");

	}

?>
