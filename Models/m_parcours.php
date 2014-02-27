<?php

function insert_parcours($nom, $nbPoints){
	global $bdd;

	$req = $bdd->prepare('INSERT INTO parcours(nom, nb_point) VALUES(:nom, :nb_points)');
	$bdd->exec('LOCK TABLES parcours WRITE'); // Empèche l'écritue, pour ne pas avoir d'erreur sur last id
	$req->execute(array('nom' => $nom,
						'nb_points' => $nbPoints));
	$res = $bdd->lastInsertId();
	$bdd->exec('UNLOCK TABLES');
	// UPDATE nom ----------------------------------------------------------------
	return $res;
}