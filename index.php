<?php
include_once("View/header.php");
include_once("View/menu.php");

if(!isset($_GET['page']) or $_GET['page'] == 'accueil'){
	include_once('View/accueil.php');
}
else{
	switch($_GET['page']){
		case 'connexion':
			include_once('Controller/c_connexion.php');
			break;

		case 'recherche':
			include_once('Controller/c_recherche_avancee.php');
			break;

		case 'galerie':
			include_once('Controller/c_galerie.php');
			break;

		case 'ajout_rando':
			include_once('Controller/c_ajouter_rando.php');
			break;

		case 'connexion':
			include_once('Controller/c_connexion.php');
			break;

		case 'deconnexion':
			session_destroy();
			header('location:index.php?page=accueil');
			break;

		case 'inscription':
			include_once('Controller/c_inscription.php');
			break;

		case 'profil':
			include_once('Controller/c_profil.php');
			break;

		case 'fiche_rando':
			include_once('Controller/c_fiche_rando.php');
			break;

		case 'administrateur':
			include_once('Controller/c_administrateur.php');
			break;

		case 'moderateur':
			include_once('Controller/c_moderateur.php');
			break;

		case 'contact':
			include_once('Controller/c_contact.php');
			break;

		case 'erreur':
			include_once('View/error_page.php');
			break;
			
		case 'mail_envoye':
			include_once('View/v_mail_envoye.php');
			break;

		case 'mail_probleme':
			include_once('View/v_mail_probleme.php');
			break;

		case 'commentaire_valide':
			include_once('View/v_commentaire_envoye.php');
			break;

		case 'upload_img':
			include_once('Controller/c_upload_img.php');
		break;

		default:
			header('Location:index.php?page=erreur');
			break;
	}
}