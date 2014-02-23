<?php

/* Les fonctions de ce fichier concernent les opération sur l'administration et la modération */

/*
a faire : 
tableau rando, membre, commentaire, photo
dernier ajout de rando, galerie ajouté
*/

/* GETTERS */
function get_liste_rando($condition){
	global $bdd;

	$query = '	SELECT rando.*, departements.nom AS nom_departement, photo.nom AS nom_photo , galerie.nom AS nom_galerie
				FROM rando, photo, galerie, departements
				WHERE rando.photo_principale = photo.numero
				AND photo.galerie = galerie.numero
				AND rando.departement = departements.num_departement '.$condition;
				
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

/* ACTION sur les COMMENTAIRES */
function delete_comment($numero){
	global $bdd;

	$query = '	DELETE FROM commentaire
				WHERE numero = '.$numero;
				
	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
}

/* ACTION sur les RANDONEES */
function validate_rando($listeCode){
	global $bdd;

	$query = '	UPDATE  rando 
				SET valide = 1
				WHERE code IN (';
				
	foreach($listeCode as $code){
		$query .= $code.', ';
	}
	$query = substr($query, 0, -2).')';

	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
}

function delete_rando($listeCode){
	global $bdd;

	$query = '	DELETE FROM  rando 
				WHERE code IN (';
				
	foreach($listeCode as $code){
		$query .= $code.', ';
	}
	$query = substr($query, 0, -2).')';

	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
}

/* UTILITAIRES */
function truncate($string, $lenght = 150) {
	if (strlen($string) > $lenght) {
		$string = substr($string, 0, $lenght);
		$position_espace = strrpos($string, " ");
		$texte = substr($string, 0, $position_espace); 
		$string = $texte."...";
	}
	return $string;
}

function print_date($olddate){
	$date = new DateTime(trim($olddate));
	$month = $date->format('m');
	switch($month) {
		case '01': $month = 'Janvier'; break;
		case '02': $month = 'Février'; break;
		case '03': $month = 'Mars'; break;
		case '04': $month = 'Avril'; break;
		case '05': $month = 'Mai'; break;
		case '06': $month = 'Juin'; break;
		case '07': $month = 'Juillet'; break;
		case '08': $month = 'Août'; break;
		case '09': $month = 'Septembre'; break;
		case '10': $month = 'Octobre'; break;
		case '11': $month = 'Novembre'; break;
		case '12': $month = 'Décembre'; break;
		default: $month =''; break;
	}
	return $date->format('d').' '.$month.' '.$date->format('Y').' '.$date->format('H').'h'.$date->format('i');
}