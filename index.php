<?php
include_once("header.php");
include_once("menu.php");
include_once("footer.php"); 

if(!isset($_GET['page']) or $_GET['page'] == 'accueil'){
	include_once('accueil.php');
}
else{
	switch($_GET['page']){
		case 'connexion':
			include_once('Controller/c_connexion.php');
		break;

		default:
			include_once('error_page.php');
		break;
	}
} 


ggggggg