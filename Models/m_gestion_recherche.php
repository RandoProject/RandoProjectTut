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

		$requete = $bdd->prepare("SELECT titre, région, nom FROM rando, regions WHERE rando.région = regions.num_region AND région = :region");
		$requete->execute(array('region' => strtolower($region))) or die(print_r($erreur -> errorInfor()));
		$res = $requete->fetchAll();
		$requete->closeCursor();
		return $res;
	}