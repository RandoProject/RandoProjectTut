<?php

include_once('bin/params.php');
include_once('Models/m_gestion_recherche.php');


if(isset($_POST['title']) and $_POST['title'] != "")
{
		$affichage_titre_rando = affichage_title($_POST['title']);
}
if(isset($_POST['region']))
{
		$affichage_region = affichage_region($_POST['region']);
}
include_once('View/v_affichage_recherche.php');