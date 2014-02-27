<?php
	function validation_commentaire($commentaire, $pseudo, $code, $note){
		global $bdd;

		$reqStr = "INSERT INTO commentaire(`date`, auteur, code_rando, commentaire, note) VALUES(NOW(), :pseudo, :code, :commentaire, :note)";
		$reqArray = array('pseudo' => $pseudo, 'code' => $code, 'commentaire' => $commentaire, 'note' => $note);

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


	function some_note_rando($code){
		global $bdd;

		$reqStr = "SELECT SUM(note) FROM commentaire WHERE code_rando = :code";
		$reqArray = array('code' => $code);

		$req = $bdd->prepare($reqStr);
		$req->execute($reqArray) or die(print_r($erreur -> errorInfo()));
		$res = $req->fetchAll();
		$req->closeCursor();
		return $res;
	}

	function calcul_note_rando($code){
		global $bdd;

		$reqStr = "SELECT COUNT(note) FROM commentaire WHERE code_rando = :code";
		$reqArray = array('code' => $code);

		$req = $bdd->prepare($reqStr);
		$req->execute($reqArray) or die(print_r($erreur -> errorInfo()));
		$res = $req->fetchAll();
		$req->closeCursor();
		return $res;
	}

	function mise_a_jour_note($code, $note_final){
		global $bdd;

		$reqStr = "UPDATE rando SET note = :note_final WHERE code = :code";
		$reqArray = array('note_final' => $note_final, 'code' => $code);

		$req = $bdd->prepare($reqStr);
		$req->execute($reqArray)  or die(print_r($erreur -> errorInfo()));
		$req->closeCursor();
	}