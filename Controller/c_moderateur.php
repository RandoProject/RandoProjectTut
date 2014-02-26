<?php

if($_SESSION['statut'] !== 'moderateur'){
	header('location:index.php?page=accueil');
}

include_once('bin/params.php');
include_once('Models/m_administration.php');

/*if(!empty($_GET['code'])){
	delete_comment($_GET['code']);
}*/

/* Rando */
if($_GET['section'] === 'randonnees'){
	if(!empty($_POST['rando'])){
		if(!empty($_POST['validate'])){
			validate_rando($_POST['rando']);
		}
		else if(!empty($_POST['delete'])){
			delete_rando($_POST['rando']);
		}
	}
	$listeRandoInvalide = get_liste_rando('AND valide = 0');
}

/* Commenaire */
else if($_GET['section'] === 'commentaires'){
	if(!empty($_POST['comment'])){
		if(!empty($_POST['validate'])){
			validate_comment($_POST['comment']);
		}
		else if(!empty($_POST['delete'])){
			delete_comment($_POST['comment']);
		}
	}
	$listeComment = get_liste_comment('WHERE valide = 0');
}

include_once('View/v_moderateur.php');