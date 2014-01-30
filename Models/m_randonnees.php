<?php

function get_rando($code){
	global $bdd;

	$queryStr = '	SELECT rando.*, photo.nom AS nom_photo , galerie.nom AS nom_galerie
					FROM rando, photo, galerie
					WHERE rando.photo_principale = photo.numero
					AND photo.galerie = galerie.numero
					AND rando.code = :code';
	$queryArray = array('code' => $code);
	
	$query = $bdd->prepare($queryStr);
	$query->execute($queryArray);
	$data = $query->fetch(PDO::FETCH_OBJ);
	$query->closeCursor();
	
	return $data;
}