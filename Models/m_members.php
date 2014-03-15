<?php

/* Les fonctions de ce fichier concernent les opération sur les membres dans la base de donnée */

function get_member($pseudo, $pass = false){
	global $bdd;

	$reqStr = 'SELECT * FROM membre WHERE pseudo = :pseudo';
	$reqArray = array('pseudo' => $pseudo);
	if($pass !== false){
		$reqStr .= ' AND mdp = :pass';
		$reqArray['pass'] = $pass;
	}

	$req = $bdd->prepare($reqStr);
	$req->execute($reqArray);
	$result = $req->fetch(PDO::FETCH_OBJ);
	
	$req->closeCursor();
	return $result;
}

function get_photo($pseudo){
	global $bdd;

	$reqStr = '	SELECT photo.nom AS photo, galerie.nom AS galerie 
				FROM photo, galerie
				WHERE photo.galerie = galerie.numero
				AND photo.numero = (SELECT membre.photo FROM membre WHERE pseudo = :pseudo)';
	$reqArray = array('pseudo' => $pseudo);

	$req = $bdd->prepare($reqStr);
	$req->execute($reqArray);
	$result = $req->fetch(PDO::FETCH_OBJ);
	
	$req->closeCursor();
	return $result;
}

function get_rando_of($pseudo){
	global $bdd;

	$reqStr = '	SELECT rando.* , departements.nom AS nom_departement, photo.nom AS nom_photo, galerie.nom AS nom_galerie
				FROM rando, photo, galerie, departements
				WHERE rando.photo_principale = photo.numero
				AND photo.galerie = galerie.numero
				AND rando.departement = departements.num_departement
				AND auteur = :pseudo
				ORDER BY date_insertion DESC';
	$reqArray = array('pseudo' => $pseudo);

	$req = $bdd->prepare($reqStr);
	$req->execute($reqArray);
	$result = $req->fetchAll();

	$req->closeCursor();
	return $result;
}