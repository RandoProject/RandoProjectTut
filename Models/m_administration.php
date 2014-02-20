<?php

/* Les fonctions de ce fichier concernent les opération sur l'administration */

/*
a faire : 
tableau rando, membre, commentaire, photo
dernier ajout de rando, galerie ajouté
*/

function get_liste_rando(){
	global $bdd;

	$query = '	SELECT rando.*, departements.nom AS nom_departement, photo.nom AS nom_photo , galerie.nom AS nom_galerie
				FROM rando, photo, galerie, departements
				WHERE rando.photo_principale = photo.numero
				AND photo.galerie = galerie.numero
				AND rando.departement = departements.num_departement';

	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
	$data = $exec->fetchAll();
	$exec->closeCursor();
	return $data;
	
	$req->closeCursor();
	return $result;
}

function get_liste_member(){
	global $bdd;

	$query = '	SELECT *
				FROM membre';

	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
	$data = $exec->fetchAll();
	$exec->closeCursor();
	return $data;
	
	$req->closeCursor();
	return $result;
}

function get_liste_comment(){
	global $bdd;

	$query = '	SELECT *
				FROM commentaire';

	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
	$data = $exec->fetchAll();
	$exec->closeCursor();
	return $data;
	
	$req->closeCursor();
	return $result;
}

function get_galery(){
	global $bdd;

	$query = '	SELECT galerie.*, photo.nom AS nom_photo
				FROM galerie, photo
				WHERE photo.galerie = galerie.numero';

	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
	$data = $exec->fetchAll();
	$exec->closeCursor();
	return $data;
	
	$req->closeCursor();
	return $result;
}

function delete_comment($numero){
	global $bdd;

	$query = '	DELETE FROM commentaire
				WHERE numero = '.$numero;
				
	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
}