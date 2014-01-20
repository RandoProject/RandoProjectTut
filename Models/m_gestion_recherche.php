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


	function affichage_f_rando_complet($region, $distance, $time, $difficulty, $water, $typeRegion, $MAX_distance, $MIN_distance, $MAX_time, $MIN_time, $difficulty_var, $water_var){
		global $bdd;

		if($typeRegion == 's_region_false') /*Region non pr�cis�, on prend pas le param�tre en compte*/
		{
			if($MAX_distance == -1) 	/*si la distance n'est pas s�lectionn�*/
			{	
				if($MAX_time == 'inferieur_1h') /*on selectionne les randos avec un temps inf�rieur ou �gal � 1h*/
				{
					if($difficulty_var == 'non_precise') /*difficult� non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficult�*/
					{

					}
				}
				else if($MAX_time == 'vide_10') /*on selectionne les randos avec un temps sup�rieur ou �gal � 10h, on utilise sup ou egal � MIN*/
				{
					if($difficulty_var == 'non_precise') /*difficult� non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficult�*/
					{

					}
				}
				else if($MAX_time == 'vide_24') /*on selectionne les randos avec un temps sup�rieur ou �gal � 24h et on trie par odre croissant,on utilise sup ou egal � MIN*/
				{
					if($difficulty_var == 'non_precise') /*difficult� non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficult�*/
					{

					}
				}
				else if($MAX_time =='vide_96') /*on s�lection les temps sup�rieur ou �gal � 96h*/
				{
					if($difficulty_var == 'non_precise') /*difficult� non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficult�*/
					{

					}
				}
				else if($MAX_time == 'vide') /*temps pas s�lectionn�, on utilise sup�rieur ou �gal � MIN*/
				{
					if($difficulty_var == 'non_precise') /*difficult� non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficult�*/
					{

					}
				}
				else 	/*temps s�lectionn� dans une intervalle, on utilise MIN et MAX*/
				{
					if($difficulty_var == 'non_precise') /*difficult� non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficult�*/
					{

					}
				}
			}
			else if($MAX_distance == 1) /*si la distance s�lectionn� est sup�rieur ou �gal � 50, on utilises MIN_distance qui est �gal � 50 on, utilise sup ou egal � MIN*/
			{ 
				if($difficulty_var == 'non_precise') /*difficult� non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficult�*/
					{

					}
			}
		}
		else 	/*Region pr�cis�*/
		{
			if($MAX_distance == -1) 	/*si la distance n'est pas s�lectionn�*/
			{	
				if($MAX_time == 'inferieur_1h') /*on selectionne les randos avec un temps inf�rieur ou �gal � 1h*/
				{
					if($difficulty_var == 'non_precise') /*difficult� non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficult�*/
					{

					}
				}
				else if($MAX_time == 'vide_10') /*on selectionne les randos avec un temps sup�rieur ou �gal � 10h, on utilise sup ou egal � MIN*/
				{
					if($difficulty_var == 'non_precise') /*difficult� non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficult�*/
					{

					}
				}
				else if($MAX_time == 'vide_24') /*on selectionne les randos avec un temps sup�rieur ou �gal � 24h et on trie par odre croissant,on utilise sup ou egal � MIN*/
				{
					if($difficulty_var == 'non_precise') /*difficult� non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficult�*/
					{

					}
				}
				else if($MAX_time =='vide_96') /*on s�lection les temps sup�rieur ou �gal � 96h*/
				{
					if($difficulty_var == 'non_precise') /*difficult� non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficult�*/
					{

					}
				}
				else if($MAX_time == 'vide') /*temps pas s�lectionn�, on utilise sup�rieur ou �gal � MIN*/
				{
					if($difficulty_var == 'non_precise') /*difficult� non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficult�*/
					{

					}
				}
				else 	/*temps s�lectionn� dans une intervalle, on utilise MIN et MAX*/
				{
					if($difficulty_var == 'non_precise') /*difficult� non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficult�*/
					{

					}
				}
			}
			else if($MAX_distance == 1) /*si la distance s�lectionn� est sup�rieur ou �gal � 50, on utilises MIN_distance qui est �gal � 50 on, utilise sup ou egal � MIN*/
			{ 
				if($difficulty_var == 'non_precise') /*difficult� non precise on prend pas en compte*/
					{

					}
					else /*on prend en compte la difficult�*/
					{

					}
			}
		}
	}