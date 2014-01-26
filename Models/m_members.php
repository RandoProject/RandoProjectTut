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

	$reqStr = 'SELECT photo.nom FROM photo WHERE numero = (SELECT membre.photo FROM membre WHERE pseudo = :pseudo)';
	$reqArray = array('pseudo' => $pseudo);

	$req = $bdd->prepare($reqStr);
	$req->execute($reqArray);
	$result = $req->fetch(PDO::FETCH_OBJ);
	
	$req->closeCursor();
	return $result;
}