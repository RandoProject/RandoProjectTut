<?php
	
	function get_info_compte($pseudo, $adresse_mail){
		global $bdd;

		$reqStr = 'SELECT * FROM membre WHERE pseudo = :pseudo AND mail = :adresse_mail';
		$reqArray = array('pseudo' => $pseudo, 'adresse_mail' => $adresse_mail);

		$req = $bdd->prepare($reqStr);
		$req->execute($reqArray);
		$resultat = $req->fetch(PDO::FETCH_OBJ);
		$req->closeCursor();

		return $resultat;
	}