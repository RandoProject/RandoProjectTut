<?php

if(isset($_SESSION['statut']) and in_array($_SESSION['statut'], array('administrateur', 'moderateur', 'utilisateur'))){
	
	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
		if(isset($_POST['name']) and $_POST['name'] != ""){
			$name = strip_tags($_POST['name']);
			if(strlen($name) > 255){
				$error['name'] = "Le nom de la randonn�e doit faire moins de 255 caract�res.";
			}
		}
		else{
			$error['name'] = "Vous n'avez pas donn� de nom � la randonn�e";
		}

		if(!isset($_POST['descritption']) or $_POST['description'] == ""){
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

		if(!isset($_POST['hour']) or $_POST['hour'] == ""){
			$hour = 0;
		}
		else if(is_numeric($_POST['minutes'])){
			$hour = intval($_POST['minutes']);
			if($hour < 0 or $hour > 23){
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
			$error['water'] = "Vous n'avez pas pr�cis� s'il y avait un point d'eau.";
		}

		




	}
	else{
		include_once('View/v_ajouter_rando.php');
	}


}
else{
	header('Location:index.php?page=connexion&page_pre=ajout_rando');
}