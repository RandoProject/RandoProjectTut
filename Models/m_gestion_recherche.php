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

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND durée <= 01':'00':'00");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{	
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND durée <= 01':'00':'00 AND difficulté = :difficulty");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'difficulty' => $difficulty)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
				}
				elseif($temps_intervalle == "time_1") /*cela veut dire que le temps sélectionné est de 1h à 3h, on sélectionne les randonnées supérieur à 1h et inférieur à 3h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND durée >= 01':'00':'00 AND durée <= 03':'00':'00");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND durée >= 01':'00':'00 AND durée <= 03':'00':'00 AND difficulté = :difficulty");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'difficulty' => $difficulty)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
				}
				elseif ($temps_intervalle == "time_3") /*cela veut dire que le temps sélectionné est de 3h à 6h, on selectionne les randonnées supérieur à 3h et inférieur à 6h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND durée >= 03':'00':'00 AND durée <= 06':'00':'00");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND durée >= 03':'00':'00 AND durée <= 06':'00':'00 AND difficulté = :difficulty");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'difficulty' => $difficulty)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
				}
				elseif($temps_intervalle == "time_10_24") /*cela veut dire que le temps sélectionné est une demi journée ou bien 1 journée, on sélectionne toutes les randos supérieur ou égal*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND durée >= :time");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'time' => $time)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND durée >= :time AND difficulté = :difficulty");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'difficulty' => $difficulty, 'time' => $time)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
				}
				elseif($temps_intervalle == "time_48_96") /*cela veut dire que le temps sélectionné est entre 2 et 4 jours, on sélectione les randos entre 48h et 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND durée >= 48':'00':'00 AND durée <= 96':'00':'00");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'time' => $time)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND durée >= 48':'00':'00 AND durée <= 96':'00':'00 AND difficulté = :difficulty");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'difficulty' => $difficulty)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
				}
				elseif($temps_intervalle == "time_non_precise") /*cela veut dire qu'il n'y a pas de temps sélectionné, on sélectionne tous les temps*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'time' => $time)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND difficulté = :difficulty");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'difficulty' => $difficulty)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
				}
				else /*cela veut dire que le temps sélectionné est plus de 4 jours, on sélectionne toutes les randos avec un temps supérieur ou égal à 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND durée >= 96':'00':'00");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'time' => $time)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND durée >= 96':'00':'00 AND difficulté = :difficulty");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'difficulty' => $difficulty)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
				}
			}
			elseif($distance_intervalle == "distance_30_40") /*Cela veut dire que la distance se trouve entre 30 et 50 et a une intervalle de 10 en 10*/
			{
				if($temps_intervalle == "time_0") /*cela veut dire que le temps sélectionné est moins de une heure*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_1") /*cela veut dire que le temps sélectionné est de 1h à 3h, on sélectionne les randonnées supérieur à 1h et inférieur à 3h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif ($temps_intervalle == "time_3") /*cela veut dire que le temps sélectionné est de 3h à 6h, on selectionne les randonnées supérieur à 3h et inférieur à 6h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_10_24") /*cela veut dire que le temps sélectionné est une demi journée ou bien 1 journée, on sélectionne toutes les randos supérieur ou égal*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_48_96") /*cela veut dire que le temps sélectionné est entre 2 et 4 jours, on sélectione les randos entre 48h et 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_non_precise") /*cela veut dire qu'il n'y a pas de temps sélectionné, on sélectionne tous les temps*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				else /*cela veut dire que le temps sélectionné est plus de 4 jours, on sélectionne toutes les randos avec un temps supérieur ou égal à 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
			}
			elseif($distance_intervalle == "distance_sup_50") /*Cela veut dire que la distance n'est pas selectionné, on choisit toutes les distances*/
			{
				if($temps_intervalle == "time_0") /*cela veut dire que le temps sélectionné est moins de une heure*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_1") /*cela veut dire que le temps sélectionné est de 1h à 3h, on sélectionne les randonnées supérieur à 1h et inférieur à 3h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif ($temps_intervalle == "time_3") /*cela veut dire que le temps sélectionné est de 3h à 6h, on selectionne les randonnées supérieur à 3h et inférieur à 6h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_10_24") /*cela veut dire que le temps sélectionné est une demi journée ou bien 1 journée, on sélectionne toutes les randos inférieurs ou égal*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_48_96") /*cela veut dire que le temps sélectionné est entre 2 et 4 jours, on sélectione les randos entre 48h et 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_non_precise") /*cela veut dire qu'il n'y a pas de temps sélectionné, on sélectionne tous les temps*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				else /*cela veut dire que le temps sélectionné est plus de 4 jours, on sélectionne toutes les randos avec un temps supérieur ou égal à 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
			}
			else /*cela veut dire que la distance sélectionné est supérieur ou égal à 50*/
			{
				if($temps_intervalle == "time_0") /*cela veut dire que le temps sélectionné est moins de une heure*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_1") /*cela veut dire que le temps sélectionné est de 1h à 3h, on sélectionne les randonnées supérieur à 1h et inférieur à 3h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif ($temps_intervalle == "time_3") /*cela veut dire que le temps sélectionné est de 3h à 6h, on selectionne les randonnées supérieur à 3h et inférieur à 6h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_10_24") /*cela veut dire que le temps sélectionné est une demi journée ou bien 1 journée, on sélectionne toutes les randos inférieurs ou égal*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_48_96") /*cela veut dire que le temps sélectionné est entre 2 et 4 jours, on sélectione les randos entre 48h et 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_non_precise") /*cela veut dire qu'il n'y a pas de temps sélectionné, on sélectionne tous les temps*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				else /*cela veut dire que le temps sélectionné est plus de 4 jours, on sélectionne toutes les randos avec un temps supérieur ou égal à 96h*/
				{

				}
			}
		}
		else /*cela veut dire que la région est précisé*/
		{
			if($distance_intervalle == "distance_0_25") /*cela veut dire que la distance se trouve entre 0 et 25 et a une intervalle de 5 en 5*/
			{
				if($temps_intervalle == "time_0") /*cela veut dire que le temps sélectionné est moins de une heure*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_1") /*cela veut dire que le temps sélectionné est de 1h à 3h, on sélectionne les randonnées supérieur à 1h et inférieur à 3h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif ($temps_intervalle == "time_3") /*cela veut dire que le temps sélectionné est de 3h à 6h, on selectionne les randonnées supérieur à 3h et inférieur à 6h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_10_24") /*cela veut dire que le temps sélectionné est une demi journée ou bien 1 journée, on sélectionne toutes les randos inférieurs ou égal*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_48_96") /*cela veut dire que le temps sélectionné est entre 2 et 4 jours, on sélectione les randos entre 48h et 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_non_precise") /*cela veut dire qu'il n'y a pas de temps sélectionné, on sélectionne tous les temps*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}	
				else /*cela veut dire que le temps sélectionné est plus de 4 jours, on sélectionne toutes les randos avec un temps supérieur ou égal à 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
			}
			elseif($distance_intervalle == "distance_30_40") /*Cela veut dire que la distance se trouve entre 30 et 50 et a une intervalle de 10 en 10*/
			{
				if($temps_intervalle == "time_0") /*cela veut dire que le temps sélectionné est moins de une heure*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}	
				elseif($temps_intervalle == "time_1") /*cela veut dire que le temps sélectionné est de 1h à 3h, on sélectionne les randonnées supérieur à 1h et inférieur à 3h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif ($temps_intervalle == "time_3") /*cela veut dire que le temps sélectionné est de 3h à 6h, on selectionne les randonnées supérieur à 3h et inférieur à 6h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_10_24") /*cela veut dire que le temps sélectionné est une demi journée ou bien 1 journée, on sélectionne toutes les randos inférieurs ou égal*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_48_96") /*cela veut dire que le temps sélectionné est entre 2 et 4 jours, on sélectione les randos entre 48h et 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_non_precise") /*cela veut dire qu'il n'y a pas de temps sélectionné, on sélectionne tous les temps*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				else /*cela veut dire que le temps sélectionné est plus de 4 jours, on sélectionne toutes les randos avec un temps supérieur ou égal à 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
			}
			elseif($distance_intervalle == "distance_sup_50") /*Cela veut dire que la distance n'est pas selectionné, on choisit toutes les distances*/
			{
				if($temps_intervalle == "time_0") /*cela veut dire que le temps sélectionné est moins de une heure*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_1") /*cela veut dire que le temps sélectionné est de 1h à 3h, on sélectionne les randonnées supérieur à 1h et inférieur à 3h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif ($temps_intervalle == "time_3") /*cela veut dire que le temps sélectionné est de 3h à 6h, on selectionne les randonnées supérieur à 3h et inférieur à 6h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_10_24") /*cela veut dire que le temps sélectionné est une demi journée ou bien 1 journée, on sélectionne toutes les randos inférieurs ou égal*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_48_96") /*cela veut dire que le temps sélectionné est entre 2 et 4 jours, on sélectione les randos entre 48h et 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_non_precise") /*cela veut dire qu'il n'y a pas de temps sélectionné, on sélectionne tous les temps*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				else /*cela veut dire que le temps sélectionné est plus de 4 jours, on sélectionne toutes les randos avec un temps supérieur ou égal à 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
			}
			else /*cela veut dire que la distance sélectionné est supérieur ou égal à 50*/
			{
				if($temps_intervalle == "time_0") /*cela veut dire que le temps sélectionné est moins de une heure*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_1") /*cela veut dire que le temps sélectionné est de 1h à 3h, on sélectionne les randonnées supérieur à 1h et inférieur à 3h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif ($temps_intervalle == "time_3") /*cela veut dire que le temps sélectionné est de 3h à 6h, on selectionne les randonnées supérieur à 3h et inférieur à 6h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_10_24") /*cela veut dire que le temps sélectionné est une demi journée ou bien 1 journée, on sélectionne toutes les randos inférieurs ou égal*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_48_96") /*cela veut dire que le temps sélectionné est entre 2 et 4 jours, on sélectione les randos entre 48h et 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_non_precise") /*cela veut dire qu'il n'y a pas de temps sélectionné, on sélectionne tous les temps*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficulté n'est pas renseigné, on prend pas en compte le paramètre difficulté*/
					{
						
					}
					else /*cela veut dire que la difficulté est sélectionné, on prend en compte $difficulty*/
					{

					}
				}
				else /*cela veut dire que le temps sélectionné est plus de 4 jours, on sélectionne toutes les randos avec un temps supérieur ou égal à 96h*/
				{

				}
			}
		}

	}