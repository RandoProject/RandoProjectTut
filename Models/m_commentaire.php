<?php

function validation_commentaire($commentaire, $pseudo, $code, $note){
	global $bdd;

	$reqStr = "INSERT INTO commentaire(`date`, auteur, code_rando, commentaire, note, valide) VALUES(NOW(), :pseudo, :code, :commentaire, :note, 0)";
	$reqArray = array('pseudo' => $pseudo, 'code' => $code, 'commentaire' => $commentaire, 'note' => $note);

	$req = $bdd->prepare($reqStr);
	$req->execute($reqArray)  or die(print_r($erreur->errorInfo()));
	$req->closeCursor();
}


function recuperation_commentaire($code){
	global $bdd;

	$reqStr = "SELECT * FROM commentaire WHERE code_rando = :code ORDER BY `date` DESC";
	$reqArray = array('code' => $code);

	$req = $bdd->prepare($reqStr);
	$req->execute($reqArray)  or die(print_r($erreur->errorInfo()));
	$res = $req->fetchAll();
	$req->closeCursor();
	return $res;
}

function moyenne_note_rando($code){
	global $bdd;

	$reqStr = "SELECT AVG(note) as moyenne_note FROM commentaire WHERE code_rando = :code AND note != 0";
	$reqArray = array('code' => $code);

	$req = $bdd->prepare($reqStr);
	$req->execute($reqArray) or die(print_r($erreur->errorInfo()));
	$res = $req->fetch();
	$req->closeCursor();
	return $res;
}

function mise_a_jour_note($code, $moyenne){
	global $bdd;

	$reqStr = "UPDATE rando SET note = :moyenne WHERE code = :code";
	$reqArray = array('moyenne' => $moyenne, 'code' => $code);

	$req = $bdd->prepare($reqStr);
	$req->execute($reqArray)  or die(print_r($erreur->errorInfo()));
	$req->closeCursor();
}


function note_existante($code, $pseudo){
	global $bdd;

	$reqStr = "SELECT * FROM commentaire WHERE code = :code AND auteur = :pseudo AND note != 0";
	$reqArray = array('code' => $code, 'pseudo' => $pseudo);

	$req = $bdd->prepare($reqStr);
	$req->execute($reqArray) or die(print_r($erreur->errorInfo()));
	$res = $res->fetchAll();
	$req->closeCursor();

	return $res;
}