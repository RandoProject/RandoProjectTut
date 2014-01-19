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

		$requete = $bdd->prepare("SELECT titre, r�gion, nom FROM rando, regions WHERE rando.r�gion = regions.num_region AND rando.r�gion = :region");
		$requete->execute(array('region' => $region)) or die(print_r($erreur -> errorInfor()));
		$res = $requete->fetchAll();
		$requete->closeCursor();
		return $res;
	}



	function affichage_f_rando($title, $region){
		global $bdd;

		$requete = $bdd->prepare("SELECT titre, r�gion, nom FROM rando, regions WHERE rando.r�gion = regions.num_region AND LOWER(titre)= :title AND rando.r�gion= :region");
		$requete->execute(array('title' => strtolower($title), 'region' => $region)) or die(print_r($erreur -> errorInfo()));
		$req = $requete->fetchAll();
		$requete->closeCursor();
		return $req;
	}
*/


	function affichage_f_rando_complet($region, $distance, $time, $difficulty, $water, $region_true_false, $distance_intervalle, $temps_intervalle){
		global $bdd;

		if($region_true_false == "s_region_true")   /*cela veut dire que la r�gion n'est pas pr�cis� */
		{
			if($distance_intervalle == "distance_0_25") /*cela veut dire que la distance se trouve entre 0 et 25 et a une intervalle de 5 en 5*/
			{
				if($temps_intervalle == "time_0") /*cela veut dire que le temps s�lectionn� est moins de une heure*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND dur�e <= 01':'00':'00");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{	
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND dur�e <= 01':'00':'00 AND difficult� = :difficulty");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'difficulty' => $difficulty)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
				}
				elseif($temps_intervalle == "time_1") /*cela veut dire que le temps s�lectionn� est de 1h � 3h, on s�lectionne les randonn�es sup�rieur � 1h et inf�rieur � 3h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND dur�e >= 01':'00':'00 AND dur�e <= 03':'00':'00");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND dur�e >= 01':'00':'00 AND dur�e <= 03':'00':'00 AND difficult� = :difficulty");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'difficulty' => $difficulty)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
				}
				elseif ($temps_intervalle == "time_3") /*cela veut dire que le temps s�lectionn� est de 3h � 6h, on selectionne les randonn�es sup�rieur � 3h et inf�rieur � 6h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND dur�e >= 03':'00':'00 AND dur�e <= 06':'00':'00");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND dur�e >= 03':'00':'00 AND dur�e <= 06':'00':'00 AND difficult� = :difficulty");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'difficulty' => $difficulty)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
				}
				elseif($temps_intervalle == "time_10_24") /*cela veut dire que le temps s�lectionn� est une demi journ�e ou bien 1 journ�e, on s�lectionne toutes les randos sup�rieur ou �gal*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND dur�e >= :time");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'time' => $time)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND dur�e >= :time AND difficult� = :difficulty");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'difficulty' => $difficulty, 'time' => $time)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
				}
				elseif($temps_intervalle == "time_48_96") /*cela veut dire que le temps s�lectionn� est entre 2 et 4 jours, on s�lectione les randos entre 48h et 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND dur�e >= 48':'00':'00 AND dur�e <= 96':'00':'00");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'time' => $time)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND dur�e >= 48':'00':'00 AND dur�e <= 96':'00':'00 AND difficult� = :difficulty");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'difficulty' => $difficulty)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
				}
				elseif($temps_intervalle == "time_non_precise") /*cela veut dire qu'il n'y a pas de temps s�lectionn�, on s�lectionne tous les temps*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'time' => $time)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND difficult� = :difficulty");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'difficulty' => $difficulty)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
				}
				else /*cela veut dire que le temps s�lectionn� est plus de 4 jours, on s�lectionne toutes les randos avec un temps sup�rieur ou �gal � 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND dur�e >= 96':'00':'00");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'time' => $time)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{
						$distance2 = $distance + 5;

						$requete = $bdd->prepare("SELECT * FROM rando WHERE longueur >= :distance AND longueur <= :distance2 AND dur�e >= 96':'00':'00 AND difficult� = :difficulty");
						$requete->execute(array('distance' => $distance, 'distance2' => $distance2, 'difficulty' => $difficulty)) or die(print_r($erreur -> errorInfo()));
						$req = $requete->fetchAll();
						$requete->closeCursor();
						return $req;
					}
				}
			}
			elseif($distance_intervalle == "distance_30_40") /*Cela veut dire que la distance se trouve entre 30 et 50 et a une intervalle de 10 en 10*/
			{
				if($temps_intervalle == "time_0") /*cela veut dire que le temps s�lectionn� est moins de une heure*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_1") /*cela veut dire que le temps s�lectionn� est de 1h � 3h, on s�lectionne les randonn�es sup�rieur � 1h et inf�rieur � 3h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif ($temps_intervalle == "time_3") /*cela veut dire que le temps s�lectionn� est de 3h � 6h, on selectionne les randonn�es sup�rieur � 3h et inf�rieur � 6h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_10_24") /*cela veut dire que le temps s�lectionn� est une demi journ�e ou bien 1 journ�e, on s�lectionne toutes les randos sup�rieur ou �gal*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_48_96") /*cela veut dire que le temps s�lectionn� est entre 2 et 4 jours, on s�lectione les randos entre 48h et 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_non_precise") /*cela veut dire qu'il n'y a pas de temps s�lectionn�, on s�lectionne tous les temps*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				else /*cela veut dire que le temps s�lectionn� est plus de 4 jours, on s�lectionne toutes les randos avec un temps sup�rieur ou �gal � 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
			}
			elseif($distance_intervalle == "distance_sup_50") /*Cela veut dire que la distance n'est pas selectionn�, on choisit toutes les distances*/
			{
				if($temps_intervalle == "time_0") /*cela veut dire que le temps s�lectionn� est moins de une heure*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_1") /*cela veut dire que le temps s�lectionn� est de 1h � 3h, on s�lectionne les randonn�es sup�rieur � 1h et inf�rieur � 3h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif ($temps_intervalle == "time_3") /*cela veut dire que le temps s�lectionn� est de 3h � 6h, on selectionne les randonn�es sup�rieur � 3h et inf�rieur � 6h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_10_24") /*cela veut dire que le temps s�lectionn� est une demi journ�e ou bien 1 journ�e, on s�lectionne toutes les randos inf�rieurs ou �gal*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_48_96") /*cela veut dire que le temps s�lectionn� est entre 2 et 4 jours, on s�lectione les randos entre 48h et 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_non_precise") /*cela veut dire qu'il n'y a pas de temps s�lectionn�, on s�lectionne tous les temps*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				else /*cela veut dire que le temps s�lectionn� est plus de 4 jours, on s�lectionne toutes les randos avec un temps sup�rieur ou �gal � 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
			}
			else /*cela veut dire que la distance s�lectionn� est sup�rieur ou �gal � 50*/
			{
				if($temps_intervalle == "time_0") /*cela veut dire que le temps s�lectionn� est moins de une heure*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_1") /*cela veut dire que le temps s�lectionn� est de 1h � 3h, on s�lectionne les randonn�es sup�rieur � 1h et inf�rieur � 3h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif ($temps_intervalle == "time_3") /*cela veut dire que le temps s�lectionn� est de 3h � 6h, on selectionne les randonn�es sup�rieur � 3h et inf�rieur � 6h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_10_24") /*cela veut dire que le temps s�lectionn� est une demi journ�e ou bien 1 journ�e, on s�lectionne toutes les randos inf�rieurs ou �gal*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_48_96") /*cela veut dire que le temps s�lectionn� est entre 2 et 4 jours, on s�lectione les randos entre 48h et 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_non_precise") /*cela veut dire qu'il n'y a pas de temps s�lectionn�, on s�lectionne tous les temps*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				else /*cela veut dire que le temps s�lectionn� est plus de 4 jours, on s�lectionne toutes les randos avec un temps sup�rieur ou �gal � 96h*/
				{

				}
			}
		}
		else /*cela veut dire que la r�gion est pr�cis�*/
		{
			if($distance_intervalle == "distance_0_25") /*cela veut dire que la distance se trouve entre 0 et 25 et a une intervalle de 5 en 5*/
			{
				if($temps_intervalle == "time_0") /*cela veut dire que le temps s�lectionn� est moins de une heure*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_1") /*cela veut dire que le temps s�lectionn� est de 1h � 3h, on s�lectionne les randonn�es sup�rieur � 1h et inf�rieur � 3h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif ($temps_intervalle == "time_3") /*cela veut dire que le temps s�lectionn� est de 3h � 6h, on selectionne les randonn�es sup�rieur � 3h et inf�rieur � 6h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_10_24") /*cela veut dire que le temps s�lectionn� est une demi journ�e ou bien 1 journ�e, on s�lectionne toutes les randos inf�rieurs ou �gal*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_48_96") /*cela veut dire que le temps s�lectionn� est entre 2 et 4 jours, on s�lectione les randos entre 48h et 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_non_precise") /*cela veut dire qu'il n'y a pas de temps s�lectionn�, on s�lectionne tous les temps*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}	
				else /*cela veut dire que le temps s�lectionn� est plus de 4 jours, on s�lectionne toutes les randos avec un temps sup�rieur ou �gal � 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
			}
			elseif($distance_intervalle == "distance_30_40") /*Cela veut dire que la distance se trouve entre 30 et 50 et a une intervalle de 10 en 10*/
			{
				if($temps_intervalle == "time_0") /*cela veut dire que le temps s�lectionn� est moins de une heure*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}	
				elseif($temps_intervalle == "time_1") /*cela veut dire que le temps s�lectionn� est de 1h � 3h, on s�lectionne les randonn�es sup�rieur � 1h et inf�rieur � 3h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif ($temps_intervalle == "time_3") /*cela veut dire que le temps s�lectionn� est de 3h � 6h, on selectionne les randonn�es sup�rieur � 3h et inf�rieur � 6h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_10_24") /*cela veut dire que le temps s�lectionn� est une demi journ�e ou bien 1 journ�e, on s�lectionne toutes les randos inf�rieurs ou �gal*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_48_96") /*cela veut dire que le temps s�lectionn� est entre 2 et 4 jours, on s�lectione les randos entre 48h et 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_non_precise") /*cela veut dire qu'il n'y a pas de temps s�lectionn�, on s�lectionne tous les temps*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				else /*cela veut dire que le temps s�lectionn� est plus de 4 jours, on s�lectionne toutes les randos avec un temps sup�rieur ou �gal � 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
			}
			elseif($distance_intervalle == "distance_sup_50") /*Cela veut dire que la distance n'est pas selectionn�, on choisit toutes les distances*/
			{
				if($temps_intervalle == "time_0") /*cela veut dire que le temps s�lectionn� est moins de une heure*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_1") /*cela veut dire que le temps s�lectionn� est de 1h � 3h, on s�lectionne les randonn�es sup�rieur � 1h et inf�rieur � 3h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif ($temps_intervalle == "time_3") /*cela veut dire que le temps s�lectionn� est de 3h � 6h, on selectionne les randonn�es sup�rieur � 3h et inf�rieur � 6h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_10_24") /*cela veut dire que le temps s�lectionn� est une demi journ�e ou bien 1 journ�e, on s�lectionne toutes les randos inf�rieurs ou �gal*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_48_96") /*cela veut dire que le temps s�lectionn� est entre 2 et 4 jours, on s�lectione les randos entre 48h et 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_non_precise") /*cela veut dire qu'il n'y a pas de temps s�lectionn�, on s�lectionne tous les temps*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				else /*cela veut dire que le temps s�lectionn� est plus de 4 jours, on s�lectionne toutes les randos avec un temps sup�rieur ou �gal � 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
			}
			else /*cela veut dire que la distance s�lectionn� est sup�rieur ou �gal � 50*/
			{
				if($temps_intervalle == "time_0") /*cela veut dire que le temps s�lectionn� est moins de une heure*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_1") /*cela veut dire que le temps s�lectionn� est de 1h � 3h, on s�lectionne les randonn�es sup�rieur � 1h et inf�rieur � 3h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif ($temps_intervalle == "time_3") /*cela veut dire que le temps s�lectionn� est de 3h � 6h, on selectionne les randonn�es sup�rieur � 3h et inf�rieur � 6h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_10_24") /*cela veut dire que le temps s�lectionn� est une demi journ�e ou bien 1 journ�e, on s�lectionne toutes les randos inf�rieurs ou �gal*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_48_96") /*cela veut dire que le temps s�lectionn� est entre 2 et 4 jours, on s�lectione les randos entre 48h et 96h*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				elseif($temps_intervalle == "time_non_precise") /*cela veut dire qu'il n'y a pas de temps s�lectionn�, on s�lectionne tous les temps*/
				{
					if($difficulty == "difficulte_non_precise") /*cela veut dire que la difficult� n'est pas renseign�, on prend pas en compte le param�tre difficult�*/
					{
						
					}
					else /*cela veut dire que la difficult� est s�lectionn�, on prend en compte $difficulty*/
					{

					}
				}
				else /*cela veut dire que le temps s�lectionn� est plus de 4 jours, on s�lectionne toutes les randos avec un temps sup�rieur ou �gal � 96h*/
				{

				}
			}
		}

	}