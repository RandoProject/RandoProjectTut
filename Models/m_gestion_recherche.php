<?php

/*
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

		$requete = $bdd->prepare("SELECT titre, région, nom FROM rando, regions WHERE rando.région = regions.num_region AND rando.région = :region");
		$requete->execute(array('region' => $region)) or die(print_r($erreur -> errorInfor()));
		$res = $requete->fetchAll();
		$requete->closeCursor();
		return $res;
	}



	function affichage_f_rando($title, $region){
		global $bdd;

		$requete = $bdd->prepare("SELECT titre, région, nom FROM rando, regions WHERE rando.région = regions.num_region AND LOWER(titre)= :title AND rando.région= :region");
		$requete->execute(array('title' => strtolower($title), 'region' => $region)) or die(print_r($erreur -> errorInfo()));
		$req = $requete->fetchAll();
		$requete->closeCursor();
		return $req;
	}
*/


	function affichage_f_rando_complet($region, $distance, $time, $difficulty, $water, $region_true_false, $distance_intervalle, $temps_intervalle){
		global $bdd;

		if($region_true_false == "s_region_true")   /*cela veut dire que la région n'est pas précisé */
		{
			if($distance_intervalle == "distance_0_25") /*cela veut dire que la distance se trouve entre 0 et 25 et a une intervalle de 5 en 5*/
			{
				if($temps_intervalle == "time_0") /*cela veut dire que le temps sélectionné est moins de une heure*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND durée <= "."01:00:00");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{	
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND durée <= "."01:00:00"." AND difficulté = :difficulty");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'difficulty' => $difficulty)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
				}
			}
	}