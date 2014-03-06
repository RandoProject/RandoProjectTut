<?php

/* Les fonctions de ce fichier concernent les opération sur l'administration et la modération */

/* GETTERS */
function get_liste_rando($condition){
	global $bdd;

	$query = '	SELECT rando.*, departements.nom AS nom_departement, photo.nom AS nom_photo , galerie.nom AS nom_galerie
				FROM rando, photo, galerie, departements
				WHERE rando.photo_principale = photo.numero
				AND photo.galerie = galerie.numero
				AND rando.departement = departements.num_departement
				'.$condition.'
				ORDER BY date_insertion DESC';
				
	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
	$data = $exec->fetchAll();
	$exec->closeCursor();
	return $data;
}

function get_liste_comment($condition){
	global $bdd;

	$query = '	SELECT *
				FROM commentaire
				'.$condition.'
				ORDER BY date DESC';

	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
	$data = $exec->fetchAll();
	$exec->closeCursor();
	return $data;
}

function get_liste_photo($condition){
	global $bdd;

	$query = '	SELECT photo.*, galerie.nom AS nom_galerie
				FROM photo, galerie
				WHERE photo.galerie = galerie.numero '.$condition;

	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
	$data = $exec->fetchAll();
	$exec->closeCursor();
	return $data;
}

function get_liste_member(){
	global $bdd;

	$query = '	SELECT membre.*, photo.nom AS nom_photo , galerie.nom AS nom_galerie
				FROM membre, photo, galerie
				WHERE membre.photo = photo.numero
				AND galerie.numero = photo.galerie';

	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
	$data = $exec->fetchAll();
	$exec->closeCursor();
	return $data;
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
		$titre = addslashes($listeTitre[$i]);
		$equipement = addslashes($listeEquipement[$i]);
		$description = addslashes($listeDescription[$i]);
		
		$query = '	UPDATE  rando 
					SET titre = "'.$titre.'",
						equipement = "'.$equipement.'",
						descriptif = "'.$description.'"
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
	$query .= 'ORDER BY date_insertion DESC';
	
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


/* ACTION sur les PHOTOS */
function validate_photo($listeNumero){
	global $bdd;

	$query = '	UPDATE photo 
				SET valide = 1
				WHERE numero IN (';
				
	foreach($listeNumero as $numero){
		$query .= $numero.', ';
	}
	$query = substr($query, 0, -2).')';

	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
}

function delete_photo($listeNumero){
	global $bdd;

	$query = '	DELETE FROM photo
				WHERE numero IN (';
				
	foreach($listeNumero as $numero){
		$query .= $numero.', ';
	}
	$query = substr($query, 0, -2).')';

	$exec = $bdd->query($query) or die(print_r($erreur -> errorInfo()));
}


/* ACTION sur les PHOTOS */
function delete_member($listePseudo){
	global $bdd;

	$query = '	DELETE FROM membre
				WHERE pseudo IN (';
				
	foreach($listePseudo as $pseudo){
		$query .= '\''.$pseudo.'\', ';
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

function printAddress($adresse, $cp, $ville){
	if(empty($adresse) && empty($cp) && empty($ville)){
		return '<em>non renseignée</em>';
	}
	else{
		if(!empty($adresse)){
			$address = $adresse;
		}
		if(!empty($cp)){
			if(!empty($adresse))
				$address .= ', '.$cp;
			else
				$address = $cp;
		}
		if(!empty($ville)){
			if(!empty($adresse) || !empty($cp))
				$address .= ', '.$ville;
			else
				$address = $ville;
		}
	}
	return $address;
}
?>
 
<script language="javascript">
	/* Cocher / Décocher UN checkbox
	 * id : id du checkbox à cocher
	 */
	function unCheck(id){
		if(!document.getElementById(id).checked){
			document.getElementById(id).checked = true;
		}
		else{
			document.getElementById(id).checked = false;
		}
	}
	
	/* Cocher / Décocher TOUS les checkbox
	 * id : id du checkbox principal qui coche les autres
	 */
	function unCheckAll(id){ 
		var inputs = document.getElementsByTagName("input");
		var value = false;
		if(document.getElementById(id).checked){
			value = true;
		}
		for(var i = 0; i < inputs.length; i++){
			if(inputs[i].type == "checkbox" && inputs[i] != document.getElementById(id)){
				inputs[i].checked = value;
			}
		}
	}
</script>