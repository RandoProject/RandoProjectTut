<?php

if(strtolower($_SERVER['REQUEST_METHOD']) == "post"){
	$error = array();
	if(!isset($_POST['pseudo']) or $_POST['pseudo'] == ""){
		$error['pseudo'] = 'Vous n\'avez pas entré d\'identifiant.';
	}
	if(!isset($_POST['pass']) or $_POST['pass'] == ""){
		$error['pass'] = 'Vous n\'avez pas entré de mot de passe.';
	}

	if(empty($error)){
		include_once('bin/params.php');
		include_once('Models/m_members.php');
		$member = get_member(strip_tags($_POST['pseudo']));
		if(isset($member->mdp)){ // Si le pseudo du client existe
			if($member->mdp == $_POST['pass']){
				$_SESSION['pseudo'] = $member->pseudo;
				$_SESSION['name'] = $member->nom;
				$_SESSION['prenom'] = $member->prenom;
				$_SESSION['statut'] = $member->statut;

				// Il est possible de revenir à la page sur laquelle était l'utilisateur avant la connexion
				$page = (isset($_GET['page_pre']))? strip_tags($_GET['page_pre']) : 'accueil';
				header('Location:index.php?page='.$page); 
			}
			else{
				$error['pass'] = 'Votre mot de passe est incorrect.';
			}
		}
		else{
			$error['pseudo'] = 'Votre identifiant est incorrect.';
		}
	}
	if(!isset($error['pseudo'])){
		$value['pseudo'] = strip_tags($_POST['pseudo']);
	}
}

include_once('View/v_connexion.php');