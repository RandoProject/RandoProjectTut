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


	function update_mdp($mdp_crypte, $pseudo){
		global $bdd;

		$reqStr = 'UPDATE membre SET mdp = :mdp_crypte WHERE pseudo = :pseudo';
		$reqArray = array('mdp_crypte' => $mdp_crypte, 'pseudo' => $pseudo);

		$req = $bdd->prepare($reqStr);
		$req->execute($reqArray);
		$req->closeCursor();
	}