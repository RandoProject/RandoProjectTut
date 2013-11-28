<?php
include("header");
include("menu.php");
include("footer.php"); 

if(isset($_POST['page']) or $_POST['page'] == 'welcome'){
	include_once('welcome.php');
}
else{
	switch($_POST['page']){
		case 'connexion':
			include_once('Location:Controller/c_connexion.php');
		break;

		default:
			include_once('Location:error_page.php');
		break;
	}
}