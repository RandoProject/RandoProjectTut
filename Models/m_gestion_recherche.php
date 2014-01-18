<?php
	function affichage_title($title){
		global $bdd;

		$requete = $bdd->prepare("SELECT titre FROM rando WHERE LOWER(titre)= :title");
		$requete->execute(array('title' => strtolower($title))) or die(print_r($erreur -> errorInfo()));
		$res = $requete->fetchAll();
		$requete->closeCursor();
		return $res;
	}

	function affichage_region($region){
		global $bdd;

		$requete = $bdd->prepare("SELECT titre, r�gion, nom FROM rando, regions WHERE rando.r�gion = regions.num_region AND r�gion = :region");
		$requete->execute(array('region' => strtolower($region))) or die(print_r($erreur -> errorInfor()));
		$res = $requete->fetchAll();
		$requete->closeCursor();
		return $res;
	}