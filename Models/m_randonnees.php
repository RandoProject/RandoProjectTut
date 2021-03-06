<?php

function get_rando($code){
	global $bdd;

	$queryStr = '	SELECT rando.*, departements.nom AS nom_departement, photo.nom AS nom_photo, galerie.nom AS nom_galerie, galerie.nom AS nom_galerie, (	SELECT COUNT(*) 
																														FROM commentaire
																														WHERE note
																														BETWEEN 1 
																														AND 5 
																														AND code_rando = rando.code
																														) AS nb_note
					FROM rando
					LEFT JOIN departements
				        ON rando.departement = departements.num_departement
					JOIN photo 
						ON rando.photo_principale = photo.numero
					JOIN galerie 
						ON photo.galerie = galerie.numero
					WHERE rando.code = :code';
	$queryArray = array('code' => $code);
	
	$query = $bdd->prepare($queryStr);
	$query->execute($queryArray);

	$data = $query->fetch(PDO::FETCH_OBJ);
	$query->closeCursor();
	
	return $data;
}

// Attention, cette rando renvoie le curseur et non une rando
function get_rando_with_route(){
	global $bdd;
	$req = $bdd->query('SELECT rando.*, parcours.*, departements.nom AS nom_departement, photo.nom AS nom_photo, galerie.nom AS nom_galerie, (	SELECT COUNT(*) 
																																FROM commentaire
																																WHERE note
																																BETWEEN 1 
																																AND 5 
																																AND code_rando = rando.code
																																) AS nb_note
					FROM rando, photo, galerie, departements, parcours
					WHERE rando.parcours IS NOT NULL 
					AND rando.parcours = parcours.id
					AND rando.photo_principale = photo.numero 
					AND photo.galerie = galerie.numero
					AND rando.departement = departements.num_departement
					AND rando.valide = 1');
	return $req;
}


function insert_rando($title, $delay, $difficulty, $description, $water, $autor, $departement, $length, $parcours, $galerie, $photo, $deniv){
	global $bdd;
	$queryStr = 'INSERT INTO rando(titre, duree, difficulte, descriptif, point_eau, auteur, date_insertion, departement, longueur, parcours, galerie, photo_principale, denivele, valide)
				VALUES(:title, :delay, :difficulty, :description, :water, :autor, NOW(), :departement, :longueur, :parcours, :galerie, :photo_principale, :denivele, 0)';
	$query = $bdd->prepare($queryStr);

	$query->execute(array(':title' => $title,
						  ':delay' => $delay,
						  ':difficulty' => $difficulty,
						  ':description' => $description,
						  ':water' => $water,
						  ':autor' => $autor,
						  ':departement' => $departement,
						  ':longueur' => $length,
						  ':parcours' => $parcours,
						  'galerie' => $galerie,
						  ':photo_principale' => $photo,
						  ':denivele' => $deniv));

}


function get_galery($code){
	global $bdd;

	$queryStr = '	SELECT nom, descriptif
					FROM photo
					WHERE galerie = ( 	SELECT galerie
										FROM rando
										WHERE code = '.$code.')
					AND photo.numero <> (	SELECT photo_principale
											FROM rando
											WHERE code = '.$code.')';
	$query= $bdd->query($queryStr) or die(print_r($erreur -> errorInfo()));
	$data = $query->fetchAll();
	$query->closeCursor();
	
	return $data;
}

function count_rando($title = false){
	global $bdd;

	$queryStr = 'SELECT COUNT(code) AS nb_rando FROM rando';
	$queryArray = array();
	if($title !== false){
		$queryStr .= ' WHERE LOWER(titre) = :titre';
		$queryArray[':titre'] = $title;
	}
	$query = $bdd->prepare($queryStr);
	$query->execute($queryArray);
	
	return $query->fetch(PDO::FETCH_OBJ);
}



function get_nom_parcour($idParcour){
	global $bdd;
	
	$reqStr = 'SELECT parcours.nom AS nom_parcour FROM parcours WHERE id = :idParcour';
	$reqArray = array('idParcour' => $idParcour);
	
	$req = $bdd->prepare($reqStr);
	$req->execute($reqArray);
	
	$resultat = $req->fetch(PDO::FETCH_OBJ);
	$req->closeCursor();
	
	return $resultat;	
}




