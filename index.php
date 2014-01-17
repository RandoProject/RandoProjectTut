<?php
include_once("View/header.php");
include_once("View/menu.php");
include_once("View/activitees_recentes.php");
include_once("View/footer.php"); 

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

		case 'affichage_recherche':
			include_once('Controller/c_affichage_recherche.php');
		break;

		default:
			include_once('View/error_page.php');
		break;
	}
}