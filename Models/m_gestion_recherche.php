<?php

function affichage_title($title){
	global $bdd;
	
	$req = htmlspecialchars($title);
	$mots = explode(' ', $req);
	
	if(count($mots) > 0){
		$reqStr = '	SELECT rando.*,  departements.nom AS nom_departement, photo.nom AS nom_photo, galerie.nom AS nom_galerie 
					FROM rando, photo, galerie, departements
					WHERE rando.photo_principale = photo.numero 
					AND photo.galerie = galerie.numero
					AND rando.departement = departements.num_departement';
		$i = 0;
		$parenthese = 0;
		while($i < count($mots)){ // Ajoute AND si il y a un mot non vide dans le tableau
			if($mots[$i] !== ''){
				$reqStr .= ' AND (';
				$parenthese = 1;
				break;
			}
			$i++;
		}
		for($i = 0; $i < count($mots); $i++){ // Ajoute les conditions si le tableau n'est pas vide
			if($mots[$i] !== ''){ // Ajoute les conditions si le mot n'est pas vide
				$reqStr .= 'titre LIKE "%'.$mots[$i].'%"';
				$j = $i+1;
				while($j < count($mots)){ // Ajoute OR si il y a un autre mot non vide dans le tableau
					if($mots[$j] !== ''){
						$reqStr .= ' OR ';
						break;
					}
					$j++;
				}
			}
		}
		if($parenthese === 1){
			$reqStr .= ')';
		}
		$reqStr .= ' ORDER BY longueur ASC';

		$requete= $bdd->query($reqStr) or die(print_r($erreur -> errorInfo()));
		$res = $requete->fetchAll();
		$requete->closeCursor();
		return $res;
	}
}


function select_regions($select){
	global $bdd;
	$requete = $bdd->query("SELECT $select  FROM regions ORDER BY nom ASC");
	$res = $requete->fetchAll();
	$requete->closeCursor();
	return $res;
}


function selection_rando_recente(){
	global $bdd;

	$reqStr = '	SELECT *, departements.nom AS nom_departement, photo.nom AS nom_photo, galerie.nom AS nom_galerie
				FROM rando, photo, galerie, departements
				WHERE rando.photo_principale = photo.numero
				AND photo.galerie = galerie.numero
				AND rando.departement = departements.num_departement 
				ORDER BY date_insertion DESC 
				LIMIT 0, 10';
				
	$req = $bdd->query($reqStr);
	$result = $req->fetchAll();
	$req->closeCursor();
	return $result;
}


function affichage_f_rando_complet($region, $typeRegion, $MAX_distance, $MIN_distance, $MAX_time, $MIN_time, $difficulty, $water){
	global $bdd;

	$reqValues = array();
	$reqArray = array();

	if($typeRegion == 's_region_true'){
		array_push($reqArray, "departement IN (SELECT num_departement FROM departements WHERE num_region = :region)");
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
		 		array_push($reqArray, "duree <= '01:00:00' ");
		}
		else if($MAX_time == 'vide_10' || $MAX_time == 'vide_24' || $MAX_time == 'vide_96'){
	 		array_push($reqArray, "duree <= :time"); 
	 		$reqValues['time'] = $MIN_time;
		}
		else{
			array_push($reqArray, "duree >= :timeMin", "duree <= :timeMax");
			$reqValues['timeMin'] = $MIN_time;
			$reqValues['timeMax'] = $MAX_time;
		}
	}

	if($difficulty == 1 || $difficulty == 2 || $difficulty == 3 || $difficulty == 4 || $difficulty == 5){
		array_push($reqArray, "difficulte = :difficulty");
		$reqValues['difficulty'] = $difficulty;
	}

	if($water != false){
		array_push($reqArray, "point_eau = :water");
		$reqValues['water'] = $water;
	}

	$reqStr = '	SELECT rando.*, departements.nom AS nom_departement, photo.nom AS nom_photo, galerie.nom AS nom_galerie
				FROM rando, photo, galerie, departements
				WHERE rando.photo_principale = photo.numero
				AND photo.galerie = galerie.numero
				AND rando.departement = departements.num_departement';

	if(!empty($reqArray)){
		$reqStr .= ' AND '.implode(' AND ', $reqArray);
	}
	$reqStr .= ' ORDER BY longueur ASC';

	$req = $bdd->prepare($reqStr);
	$req->execute($reqValues) or die(print_r($erreur -> errorInfo()));
	$res = $req->fetchAll();
	$req->closeCursor();
	return $res;
}