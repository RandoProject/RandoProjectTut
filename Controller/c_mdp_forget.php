<?php

include_once('bin/params.php');
include_once('Models/m_mdp_forget.php');

if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
	if(isset($_POST['pseudo'], $_POST['adresse_mail'], $_POST['mdp'], $_POST['mdp2'])){
		if(!empty($_POST['pseudo']) && !empty($_POST['adresse_mail']) && !empty($_POST['mdp'])){
					$mdp = strip_tags($_POST['mdp']);
					$mdp2 = strip_tags($_POST['mdp2']);
					$mdp_crypte = sha1(sha1($mdp).$salt);
					if(strlen($mdp) > 30 or strlen($mdp2) > 30){
						$error['mdp'] = "Votre mot de passe ne doit pas contenir plus de 30 caractères !";
					}
					else if($_POST['mdp2'] != $_POST['mdp']){
						$error['mdp'] = "Les deux mots de passe ne correspondent pas !";
					}
				else{
					$error['mdp'] = "Vous n'avez pas entré de mot de passe !";
				}

				$compte = get_info_compte($_POST['pseudo'], $_POST['adresse_mail']);
				
				update_mdp($mdp_crypte, $compte->pseudo);
				
				$destinataire = $compte->mail;

				$sujet = 'Mot de passe perdu';
				$pseudo = 'Admin';
				$message = 'Votre pseudo pour vous connecter est : '.$compte->pseudo.'     ';
				$message .= 'Votre nouveau mot de passe est : '.$mdp.'';

				$entete = "From : ".$pseudo;
				
				if(mail($destinataire, $sujet, $message, $entete)){
					header('Location: index.php?page=mdp_forget_envoye');
				}
				else{
					header('Location: index.php?page=mdp_forget_problem');
				}
			
		}
	}
}




include_once('View/v_mdp_forget.php');