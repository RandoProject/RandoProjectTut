<?php

include_once('bin/params.php');
include_once('Models/m_mdp_forget.php');

if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
	if(isset($_POST['pseudo'], $_POST['adresse_mail'])){
		if(!empty($_POST['pseudo']) && !empty($_POST['adresse_mail'])){

				$compte = get_info_compte($pseudo, $adresse_mail);

				$destinataire = $compte->mail;
				$sujet = 'Mot de passe perdu';
				$pseudo = 'Admin';
				$message = 'Votre pseudo pour vous connecter est : '.$compte->pseudo.'<br/>';
				$message .= 'Votre mot de passe est : '.$compte->mdp;

				$entete = "From : ".$pseudo;
				$entete .= "MINE-Version: 1.0";

				if(mail($destinataire, $sujet, $message, $entete)){
					header('Location: index.php?page=mail_envoye');
				}
				else{
					header('Location: index.php?page=mail_probleme');
				}
			
		}
	}
}




include_once('View/v_mdp_forget.php');