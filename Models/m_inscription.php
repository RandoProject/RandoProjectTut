<?php

function validation_inscription($pseudo, $mdp, $nom, $prenom, $day_birth, $month_birth, $year_birth, $adresse, $code_postal, $ville, $mail){
	global $bdd, $salt;

	$date_naiss_complete = $year_birth.'-'.$month_birth.'-'.$day_birth;

	$reqStr = "INSERT INTO membre(pseudo, mdp, statut, nom, prenom, date_naiss, adresse, code_postal, ville, mail, photo) VALUES (:pseudo, :mdp, 'membre', :nom, :prenom, :date_naiss_complete, :adresse, :code_postal, :ville, :mail, 0)";
	
	$reqArray = array('pseudo' => $pseudo, 'mdp' => sha1(sha1($mdp).$salt), 'nom' => $nom, 'prenom' => $prenom, 'date_naiss_complete' => $date_naiss_complete, 'adresse' => $adresse, 'code_postal' => $code_postal, 'ville' => $ville, 'mail' => $mail);

	$req = $bdd->prepare($reqStr);
	$req->execute($reqArray);
	$req->closeCursor();
}