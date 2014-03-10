<?php
include_once('bin/params.php');
include_once('Models/m_visualisation_galerie.php');

	if(isset($_GET['num_galerie'])){
		$liste_photos = get_photos_galerie($_GET['num_galerie']);
		include_once('View/v_visualisation_galerie.php');
	}
