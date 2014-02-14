<?php

if(isset($_SESSION['statut']) and in_array($_SESSION['statut'], array('administrateur', 'moderateur', 'utilisateur'))){
	
	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
		$error = array();
		if(isset($_POST['name']) and $_POST['name'] != ""){
			$name = strip_tags($_POST['name']);
			if(strlen($name) > 150){
				$error['name'] = "Le nom de la randonn�e doit faire moins de 150 caract�res.";
			}
			else{
				include_once('bin/params.php');
				include_once('Models/m_randonnees.php');
				if(count_rando(strtolower($name))->nb_rando != 0){
					$error['name'] = "Le nom de randonn�e que vous voulez enregistrer existe d�j�.";
				}
			}
		}
		else{
			$error['name'] = "Vous n'avez pas donn� de nom � la randonn�e";
		}

		if(!isset($_POST['description']) or $_POST['description'] == ""){
			$error['description'] = "Vous devez entrer une description.";
		}


		if(!isset($_POST['difficulty'])){
			$error['difficulty'] = "Vous n'avez pas pr�cis� la difficult�";
		}else{
			if(is_numeric($_POST['difficulty'])){
				$difficulty = intval($_POST['difficulty']);
				if($difficulty < 1 and $difficulty > 5){
					$error['difficulty'] = "La difficult� doit �tre comprise entre 1 et 5.";
				}
			}
			else{
				$error['difficulty'] = "La difficult� que vous avez entr� n'est pas valide.";
			}
		}

		// V�rification de la dur�e
		if(!isset($_POST['day']) or $_POST['day'] == ""){
			$day = 0;
		}
		else if(is_numeric($_POST['day']) and intval($_POST['day']) <= 21 and intval($_POST['day']) >= 0){
				$day = intval($_POST['day']);
		}
		else{
			$error['day'] = "Le nombre de jours que vous avez entr� n'est pas valide.";
		}

		if(!isset($_POST['hour']) or $_POST['hour'] == ""){
			$hour = 0;
		}
		else if(is_numeric($_POST['hour'])){
			$hour = intval($_POST['hour']);
			if($hour < 0 or $hour > 23){
				$error['hour'] = "Le nombre d'heure doit �tre compris entre 0 et 23.";
			}
		}
		else{
			$error['hour'] = "L'heure entr�e est invalide";
		}

		if(!isset($_POST['minutes']) or $_POST['minutes'] == ""){
			$minutes = 0;
		}
		else if(is_numeric($_POST['minutes'])){
			$minutes = intval($_POST['minutes']);
			if($minutes < 0 or $minutes > 59){
				$error['minutes'] = "Le nombre de minutes doit �tre compris entre 0 et 59.";
			}
		}
		else{
			$error['minutes'] = "Le nombre de minutes entr� est invalide.";
		}

		if(isset($_POST['water']) and ($_POST['water'] == 'oui' or $_POST['water'] == 'non')){
			$water = ($_POST['water'] == 'oui')? 1 : 0;
		}
		else{
			$error['water'] = "Vous n'avez pas pr�cis� si votre randonn�e comportait un point d'eau.";
		}

		if(isset($_FILES['fileMap']) and $_FILES['fileMap']['error'] == UPLOAD_ERR_OK and is_uploaded_file($_FILES['fileMap']['tmp_name'])){
			if($_FILES['fileMap']['size'] <= 2000000){ // taille de fichier max <= 2Mo
				$infosFile = pathinfo($_FILES['fileMap']['name']);
				$extension = strtolower($infosFile['extension']);
				
				if(in_array($extension, array('gpx'))){
					$nameFile = strip_tags(basename($_FILES['fileMap']['name']));
					// Le nom session_id permet de pas avoir de probl�me avec des fichiers ayant le m�me nom en m�me temps
					move_uploaded_file($_FILES['fileMap']['tmp_name'], 'Resources/GPX/tmp/'.session_id());
					$gpx = simplexml_load_file('Resources/GPX/tmp/'.session_id());
					$gpx->registerXPathNamespace('x', "http://www.topografix.com/GPX/1/0"); // Chargement de l'espace de nom contenant le vocabulaire des GPX
					
					$points = $gpx->xpath('//x:trkpt');
					if($points === false){ // Si il y a une erreur
						$error['fileMap'] = "Le fichier GPX est invalide";
					}
					else if(empty($points)){
						$points = $gpx->xpath('//x:rtept');
						if($points === false or empty($points)){
							$error['fileMap'] = "Le fichier GPX est invalide";
						}
					}

				}
				else{
					$error['fileMap'] = "Votre fichier n'est pas de type gpx.";
				}
			}
			else{
				$error['fileMap'] = "Votre fichier doit faire moins de 2Mo";
			}
		}
		else{
			$error['fileMap'] = "Le fichier s�lectionn� est invalide.";
		}

		if(empty($error)){
				include_once('bin/params.php');
				include_once('Models/m_randonnees.php');

				foreach($points as $point){
					$lon = NULL;
					$lat = NULL;
					$ele = NULL;

					foreach($point->attributes() as $name => $value){ // R�cup�re longitude et latitude
						if($name == 'lon'){
							$lon = (float)$value;
						}
						else if($name == 'lat'){
							$lat = (float)$value;
						}
					}

					// R�cup�re l'�l�vation
					foreach ($point->children() as $child){ // Peut �tre plus optimiser d'utiliser des iterateurs
						if($child->getName() == 'ele'){
							$ele = (float)$child;
						}
					}
    
				}

				$delay = $day.':'.$hour.':'.$minutes;
				insert_rando($name, $delay, $difficulty, $_POST['description'], $water, $_SESSION['pseudo']);
				

				$validation = true; // Cette variable d'afficher la validation dans la page
				include_once('View/v_ajouter_rando.php');
		}
		else{
			if(!isset($error['name'])){
				$value['name'] = $name;
			}
			if(!isset($error['description'])){
				$value['description'] = $_POST['description'];
			}
			if(!isset($error['difficulty'])){
				$value['difficulty'] = $difficulty;
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