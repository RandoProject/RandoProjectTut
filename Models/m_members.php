<?php
/* Les fonctions de ce fichier concernent les opération sur les membres dans la base de donnée*/

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
	print_r($result);
	$req->closeCursor();
	return $result;
}