<?php

include_once('bin/params.php');
include_once('Models/m_gestion_recherche.php');
			
				/*Zone de TEST*/
/*
if(isset($_POST['title']) and $_POST['title'] != "")
{
		$affichage_titre_rando = affichage_title($_POST['title']);
}

if(isset($_POST['s_region']))
{
		$affichage_region = affichage_region($_POST['s_region']);
}



if(isset($_POST['title'],$_POST['s_region'])  and $_POST['title'] !="")
{
		$affichage_rando = affichage_f_rando($_POST['title'], $_POST['s_region']);
}
*/
				/*Fin de zone de TEST, je vais supprimer après, çà marche !*/

																				/*J'ai pas trouvé de moyen plus court pour faire tout çà, étant donné qu'il y a des intervalles, en faisant çà dans la fonction qui fera la requête à la base de donnée, j'aurais tous les cas possibles, et je pourrais définir les intervalles correctement, çà fait beaucoup je sais mais il y a beaucoup d'intervalle, et je n'ai pas trouvé plus facile à faire :/ */




if(isset($_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water']))
{
	$distance = $_POST['distance'];
	$possibleDistances = array('0', '5', '10', '15', '20', '25', '30', '40');
	$time = $_POST['time'];
	$possibleTimes = array('0', '1', '3', '10', '48', 'time_non_precise');

	if($_POST['s_region'] == "not_clarify"){
		$typeRegion = 's_region_false';
	}
	else{
		$typeRegion = 's_region_true';
	}

	if($distance in_array(array_slice($possibleDistances, 0, 6))){
		$typeDistance = 'distance_0_25';
	}
	else if($distance in_array(array_slice($possibleDistances, 6, 8))){
		$typeDistance = 'distance_30_40';
	}
	else if($distance == 'time_non_precise'){
		$typeDistance = 'distance_sup_50';
	}
	else{
		$typeDistance = false;
		// erreur
	}


	switch($time){
		case "0":				$typeTime = 'time_0'; break;
	case "1": 					$typeTime = 'time_1'; break;
	
	case "3":					$typeTime = 'time_3'; break;
	case "10":
	case "24": 					$typeTime = 'time_10_24';
	case "48":		 			$typeTime = 'time_48_96'; break;
	case  "time_non_precise": 	$typeTime = 'time_non_precise'; break;
	default:
		$typeTime = false;
		// erreur 
	break;
	}

$affichage_rando_complet = affichage_f_rando_complet($_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],$typeRegion, $typeDistance, $typeTime);

		
}


include_once('View/v_affichage_recherche.php');