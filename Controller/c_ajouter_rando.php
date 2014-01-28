<?php

if(isset($_SESSION['statut']) and in_array($_SESSION['statut'], array('administrateur', 'moderateur', 'utilisateur'))){
	
	print_r($_SESSION);
	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
		if(isset($_POST['name']) and $_POST['name'] != ""){
			$name = strip_tags($_POST['name']);
			if(strlen($name) > 255){
				$error['name'] = "Le nom de la randonnée doit faire moins de 255 caractères.";
			}
		}
		else{
			$error['name'] = "Vous n'avez pas donné de nom à la randonnée";
		}

		if(!isset($_POST['descritption']) and $_POST['description'] != ""){
			$error['description'] = "Vous devez entrer une description.";
		}


		if(!isset($_POST['difficulty'])){
			$error['difficulty'] = "Vous n'avez pas précisé la difficulté";
		}else{
			if(is_numeric($_POST['difficulty'])){
				$difficulty = intval($_POST['difficulty']);
				if($difficulty < 1 and $difficulty > 5){
					$error['difficulty'] = "La difficulté doit être comprise entre 1 et 5.";
				}
			}
			else{
				$error['difficulty'] = "La difficulté que vous avez entré n'est pas valide.";
			}
		}

		// Vérification de la durée
		if(!isset($_POST['day']) or $_POST['day'] == ""){
			$day = 0;
		}else{
			if(is_numeric($_POST['day']) and intval($_POST['day']) =< 21 and intval($_POST['day']) >= 0){
				$day = intval($_POST['day']);
			}
			else{
				$error['day'] = "Le nombre de jours que vous avez entré n'est pas valide.";
			}
		}

		if(!isset($_POST['hour']) or $_POST['hour'] == ""){
			$hour = 0;
		}





	}
	else{
		include_once('View/v_ajouter_rando.php');
	}


}
else{
	header('Location:index.php?page=connexion&page_pre=ajout_rando');
}