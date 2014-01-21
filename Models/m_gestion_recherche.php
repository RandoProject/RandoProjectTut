<?php


function affichage_title($title){
	global $bdd;

	$req = htmlspecialchars($title);

	$mots = explode(" ", $req);


	if(count($mots) > 0){
		$reqStr = "SELECT * FROM rando WHERE ";
		for($i = 0; $i < count($mots); $i++){
			$reqStr .= "titre LIKE '%".$mots[$i]."%'";
			if( $i < count( $mots ) - 1 ){
				$reqStr .= " OR ";
			}
		}

		$reqStr .= " ORDER BY longueur ASC";

		$requete= $bdd->query($reqStr) or die(print_r($erreur -> errorInfo()));
		$res = $requete->fetchAll();
		$requete->closeCursor();
		return $res;
	}
/*
	$requete = $bdd->prepare("SELECT * FROM rando WHERE LOWER(titre)= :title");
	$requete->execute(array('title' => strtolower($title))) or die(print_r($erreur -> errorInfo()));
	$res = $requete->fetchAll();
	$requete->closeCursor();
	return $res;
*/
}

function select_regions($select){
	global $bdd;
	$requete = $bdd->query("SELECT $select FROM regions ORDER BY nom ASC");
	$res = $requete->fetchAll();
	$requete->closeCursor();
	return $res;
}



function affichage_f_rando_complet($region, $typeRegion, $MAX_distance, $MIN_distance, $MAX_time, $MIN_time, $difficulty, $water){
	global $bdd;



	$reqValues = array();
	$reqArray = array();

	if($typeRegion == 's_region_true'){
		array_push($reqArray, "région = :region ");
		$reqValues['region'] = $region;
	}

	if($MAX_distance !== -1 && $MAX_distance !== false){
		if($MIN_distance >= 50){
			array_push($reqArray, "longueur >= :distance");
			$reqValues['distance'] = $MIN_distance;
		}
		else{
			array_push($reqArray, "longueur >= :distanceMin", "longueur <= :distanceMax");
			$reqValues['distanceMin'] = $MIN_distance;
			$reqValues['distanceMax'] = $MAX_distance;
		}
	}

	if($MAX_time !== false){
		if($MAX_time == 'inferieur_1h'){
		 		array_push($reqArray, "durée <= '01:00:00' ");
		}
		else if($MAX_time == 'vide_10' || $MAX_time == 'vide_24' || $MAX_time == 'vide_96'){
	 		array_push($reqArray, "durée <= :time"); 
	 		$reqValues['time'] = $MIN_time;
		}
		else{
			array_push($reqArray, "durée >= :timeMin", "durée <= :timeMax");
			$reqValues['timeMin'] = $MIN_time;
			$reqValues['timeMax'] = $MAX_time;
		}
	}

	if($difficulty == 1 || $difficulty == 2 || $difficulty == 3 || $difficulty == 4 || $difficulty == 5){
		array_push($reqArray, "difficulté = :difficulty");
		$reqValues['difficulty'] = $difficulty;
	}


	if($water != false){
		array_push($reqArray, "point_eau = :water");
		$reqValues['water'] = $water;
	}


	$reqStr = "SELECT * FROM rando";

	if(!empty($reqArray)){
		$reqStr .= " WHERE ".implode(' AND ', $reqArray);
	}
		$reqStr .= " ORDER BY longueur ASC";


	$req = $bdd->prepare($reqStr);
	$req->execute($reqValues) or die(print_r($erreur -> errorInfo()));
	$res = $req->fetchAll();
	$req->closeCursor();
	return $res;



}