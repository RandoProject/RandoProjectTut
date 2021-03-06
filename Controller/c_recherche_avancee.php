<?php
define("DISTANCE_MAX", 250); // La distance(en km) max auxquelle on peut chercher une randonn�e en g�olocalisation

include_once('bin/params.php');
include_once('Models/m_gestion_recherche.php');
include_once('Models/m_commentaire.php');

if(isset($_POST['lat']) and isset($_POST['lon']) and is_numeric($_POST['lat']) and is_numeric($_POST['lon'])){ // Si g�olocalisation
	include_once('Models/m_randonnees.php');
	include_once('bin/functions.php');
	$listeRando = array(); // Contiendra la liste des randos tri�e par distance par rapport au point g�olocalis�
	$cursor = get_rando_with_route();

	while($ramble = $cursor->fetch(PDO::FETCH_ASSOC)){ // ramble : randonn�e
		if($ramble['depart_lat'] != 0 or $ramble['depart_lon'] != 0){ // Sont �gales � z�ro dans le cas o� on ne connait pas le point de d�part
			$ramble['distance'] = round(compareCoord($_POST['lat'], $_POST['lon'], $ramble['depart_lat'], $ramble['depart_lon']), 1); // On rajoute une cl�e distance dans le tableau
			if($ramble['distance'] <= DISTANCE_MAX){
				$i = 0;
				while($i < count($listeRando) and $ramble['distance'] >= $listeRando[$i]['distance']) $i++;

				array_insert($listeRando, $ramble, $i); // Fonction dans functions.php
			}
		}
	}
	$cursor->closeCursor();
}
else{
	/* Recherche par mot cl� */
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
			$value_distance = intval($distance);
		}
		else if(in_array($distance, array_slice($possibleDistances, 6, 8))){
			$MAX_distance = intval($distance) + 10;
			$MIN_distance = intval($distance);
			$value_distance = intval($distance);
		}
		else if($distance == 'non_precise'){ /* Si la distance n'est pas s�lectionn� */
			$MAX_distance = -1;
			$MIN_distance = -1;
		}
		else if($distance == '50'){	/* Si la distance s�lectionn�e est sup�rieur ou �gal � 50KM */
			$MAX_distance = 1;
			$MIN_distance = intval($distance);
			$value_distance = intval($distance);
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
					$value_time = "00:00:00";
					break;
			case "01:00:00": 					
					$MAX_time = '03:00:00';
					$MIN_time = '01:00:00';
					$value_time = "01:00:00";
					break;
			case "03:00:00":					
					$MAX_time = '06:00:00';
					$MIN_time = '03:00:00';
					$value_time = "03:00:00";
					break;
			case "10:00:00": // Changement � faire
					$MAX_time = 'vide_10';
					$MIN_time = '10:00:00';
					$value_time = "10:00:00";
					break;
			case "24:00:00": 					
					$MAX_time = 'vide_24';
					$MIN_time = '24:00:00';
					$value_time = "24:00:00";
					break;
			case "48:00:00":		 			
					$MAX_time = '96:00:00';
					$MIN_time = '48:00:00';
					$value_time = "48:00:00";
					break;
			case "96:00:00":
					$MAX_time = 'vide_96';
					$MIN_time = '96:00:00';
					$value_time = "96:00:00";
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
			$value_difficulte = intval($difficulty);
		}
		else{
			$difficulty = 'non_precise';
		}
		if($water == "0" || $water== "1"){
			$water = intval($water);
			$value_water = intval($water);
		}
		else{
			$water = false;
		}

		$affichage_rando_complet = affichage_f_rando_complet($_POST['s_region'], $typeRegion, $MAX_distance, $MIN_distance, $MAX_time, $MIN_time, $difficulty, $water);

		//r�cup�ration des variables pour afficher dans les selects apr�s une recherche
		if($typeRegion == "s_region_true"){
			if(is_numeric($_POST['s_region']) and intval($_POST['s_region']) >= 1 and intval($_POST['s_region']) <= 22){
				$value_region = $_POST['s_region'];
			}
		}
	}

	/* S�lection randonn�e r�cente */
	$rando_recente = selection_rando_recente();

	/* R�cup�ration des donn�es */
	if(empty($_POST['envoie_formulaire']) && empty($_POST['envoie_titre']) && !isset($_GET['region'])){
		$listeRando = $rando_recente;
	}
	else if(isset($_POST['envoie_formulaire'])){
		$listeRando = $affichage_rando_complet;
	}
	else if(isset($_POST['envoie_titre'])){
		$listeRando = $affichage_titre_rando;
		if(isset($_POST['title'])){
			$value_name_title = strip_tags($_POST['title']);
		}
	}
	else if(isset($_GET['region']) && $_GET['region'] > 0 && $_GET['region'] < 23){
		$listeRando = affichage_f_rando_complet($_GET['region'], 's_region_true', -1, -1, false, false, 'non_precise', false);
		$value_region = $_GET['region'];
	}
	else{
		$listeRando = NULL;
	}
}

/* S�lection des r�gions */
$listeRegion = select_regions('num_region, nom');

include_once('View/v_recherche_avancee.php');