<?php

if($_SESSION['statut'] !== 'administrateur'){
	header('location:index.php?page=accueil');
}

include_once('bin/params.php');
include_once('Models/m_administration.php');



include_once('View/v_administrateur.php');