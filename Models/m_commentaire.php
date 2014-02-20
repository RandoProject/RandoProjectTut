<?php
	function validation_commentaire($commentaire, $pseudo, $code){
		global $bdd;

		$reqStr = "INSERT INTO commentaire(`date`, auteur, code_rando, commentaire) VALUES(NOW(), :pseudo, :code, :commentaire)";
		$reqArray = array('pseudo' => $pseudo, 'code' => $code, 'commentaire' => $commentaire);

		$req = $bdd->prepare($reqStr);
		$req->execute($reqArray);
		$req->closeCursor();
	}