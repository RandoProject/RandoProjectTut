<?php
include_once('bin/params.php');

if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
	if(isset($_POST['nom'], $_POST['adresse_mail'], $_POST['objet'], $_POST['message'])){
		if(!empty($_POST['nom']) && !empty($_POST['adresse_mail']) && !empty($_POST['objet']) && !empty($_POST['message'])){
			if(!filter_var(($_POST['adresse_mail']), FILTER_VALIDATE_EMAIL)){
				$mail_verif = false;
			}
			else{
				$destinataire = "rongeardb@gmail.com";
				$sujet = strip_tags($_POST['objet']);
				$nom = strip_tags($_POST['nom']);
				$email = strip_tags($_POST['adresse_mail']);
				$message = strip_tags($_POST['message']);

				$entete = 'From : '.$nom.'<'.$email.'>'."\r\n".'Reply-To: '.$email."\r\n".'X-Mailer: PHP/'.phpversion();

				if(mail($destinataire, $sujet, $message, $entete)){
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
