<?php

function get_rando($code){
	global $bdd;

	$queryStr = '	SELECT rando.*, departements.nom AS nom_departement, photo.nom AS nom_photo , galerie.nom AS nom_galerie
					FROM rando, photo, galerie, departements
					WHERE rando.photo_principale = photo.numero
					AND photo.galerie = galerie.numero
					AND rando.departement = departements.num_departement
					AND rando.code = :code';
	$queryArray = array('code' => $code);
	
	$query = $bdd->prepare($queryStr);
	$query->execute($queryArray);
	$data = $query->fetch(PDO::FETCH_OBJ);
	$query->closeCursor();
	
	return $data;
}

function insert_rando($title, $delay, $difficulty, $description, $water, $autor, $departement){
	global $bdd;
	$queryStr = 'INSERT INTO rando(titre, duree, difficulte, descriptif, point_eau, auteur, date_insertion, departement, parcours)
				VALUES(:title, :delay, :difficulty, :description, :water, :autor, NOW(), :departement, 1)';
	$query = $bdd->prepare($queryStr);
	$query->execute(array(':title' => $title,
						  ':delay' => $delay,
						  ':difficulty' => $difficulty,
						  ':description' => $description,
						  ':water' => $water,
						  ':autor' => $autor,
						  ':departement' => $departement));
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