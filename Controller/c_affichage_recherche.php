<?php

include_once('bin/params.php');
include_once('Models/m_gestion_recherche.php');


if(isset($_POST['title']) and $_POST['title'] != "")
{
		$affichage_rando = affichage($_POST['title']);
}
include_once('View/v_affichage_recherche.php');