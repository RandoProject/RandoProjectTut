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

		if(empty($error)){
				$delay = $day.':'.$hour.':'.$minutes;
				include_once('bin/params.php');
				include_once('Models/m_randonnees.php');
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
	header('Location:index.php?page=connexion_inscription&page_pre=ajout_rando');
}