<?php

function last_rando($nombre){
	global $bdd;
	
	$query = '	SELECT rando.code, rando.titre, photo.nom AS nom_photo , galerie.nom AS nom_galerie
				FROM rando, photo, galerie
				WHERE rando.photo_principale = photo.numero
				AND photo.galerie = galerie.numero
				AND valide = 1
				ORDER BY date_insertion DESC
				LIMIT 0, '.$nombre;
					 
	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
	$data = $exec->fetchAll();
	$exec->closeCursor();
	return $data;
}

function last_comment($nombre){
	global $bdd;
	
	$query = '	SELECT commentaire, auteur
				FROM commentaire
				ORDER BY date DESC
				LIMIT 0, '.$nombre;
					 
	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
	$data = $exec->fetchAll();
	$exec->closeCursor();
	return $data;
}