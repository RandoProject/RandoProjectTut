<?php

if(isset($_SESSION['statut']) and in_array($_SESSION['statut'], array('administrateur', 'moderateur', 'membre'))){
	
	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
		$error = array();
		if(isset($_POST['name']) and $_POST['name'] != ""){
			$title = strip_tags($_POST['name']);
			if(strlen($title) > 150){
				$error['name'] = "Le nom de la randonnée doit faire moins de 150 caractères.";
			}
			else{
				include_once('bin/params.php');
				include_once('Models/m_randonnees.php');
				if(count_rando(strtolower($title))->nb_rando != 0){
					$error['name'] = "Le nom de randonnée que vous voulez enregistrer existe déjà.";
				}
			}
		}
		else{
			$error['name'] = "Vous n'avez pas donné de nom à la randonnée";
		}

		if(!isset($_POST['description']) or $_POST['description'] == ""){
			$error['description'] = "Vous devez entrer une description.";
		}


		if(!isset($_POST['difficulty'])){
			$error['difficulty'] = "Vous n'avez pas précisé la difficulté";
		}
		else if(is_numeric($_POST['difficulty'])){
				$difficulty = intval($_POST['difficulty']);
				if($difficulty < 1 and $difficulty > 5){
					$error['difficulty'] = "La difficulté doit être comprise entre 1 et 5.";
				}
		}
		else{
			$error['difficulty'] = "La difficulté que vous avez entré n'est pas valide.";
		}

		// La longueur de la rando
		if(!isset($_POST['length'])){
			$lenRamble = null;
		}
		else if(is_numeric($_POST['length'])){
			$lenRamble = intval($_POST['length']);
		}
		else{
			$error['length'] = 'La longueur entrée est invalide';
		}

		// Vérif dénivelé
		if(!isset($_POST['deniv']) or $_POST['deniv'] == ""){
			$deniv = null;
		}
		else if(is_numeric($_POST['deniv'])){
			$deniv = intval($_POST['deniv']);
		}
		else{
			$error['deniv'] = 'Le dénivelé entré est invalide';
		}


		// Vérification de la durée
		if(!isset($_POST['day']) or $_POST['day'] == ""){
			$day = 0;
		}
		else if(is_numeric($_POST['day']) and intval($_POST['day']) <= 21 and intval($_POST['day']) >= 0){
				$day = intval($_POST['day']);
		}
		else{
			$error['day'] = "Le nombre de jours que vous avez entré n'est pas valide.";
		}

		if(!isset($_POST['hour']) or $_POST['hour'] == ""){
			$hour = 0;
		}
		else if(is_numeric($_POST['hour'])){
			$hour = intval($_POST['hour']);
			if($hour < 0 or $hour > 23){
				$error['hour'] = "Le nombre d'heure doit être compris entre 0 et 23.";
			}
		}
		else{
			$error['hour'] = "L'heure entrée est invalide";
		}

		if(!isset($_POST['minutes']) or $_POST['minutes'] == ""){
			$minutes = 0;
		}
		else if(is_numeric($_POST['minutes'])){
			$minutes = intval($_POST['minutes']);
			if($minutes < 0 or $minutes > 59){
				$error['minutes'] = "Le nombre de minutes doit être compris entre 0 et 59.";
			}
		}
		else{
			$error['minutes'] = "Le nombre de minutes entré est invalide.";
		}

		if(isset($_POST['water']) and ($_POST['water'] == 'oui' or $_POST['water'] == 'non')){
			$water = ($_POST['water'] == 'oui')? 1 : 0;
		}
		else{
			$error['water'] = "Vous n'avez pas précisé si votre randonnée comportait un point d'eau.";
		}

		if(isset($_FILES['fileMap']) and $_FILES['fileMap']['error'] == UPLOAD_ERR_OK and is_uploaded_file($_FILES['fileMap']['tmp_name'])){
			if($_FILES['fileMap']['size'] <= 2000000){ // taille de fichier max <= 2Mo
				$infosFile = pathinfo($_FILES['fileMap']['name']);
				$extension = strtolower($infosFile['extension']);
				
				if(in_array($extension, array('gpx'))){
					$nameFile = strip_tags(basename($_FILES['fileMap']['name']));
					// Le nom session_id permet de pas avoir de problème avec des fichiers ayant le même nom en même temps
					if(!file_exists('Resources/GPX/tmp')){
						mkdir('Resources/GPX/tmp', 0777);
					}
					move_uploaded_file($_FILES['fileMap']['tmp_name'], 'Resources/GPX/tmp/gpx_'.session_id());
					$gpx = simplexml_load_file('Resources/GPX/tmp/gpx_'.session_id());
					$namespace = $gpx->getNamespaces(true); // On récupère l'espace de nom du fichier
					if(!empty($namespace)){
						$gpx->registerXPathNamespace('gpx', current($namespace)); // Chargement de l'espace de nom contenant le vocabulaire des GPX
						
						$points = $gpx->xpath('//gpx:trkpt');
						if($points === false){ // Si il y a une erreur
							$error['fileMap'] = "Le fichier GPX est invalide";
						}
						else if(empty($points)){
							$points = $gpx->xpath('//gpx:rtept');
							if($points === false or empty($points)){
								$error['fileMap'] = "Le fichier GPX est invalide";
							}
						}
					}
					else{
						$error['fileMap'] = "L'espace de nom du fichier n'est pas valide";
					}
				}
				else{
					$error['fileMap'] = "Votre fichier n'est pas de type GPX.";
				}
			}
			else{
				$error['fileMap'] = "Votre fichier doit faire moins de 2Mo";
			}
		}
		else{
			$error['fileMap'] = "Le fichier sélectionné est invalide.";
		}

		// Si aucune erreur on valide et on enregistre la randonnée
		if(empty($error)){
				include_once('bin/params.php');
				include_once('bin/functions.php');
				include_once('Models/m_randonnees.php');
				include_once('Models/m_parcours.php');


				// -------------------------------Récupération des données du GPX----------------------------------------------
				$nbPoints = 0;
				foreach($points as $point){
					$lon = NULL;
					$lat = NULL;
					$ele = NULL;
					foreach($point->attributes() as $name => $value){ // Récupère longitude et latitude
						if($name == 'lon'){
							$lon = floatval($value);
						}
						else if($name == 'lat'){
							$lat = floatval($value);
						}
					}
					// Récupère l'élèvation
					foreach ($point->children() as $child){ // Meilleur optimisation en utilisant les iterateurs
						if($child->getName() == 'ele'){
							$ele = intval($child);
						}
					}
					if($lon !== NULL and $lat !== NULL){
						$nbPoints++;
						if(!isset($firstPoint)){ // Récupère le premier point du parcours
							$firstPoint['lat'] = $lat;
							$firstPoint['lon'] = $lon;
						}
					}
				}

				// -------------------------------------------- Géocodage de l'adresse ------------------------------------------
				if(isset($firstPoint)){ 
					/* On utilise un fichier xml de l'API google map pour touver le code postal de ces coordonnées */
					$ch = curl_init('http://maps.googleapis.com/maps/api/geocode/xml?latlng='.$firstPoint['lat'].','.$firstPoint['lon'].'&sensor=false'); // Pas besoin de la clée d'API...
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$xmlResult = simplexml_load_string(curl_exec($ch));  
					$status = $xmlResult->status;
					if($status == 'OK'){
						$listAddressComponent = $xmlResult->result[0]->address_component;
						foreach($listAddressComponent as $adressComponent){
							if($adressComponent->type == 'postal_code'){
								$postalCode = $adressComponent->long_name;
								break;
							}
						}
					}
					curl_close($ch);
				}
				if(isset($postalCode)){
					$departement = intval(substr($postalCode, 0, 2)); // On récupère seulement le département
				}
				else{
					$departement = 0; // Département invalide
				}


				
				// ------------------------------------------------- Gestion des images ---------------------------------------------
				$srcImgDir = 'Resources/Galerie/tmp/'.session_id();
				if(file_exists($srcImgDir)){ // Si il y a un dossier d'images
					include_once('Models/m_galerie.php');
					include_once('Models/m_photo.php');
					$idGalery = insert_galerie(substr($title, 0, 140));
					$galeryDir = 'Resources/Galerie/'.$idGalery.'_'.substr($title, 0, 140);
					if(!file_exists($galeryDir)){
						mkdir($galeryDir, 0777);
					}
					$listImg = moveFilesDir($srcImgDir, $galeryDir); // Déplace les images
					$idFirstImg = insert_photo($listImg, $idGalery.'_'.substr($title, 0, 140));
					rmdir($srcImgDir); // Supprime le dossier source
				}
				else{
					$idGalery = 0;
				}


				// -------------------------------------------- Insetion dans la base ---------------------------------------------

				$idRoute = insert_parcours($title.'.gpx', $firstPoint['lat'], $firstPoint['lon'], $nbPoints);
				rename('Resources/GPX/tmp/gpx_'.session_id(), 'Resources/GPX/'.$idRoute.'_'.substr($title,  0, 150).'.gpx'); 
				
				$imgCover = (isset($idFirstImg) and $idFirstImg !== null)? $idFirstImg : 0; // L'image de couverture
				$delay = ($day*24) + $hour.':'.$minutes.':0';
				$lenRamble = round($lenRamble / 1000, 1);
				$idRando = insert_rando($title, $delay, $difficulty, $_POST['description'], $water, $_SESSION['pseudo'], $departement, $lenRamble, $idRoute, $idGalery, $imgCover, $deniv); // On enregistre la randonnée
				


				
				cleanTmp(); // Supprime les fichiers temporaires de parcours qui ne sont plus utiles

				$validation = true; // Cette variable permet d'afficher la page de validation
				include_once('View/v_ajouter_rando.php');
		}
		else{
			if(!isset($error['name'])){
				$value['name'] = $title;
			}
			if(!isset($error['description'])){
				$value['description'] = $_POST['description'];
			}
			if(!isset($error['difficulty'])){
				$value['difficulty'] = $difficulty;
			}
			if(!isset($error['deniv'])){
				$value['deniv'] = ($deniv === null)? "" : $deniv;
			}
			if(!isset($error['day'])){
				$value['day'] = $day;
			}
			if(!isset($error['hour'])){
				$value['hour'] = $hour;
			}
			if(!isset($error['minutes'])){
				$value['minutes'] = $minutes;
			}
			if(!isset($error['water'])){
				$value['water'] = $water;
			}

			include_once('View/v_ajouter_rando.php');
		}
	}
	else{
		include_once('View/v_ajouter_rando.php');
	}

}
else{
	header('Location:index.php?page=connexion&page_pre=ajout_rando');
}