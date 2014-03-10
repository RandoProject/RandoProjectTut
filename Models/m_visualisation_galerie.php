<?php
	function get_photos_galerie($num_galerie){
		global $bdd;

		$reqStr = '	SELECT rando.*, galerie.nom AS nom_galerie, photo.nom AS nom_photo 
					FROM galerie, photo , rando
					WHERE galerie.numero = :num_galerie 
					AND photo.galerie = galerie.numero 
					AND rando.galerie = galerie.numero';
					
		$reqArray = array('num_galerie' => $num_galerie);

		$req = $bdd->prepare($reqStr);
		$req->execute($reqArray);
		$res = $req->fetchAll();
		$req->closeCursor();
		return $res;
	}