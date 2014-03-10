<?php
	function get_photos_galerie($num_galerie){
		global $bdd;

		$reqStr = "SELECT galerie.nom AS nom_galerie, photo.nom AS nom_photo FROM galerie, photo WHERE galerie.numero = :num_galerie AND photo.galerie = galerie.numero";
		$reqArray = array('num_galerie' => $num_galerie);

		$req = $bdd->prepare($reqStr);
		$req->execute($reqArray);
		$res = $req->fetchAll();
		$req->closeCursor();
		return $res;
	}