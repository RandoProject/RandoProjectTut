<?php

if($_SESSION['statut'] !== 'moderateur'){
	header('location:index.php?page=accueil');
}

include_once('bin/params.php');
include_once('Models/m_administration.php');

/*if(!empty($_GET['code'])){
	delete_comment($_GET['code']);
}*/

/* Validation Rando */
if(!empty($_POST['rando']) && !empty($_POST['validate'])){
	validate_rando($_POST['rando']);
}

/* Suppression Rando */
if(!empty($_POST['rando']) && !empty($_POST['delete'])){
	delete_rando($_POST['rando']);
}

$listeComment = get_liste_comment();
$listeRandoInvalide = get_liste_rando('AND valide = 0');

include_once('View/v_moderateur.php');