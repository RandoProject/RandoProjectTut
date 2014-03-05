<?php

function insert_parcours($nom, $nbPoints){
	global $bdd;

	$req = $bdd->prepare('INSERT INTO parcours(nom, nb_point) VALUES(:nom, :nb_points)');
	$bdd->exec('LOCK TABLES parcours WRITE'); // Empèche l'écritue, pour ne pas avoir d'erreur sur last id
	$req->execute(array('nom' => $nom,
						'nb_points' => $nbPoints));
	$res = $bdd->lastInsertId();
	$bdd->exec('UNLOCK TABLES');

	$req = $bdd->prepare('UPDATE parcours SET nom = CONCAT_WS(\'_\', :id, nom) WHERE id = :id'); // Avec l'id on change maintenant le nom
	$req->execute(array('id' => $res));

	return $res;
}

function get_parcours($id){
	global $bdd;

	$req = $bdd->prepare('SELECT * FROM parcours WHERE id = :id');
	$req->execute(array('id' => $id));

	return $req->fetch(PDO::FETCH_OBJ);
}