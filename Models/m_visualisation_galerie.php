<?php

function get_photos_galerie($num_galerie){
	global $bdd;

	$reqStr = '	SELECT galerie.nom AS nom_galerie, photo.nom AS nom_photo
				FROM galerie, photo
				WHERE galerie.numero = :num_galerie 
				AND photo.galerie = galerie.numero';
				
	$reqArray = array('num_galerie' => $num_galerie);

	$req = $bdd->prepare($reqStr);
	$req->execute($reqArray);
	$res = $req->fetchAll();
	$req->closeCursor();
	return $res;
}

function get_infos_rando($num_galerie){
	global $bdd;
	$reqStr = '	SELECT rando.*, rando.galerie
				FROM rando, galerie
				WHERE galerie.numero = :num_galerie
				AND rando.galerie = galerie.numero';
				
	$reqArray = array('num_galerie' => $num_galerie);

	$req = $bdd->prepare($reqStr);
	$req->execute($reqArray);
	$res = $req->fetch(PDO::FETCH_OBJ);
	$req->closeCursor();
	return $res;
}


function get_nb_photo($num_galerie){
	global $bdd;

	$reqStr = ' SELECT count(photo.numero) as nb_photo 
				FROM photo 
				WHERE photo.galerie = :num_galerie';

	$reqArray = array('num_galerie' => $num_galerie);

	$req = $bdd->prepare($reqStr);
	$req->execute($reqArray);
	$res = $req->fetch();
	$req->closeCursor();

	return $res;
}