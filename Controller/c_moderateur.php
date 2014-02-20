<?php

if($_SESSION['statut'] !== 'moderateur'){
	header('location:index.php?page=accueil');
}

include_once('bin/params.php');
include_once('Models/m_administration.php');

$listeComment = get_liste_comment();

$listeRandoInvalide = get_liste_rando('AND valide = 0');

if(!empty($_GET['code'])){
	delete_comment($_GET['code']);
}

include_once('View/v_moderateur.php');