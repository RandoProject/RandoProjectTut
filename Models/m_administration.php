<?php

/* Les fonctions de ce fichier concernent les opération sur l'administration et la modération */

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
}

function get_liste_comment($condition){
	global $bdd;

	$query = '	SELECT *
				FROM commentaire '.$condition;

	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
	$data = $exec->fetchAll();
	$exec->closeCursor();
	return $data;
}

function get_liste_member(){
	global $bdd;

	$query = '	SELECT *
				FROM membre';

	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
	$data = $exec->fetchAll();
	$exec->closeCursor();
	return $data;
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
}


/* ACTION sur les COMMENTAIRES */
function validate_comment($listeCode){
	global $bdd;

	$query = '	UPDATE commentaire 
				SET valide = 1
				WHERE numero IN (';
				
	foreach($listeCode as $code){
		$query .= $code.', ';
	}
	$query = substr($query, 0, -2).')';

	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
}

function delete_comment($listeNumero){
	global $bdd;

	$query = '	DELETE FROM commentaire
				WHERE numero IN (';
				
	foreach($listeNumero as $numero){
		$query .= $numero.', ';
	}
	$query = substr($query, 0, -2).')';

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

function update_rando($listeCode, $listeTitre, $listeEquipement, $listeDescription){
	global $bdd;
	$i = 0;
	foreach($listeCode as $code){
		$query = '	UPDATE  rando 
					SET titre = "'.$listeTitre[$i].'",
						equipement = "'.$listeEquipement[$i].'",
						descriptif = "'.$listeDescription[$i].'"
					WHERE code = '.$code;

		$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
		$i++;
	}
}

function liste_update($listeCode){
	global $bdd;

	$query = '	SELECT rando.*, departements.nom AS nom_departement, photo.nom AS nom_photo , galerie.nom AS nom_galerie
				FROM rando, photo, galerie, departements
				WHERE rando.photo_principale = photo.numero
				AND photo.galerie = galerie.numero
				AND rando.departement = departements.num_departement 
				AND code IN (';
				
	foreach($listeCode as $code){
		$query .= $code.', ';
	}
	$query = substr($query, 0, -2).')';

	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
	$data = $exec->fetchAll();
	$exec->closeCursor();
	return $data;
}

function update_note_rando($listeCode){
	global $bdd;

	foreach($listeCode as $code){
		$query = '	UPDATE rando 
					SET note = (	SELECT AVG(note) 
									FROM commentaire 
									WHERE code_rando = '.$code.')
					WHERE code = '.$code;

		$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
	}
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