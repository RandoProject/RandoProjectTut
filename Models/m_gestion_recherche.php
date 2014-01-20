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


function affichage_f_rando_complet($region, $typeRegion, $MAX_distance, $MIN_distance, $MAX_time, $MIN_time, $difficulty, $water){
	global $bdd;



	$reqValues = array();
	$reqArray = array();

	if($typeRegion == 's_region_true'){
		array_push($reqArray, "r�gion = :region ");
		$reqValues['region'] = $region;
	}
	if($MAX_distance !== -1){
		if($MIN_distance >= 50){
			array_push($reqArray, "distance >= :distance");
			$reqValues['distance'] = $MIN_distance;
		}
		else{
			array_push($reqArray, "discance >= :distanceMin", "discance =< :distanceMax");
			$reqValues['distanceMin'] = $MIN_distance;
			$reqValues['distanceMax'] = $MAX_distance;
		}
	}

	if($MAX_time !== false){
		if($MAX_time == 'inferieur_1h'){
		 		array_push($reqArray, "dur�e <= 01:00:00");
		}
		else if($MAX_time == 'vide_10' || $MAX_time == 'vide_24' || $MAX_time == 'vide_96'){
	 		array_push($reqArray, "dur�e <= :time");// ?
	 		$reqValues['time'] = $MAX_time;
		}
		else{
			array_push($reqArray, "dur�e >= :timeMin", "dur�e <= :timeMax");
			$reqValues['timeMin'] = $MIN_time;
			$reqValues['timeMax'] = $MAX_time;
		}
	}

	$reqStr = "SELECT * FROM rando";

	if(!empty($reqArray)){
		$reqStr .= " WHERE ".implode(' AND ', $reqArray);
	}
	print_r($reqValues);
	print_r($reqArray);
	print_r($reqStr);



	if($typeRegion == 's_region_false') /*Region non pr�cis�, on prend pas le param�tre en compte*/
	{
		if($MAX_distance == -1) 	/*si la distance n'est pas s�lectionn�*/
		{	
			if($MAX_time == 'inferieur_1h') /*on selectionne les randos avec un temps inf�rieur ou �gal � 1h*/
			{
				if($difficulty == 'non_precise') /*difficult� non precise on prend pas en compte*/
				{
					/*$requete = $bdd->query("SELECT * FROM rando WHERE  AND dur�e <= "."01:00:00");
					$req = $requete->fetchAll();
					$requete->closeCursor();
					return $req;*/
				}
				else /*on prend en compte la difficult�*/
				{
					/*$requete = $bdd->prepare("SELECT * FROM rando WHERE  AND dur�e <= '01:00:00' AND difficult� = :$difficulty");
					$requete->execute(array('$difficulty' => $difficulty)) or die(print_r($erreur -> errorInfo()));
					$req = $requete->fetchAll();
					$requete->closeCursor();
					return $req;*/
				}
			}
			else if($MAX_time == 'vide_10') /*on selectionne les randos avec un temps sup�rieur ou �gal � 10h, on utilise sup ou egal � MIN*/
			{
				if($difficulty == 'non_precise') /*difficult� non precise on prend pas en compte*/
				{
					/*$requete = $bdd->query("SELECT * FROM rando WHERE  AND dur�e >= :MIN_time");
					$requete->execute(array('MIN_time' => $MIN_time)) or die(print_r($erreur -> errorInfo()));
					$req = $requete->fetchAll();
					$requete->closeCursor();
					return $req;*/
				}
				else /*on prend en compte la difficult�*/
				{
					/*$requete = $bdd->query("SELECT * FROM rando WHERE  AND dur�e >= :MIN_time AND difficult� = :$difficulty");
					$requete->execute(array('MIN_time' => $MIN_time, '$difficulty' => $difficulty)) or die(print_r($erreur -> errorInfo()));
					$req = $requete->fetchAll();
					$requete->closeCursor();
					return $req;*/
				}
			}
			else if($MAX_time == 'vide_24') /*on selectionne les randos avec un temps sup�rieur ou �gal � 24h et on trie par odre croissant,on utilise sup ou egal � MIN*/
			{
				if($difficulty == 'non_precise') /*difficult� non precise on prend pas en compte*/
				{

				}
				else /*on prend en compte la difficult�*/
				{

				}
			}
			else if($MAX_time =='vide_96') /*on s�lection les temps sup�rieur ou �gal � 96h*/
			{
				if($difficulty == 'non_precise') /*difficult� non precise on prend pas en compte*/
				{

				}
				else /*on prend en compte la difficult�*/
				{

				}
			}
			else if($MAX_time == 'vide') /*temps pas s�lectionn�, on utilise sup�rieur ou �gal � MIN*/
			{
				if($difficulty == 'non_precise') /*difficult� non precise on prend pas en compte*/
				{

				}
				else /*on prend en compte la difficult�*/
				{

				}
			}
			else 	/*temps s�lectionn� dans une intervalle, on utilise MIN et MAX*/
			{
				if($difficulty == 'non_precise') /*difficult� non precise on prend pas en compte*/
				{

				}
				else /*on prend en compte la difficult�*/
				{

				}
			}
		}
		else if($MAX_distance == 1) /*si la distance s�lectionn� est sup�rieur ou �gal � 50, on utilises MIN_distance qui est �gal � 50 on, utilise sup ou egal � MIN*/
		{ 
			if($difficulty == 'non_precise') /*difficult� non precise on prend pas en compte*/
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
				if($difficulty == 'non_precise') /*difficult� non precise on prend pas en compte*/
				{

				}
				else /*on prend en compte la difficult�*/
				{

				}
			}
			else if($MAX_time == 'vide_10') /*on selectionne les randos avec un temps sup�rieur ou �gal � 10h, on utilise sup ou egal � MIN*/
			{
				if($difficulty == 'non_precise') /*difficult� non precise on prend pas en compte*/
				{

				}
				else /*on prend en compte la difficult�*/
				{

				}
			}
			else if($MAX_time == 'vide_24') /*on selectionne les randos avec un temps sup�rieur ou �gal � 24h et on trie par odre croissant,on utilise sup ou egal � MIN*/
			{
				if($difficulty == 'non_precise') /*difficult� non precise on prend pas en compte*/
				{

				}
				else /*on prend en compte la difficult�*/
				{

				}
			}
			else if($MAX_time =='vide_96') /*on s�lection les temps sup�rieur ou �gal � 96h*/
			{
				if($difficulty == 'non_precise') /*difficult� non precise on prend pas en compte*/
				{

				}
				else /*on prend en compte la difficult�*/
				{

				}
			}
			else if($MAX_time == 'vide') /*temps pas s�lectionn�, on utilise sup�rieur ou �gal � MIN*/
			{
				if($difficulty == 'non_precise') /*difficult� non precise on prend pas en compte*/
				{

				}
				else /*on prend en compte la difficult�*/
				{

				}
			}
			else 	/*temps s�lectionn� dans une intervalle, on utilise MIN et MAX*/
			{
				if($difficulty == 'non_precise') /*difficult� non precise on prend pas en compte*/
				{

				}
				else /*on prend en compte la difficult�*/
				{

				}
			}
		}
		else if($MAX_distance == 1) /*si la distance s�lectionn� est sup�rieur ou �gal � 50, on utilises MIN_distance qui est �gal � 50 on, utilise sup ou egal � MIN*/
		{ 
			if($difficulty == 'non_precise') /*difficult� non precise on prend pas en compte*/
				{

				}
				else /*on prend en compte la difficult�*/
				{

				}
		}
	}
}