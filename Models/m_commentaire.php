<?php
	function validation_commentaire($commentaire, $pseudo, $code){
		global $bdd;

		$reqStr = "INSERT INTO commentaire(`date`, auteur, code_rando, commentaire) VALUES(NOW(), :pseudo, :code, :commentaire)";
		$reqArray = array('pseudo' => $pseudo, 'code' => $code, 'commentaire' => $commentaire);

		$req = $bdd->prepare($reqStr);
		$req->execute($reqArray)  or die(print_r($erreur -> errorInfo()));
		$req->closeCursor();
	}


	function recuperation_commentaire($code){
		global $bdd;

		$reqStr = "SELECT * FROM commentaire WHERE code_rando = :code ORDER BY `date` DESC";
		$reqArray = array('code' => $code);

		$req = $bdd->prepare($reqStr);
		$req->execute($reqArray)  or die(print_r($erreur -> errorInfo()));
		$res = $req->fetchAll();
		$req->closeCursor();
		return $res;
	}