<?php
session_start();
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
			include_once('Controller/c_ajout_rando.php');
			break;

		case 'connexion':
			include_once('Controller/c_connexion.php');
			break;

		case 'deconnexion':
			session_destroy();
			header('location:index.php?page=accueil');
			break;

		case 'inscription':
			include_once('Controller/');
			break;

		case 'profil':
			include_once('Controller/c_profil.php');
			break;

		default:
			include_once('View/error_page.php');
			break;
	}
}