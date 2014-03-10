<?php
	function get_gallerie(){
		global $bdd;

		$reqStr = '	SELECT *, photo.nom AS nom_photo, galerie.nom AS nom_galerie, galerie.numero AS num_galerie 
					FROM rando, photo, galerie 
				   	WHERE rando.photo_principale = photo.numero 
					AND photo.galerie = galerie.numero 
					AND rando.valide = 1';

		$req = $bdd->query($reqStr);
		$res = $req->fetchAll();
		$req->closeCursor();
		return $res;
}