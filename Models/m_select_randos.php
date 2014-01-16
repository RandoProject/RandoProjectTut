<?php
	function select_randos($select){
		global $bdd;
		$requete = $bdd->query("SELECT $select FROM rando");
		$res = $requete->fetchAll();
		$requete->closeCursor();
		return $res;
	}
