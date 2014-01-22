<?php

function dernieres_rando($nombre){
	global $bdd;
	$requete = $bdd->query("SELECT titre, photo.nom AS nom_photo , galerie.nom AS nom_galerie
							FROM rando, photo, galerie
							WHERE rando.photo_principale = photo.numero
							AND photo.galerie = galerie.numero
							ORDER BY date_insertion DESC
							LIMIT 0, $nombre");
	$res = $requete->fetchAll();
	$requete->closeCursor();
	return $res;
}