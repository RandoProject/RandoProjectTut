<?php
	function select_randos($select){
		global $bdd;
		$requete = $bdd->query("SELECT $select FROM rando");
		$res = $requete->fetchAll();
		$requete->closeCursor();
		return $res;
	}


	function select_regions($select){
		global $bdd;
		$requete = $bdd->query("SELECT $select FROM regions ORDER BY nom ASC");
		$res = $requete->fetchAll();
		$requete->closeCursor();
		return $res;
	}