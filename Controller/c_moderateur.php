<?php

if($_SESSION['statut'] !== 'moderateur'){
	header('location:index.php?page=accueil');
}

include_once('bin/params.php');
include_once('Models/m_administration.php');

$listeComment = get_liste_comment();

include_once('View/v_moderateur.php');