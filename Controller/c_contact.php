<?php
include_once('bin/params.php');

if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
	if(isset($_POST['nom'], $_POST['adresse_mail'], $_POST['objet'], $_POST['message'])){
		if(!empty($_POST['nom']) && !empty($_POST['adresse_mail']) && !empty($_POST['objet']) && !empty($_POST['message'])){
			if(!filter_var(($_POST['adresse_mail']), FILTER_VALIDATE_EMAIL)){
				$mail_verif = false;
			}
			else{
				$destinataire = "benoit.rongeard@univ-lyon1.fr";
				$sujet = strip_tags($_POST['objet']);
				$nom = strip_tags($_POST['nom']);
				$email = strip_tags($_POST['adresse_mail']);
				$message = strip_tags($_POST['message']);

				$message_complet = "Nom : ".$nom."\r\n";
				$message_complet .= "Adresse email : ".$email."\r\n";
				$message_complet .= $message."\r\n";

				$entete = 'From : '.$email."\r\n".'Reply-To: '.$email."\r\n".'X-Mailer: PHP/'.phpversion();

				if(mail($destinataire, $sujet, $message, $enete)){
					header('Location:index.php?page=mail_envoye');
				}
				else{
					header('Location:index.php?page=mail_probleme');
				}
			}
		}
	}
}


include_once('View/v_contact.php');


if(isset($_POST['mail']) or $_POST['mail'] != ""){
		$mail = strip_tags($_POST['mail']);
		if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
			$error['mail'] = "Le mail rentré n'est pas valide !";
		}
	}