<?php

include_once('bin/params.php');
include_once('Models/m_inscription.php');

	if(!isset($_SESSION['statut'])){
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
			if(isset($_POST['pseudo']) and $_POST['pseudo'] != ""){
				$pseudo = strip_tags($_POST['name']);
				if(strlen($pseudo) > 2)
			}
		}
		else{
			include_once('View/v_inscription.php');
		}
	}
	else{
		echo 'Vous ne pouvez pas vous inscrire car vous êtes déjà connecté !';
	}

include_once('View/v_inscription.php');