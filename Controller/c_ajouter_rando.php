<?php

if(isset($_SESSION['statut']) and in_array($_SESSION['statut']), array('administrateur', 'moderateur', 'utilisateur')){
	

	if(strtolower($_SERVER['REQUEST_METHOD']) = 'post'){
		if(isset($_POST['name']) and $_POST['name'] != ""){
			$name = strip_tags($_POST['name']);
			if(strlen($name) > 255){
				$error['name'] = "Le nom de la randonnée doit faire moins de 255 caractères";
			}
		}
		else{
			$error['name'] = "Vous n'avez pas donné de nom à la randonnée";
		}

		if()



	}
	else{
		include_once('View/v_ajouter_rando.php');
	}
}
else{
	header('Location:index.php?page=connexion&page_pre=ajout_rando');
}