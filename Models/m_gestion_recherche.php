<?php
	function affichage(){
		global $bdd;
		if(isset($_POST['title']))
		{
			$requete = $bdd->prepare("SELECT titre FROM rando WHERE titre= :title");
			$requete = execute(array('title' => $_POST['title'])) or die(print_r($erreur -> errorInfo()));
			$res = $requete->fetchAll();
			$requete->closeCursor();
			return $res;
		}
	}
