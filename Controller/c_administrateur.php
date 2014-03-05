<?php

if($_SESSION['statut'] !== 'administrateur'){
	header('location:index.php?page=accueil');
}

include_once('bin/params.php');
include_once('Models/m_administration.php');


/* Rando */
if($_GET['section'] === 'randonnees'){
	if(!empty($_POST['rando'])){
		if(!empty($_POST['validate'])){
			validate_rando($_POST['rando']);
		}
		else if(!empty($_POST['delete'])){
			delete_rando($_POST['rando']);
		}
		else if(!empty($_POST['validUpdate'])){
			update_rando($_POST['rando'], $_POST['title'], $_POST['equipment'], $_POST['description']);
		}
	}
	$listeRandoInvalide = get_liste_rando('AND rando.valide = 0');
	$listeRando = get_liste_rando('');
	if(!empty($_POST['rando']) && !empty($_POST['update'])){
		$listeRando = liste_update($_POST['rando']);
	}
}

include_once('View/v_administrateur.php');