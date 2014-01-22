<?php

include_once('bin/params.php');
include_once('Models/m_gestion_recherche.php');
			
/* Recherche par mot clé */
if(isset($_POST['title'])){
		$affichage_titre_rando = affichage_title($_POST['title']);
}

/* Recherche via le formulaire */
if(isset($_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'])){
	$distance = $_POST['distance'];
	$possibleDistances = array('0', '5', '10', '15', '20', '25', '30', '40', '50');
	$time = $_POST['time'];
	$difficulty = $_POST['difficulty'];
	$water = $_POST['water'];

	if($_POST['s_region'] == "not_clarify"){
		$typeRegion = 's_region_false';
	}
	else{
		$typeRegion = 's_region_true';
	}

	if(in_array($distance , array_slice($possibleDistances, 0, 6))){
		$MAX_distance = intval($distance) + 5;
		$MIN_distance = intval($distance);
	}
	else if(in_array($distance, array_slice($possibleDistances, 6, 8))){
		$MAX_distance = intval($distance) + 10;
		$MIN_distance = intval($distance);
	}
	else if($distance == 'non_precise'){ /* Si la distance n'est pas sélectionné */
		$MAX_distance = -1;
		$MIN_distance = -1;
	}
	else if($distance == '50'){	/* Si la distance sélectionnée est supérieur ou égal à 50KM */
		$MAX_distance = 1;
		$MIN_distance = intval($distance);
	}
	else{
		$MAX_distance = false;
		$MIN_distance = false;
		// erreur
	}

	switch($time){

		case "00:00:00":	
				$MAX_time = 'inferieur_1h';
				$MIN_time = '00:00:00';
				break;
		
		case "01:00:00": 					
				$MAX_time = '03:00:00';
				$MIN_time = '01:00:00';
				break;
	
		case "03:00:00":					
				$MAX_time = '06:00:00';
				$MIN_time = '03:00:00';
				break;

		case "10:00:00": // Changement à faire
				$MAX_time = 'vide_10';
				$MIN_time = '10:00:00';
				break;

		case "24:00:00": 					
				$MAX_time = 'vide_24';
				$MIN_time = '24:00:00';
				break;

		case "48:00:00":		 			
				$MAX_time = '96:00:00';
				$MIN_time = '48:00:00';
				break;

		case "96:00:00":
				$MAX_time = 'vide_96';
				$MIN_time = '96:00:00';
				break;

		case  "time_non_precise": 	
				$MAX_time = 'vide';
				$MIN_time = '00:00:00';
				break;

		default:
				$MAX_time = false;
				$MIN_time = false;
				// erreur 
				break;
	}

	if (in_array($difficulty,array('1', '2', '3', '4', '5'))){
		$difficulty= intval($difficulty);
	}
	else{
		$difficulty = 'non_precise';
	}

	if($water == "0" || $water== "1"){
		$water = intval($water);
	}
	else{
		$water = false;
	}

	$affichage_rando_complet = affichage_f_rando_complet($_POST['s_region'], $typeRegion, $MAX_distance, $MIN_distance, $MAX_time, $MIN_time, $difficulty, $water);
}

/* Affichage des régions */
$listeRegion = select_regions('num_region, nom');

include_once('View/v_recherche_avancee.php');