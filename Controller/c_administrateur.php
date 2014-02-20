<?php

if($_SESSION['statut'] !== 'administrateur'){
	header('location:index.php?page=accueil');
}

include_once('bin/params.php');
include_once('Models/m_administration.php');

$listeRando = get_liste_rando();
$listeMember = get_liste_member();
$listeComment = get_liste_comment();
$galery = get_galery();

include_once('View/v_administrateur.php');