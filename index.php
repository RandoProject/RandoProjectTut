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
			include_once('Controller/');
		break;

		case 'ajouter_rando':
			include_once('Controller/');
		break;

		case 'connexion':
			include_once('Controller/c_connexion.php');
		break;

		case 'inscription':
			include_once('Controller/');
		break;

		default:
			include_once('View/error_page.php');
		break;
	}
}