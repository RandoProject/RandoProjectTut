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


	function affichage_f_rando_complet($region, $distance, $time, $difficulty, $water, $typeRegion, $MAX_distance, $MIN_distance, $MAX_time, $MIN_time, $difficulty_var, $water_var){
		global $bdd;

		if($typeRegion == 's_region_false') /*Region non précisé, on prend pas le paramètre en compte*/
		{
			if($MAX_distance == -1) 	/*si la distance n'est pas sélectionné*/
			{	
				if($MAX_time == 'inferieur_1h') /*on selectionne les randos avec un temps inférieur ou égal à 1h*/
				{
					if($difficulty_var == 'non_precise') /*difficulté non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficulté*/
					{

					}
				}
				else if($MAX_time == 'vide_10') /*on selectionne les randos avec un temps supérieur ou égal à 10h, on utilise sup ou egal à MIN*/
				{
					if($difficulty_var == 'non_precise') /*difficulté non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficulté*/
					{

					}
				}
				else if($MAX_time == 'vide_24') /*on selectionne les randos avec un temps supérieur ou égal à 24h et on trie par odre croissant,on utilise sup ou egal à MIN*/
				{
					if($difficulty_var == 'non_precise') /*difficulté non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficulté*/
					{

					}
				}
				else if($MAX_time =='vide_96') /*on sélection les temps supérieur ou égal à 96h*/
				{
					if($difficulty_var == 'non_precise') /*difficulté non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficulté*/
					{

					}
				}
				else if($MAX_time == 'vide') /*temps pas sélectionné, on utilise supérieur ou égal à MIN*/
				{
					if($difficulty_var == 'non_precise') /*difficulté non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficulté*/
					{

					}
				}
				else 	/*temps sélectionné dans une intervalle, on utilise MIN et MAX*/
				{
					if($difficulty_var == 'non_precise') /*difficulté non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficulté*/
					{

					}
				}
			}
			else if($MAX_distance == 1) /*si la distance sélectionné est supérieur ou égal à 50, on utilises MIN_distance qui est égal à 50 on, utilise sup ou egal à MIN*/
			{ 
				if($difficulty_var == 'non_precise') /*difficulté non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficulté*/
					{

					}
			}
		}
		else 	/*Region précisé*/
		{
			if($MAX_distance == -1) 	/*si la distance n'est pas sélectionné*/
			{	
				if($MAX_time == 'inferieur_1h') /*on selectionne les randos avec un temps inférieur ou égal à 1h*/
				{
					if($difficulty_var == 'non_precise') /*difficulté non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficulté*/
					{

					}
				}
				else if($MAX_time == 'vide_10') /*on selectionne les randos avec un temps supérieur ou égal à 10h, on utilise sup ou egal à MIN*/
				{
					if($difficulty_var == 'non_precise') /*difficulté non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficulté*/
					{

					}
				}
				else if($MAX_time == 'vide_24') /*on selectionne les randos avec un temps supérieur ou égal à 24h et on trie par odre croissant,on utilise sup ou egal à MIN*/
				{
					if($difficulty_var == 'non_precise') /*difficulté non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficulté*/
					{

					}
				}
				else if($MAX_time =='vide_96') /*on sélection les temps supérieur ou égal à 96h*/
				{
					if($difficulty_var == 'non_precise') /*difficulté non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficulté*/
					{

					}
				}
				else if($MAX_time == 'vide') /*temps pas sélectionné, on utilise supérieur ou égal à MIN*/
				{
					if($difficulty_var == 'non_precise') /*difficulté non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficulté*/
					{

					}
				}
				else 	/*temps sélectionné dans une intervalle, on utilise MIN et MAX*/
				{
					if($difficulty_var == 'non_precise') /*difficulté non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficulté*/
					{

					}
				}
			}
			else if($MAX_distance == 1) /*si la distance sélectionné est supérieur ou égal à 50, on utilises MIN_distance qui est égal à 50 on, utilise sup ou egal à MIN*/
			{ 
				if($difficulty_var == 'non_precise') /*difficulté non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficulté*/
					{

					}
			}
		}
	}