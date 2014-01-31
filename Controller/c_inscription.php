<?php

include_once('bin/params.php');
include_once('Models/m_inscription.php');

	if(!isset($_SESSION['statut'])){
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
			if(isset($_POST['pseudo']) and $_POST['pseudo'] != ""){
				$pseudo = strip_tags($_POST['name']);
				if(strlen($pseudo) > 30){
					$error['pseudo'] = "Votre pseudo doit faire moins de 30 caractères !";
				}
			}
			else{
				$error['pseudo'] = "Vous n'avez pas renseigné votre pseudo !";
			}

			if(isset($_POST['password'], $_POST['confirm_password']) and $_POST['password'] != ""){
				$password = strip_tags($_POST['password']);
				if(strlen($password) > 30){
					$error['password'] = "Votre mot de passe ne doit pas contenir plus de 30 caractères !";
				}
				else if($_POST['password'] != $_POST['confirm_password']){
					$error['confirm_password'] = "Les deux mots de passe ne correspondent pas !";
				}
			}
			else{
				$error['password'] = "Vous n'avez pas entré de mot de passe !";
			}

			if(isset($_POST['familly_name']) and $_POST['familly_name'] != ""){
				$familly_name = strip_tags($_POST['familly_name']);
				if(strlen($familly_name) > 30){
					$error['familly_name'] = "Votre nom de famille doit faire moins de 30 caractères !";
				}
				else if(!ctype_alpha($_POST['familly_name'])){
					$error['familly_name'] = "Votre nom de famille ne doit pas contenir de chiffres !";
				}
			}
			else{
				$error['familly_name'] = "Vous n'avez pas renseigné votre nom de famille ";
			}

			if(isset($_POST['name']) and $_POST['name'] != ""){
				$name = strip_tags($_POST['name']);
				if(strlen($name) > 30){
					$error['name'] = "Votre prénom doit faire moins de 30 caractères !";
				}
				else if(!ctype_alpha($_POST['name'])){
					$error['name'] = "Votre prénom ne doit pas contenir de chiffres !";
				}
			}
			else{
				$error['name'] = "Vous n'avez pas renseigné votre prénom !";
			}

			//Vérification de la date de naissance
			if(!isset($_POST['day_birth']) or $_POST['day_birth'] == ""){
				$day_birth = 0;
			}
			else if(is_numeric($_POST['day_birth']) and intval($_POST['day_birth']) <= 9 and intval($_POST['day_birth']) >= 1){
				$day_birth = intval("0").intval($_POST['day_birth']);
			}
			else if(is_numeric($_POST['day_birth']) and intval($_POST['day_birth']) <= 31 and intval($_POST['day_birth']) >= 10){
				$day_birth = intval($_POST['day_birth']);
			}
			else{
				$error['day_birth'] = "Le jour de naissance n'est pas valide, il doit être compris entre 1 et 31 !";
			}

			if(!isset($_POST['month_birth']) or $_POST['month_birth'] == ""){
				$month_birth = 0;
			}
			else if(is_numeric($_POST['month_birth']) and intval($_POST['month_birth']) <= 9 and intval($_POST['month_birth']) >= 1){
				$month_birth = intval("0").intval($_POST['month_birth']);
			}
			else if(is_numeric($_POST['month_birth']) and intval($_POST['month_birth']) <= 12 and intval($_POST['month_birth']) >= 10){
				$month_birth = intval($_POST['month_birth']);
			}
			else{
				$error['month_birth'] = "Le mois de naissance n'est pas valide, il doit être compris entre 1 et 12";
			}

			if(isset($_POST['street']) or $_POST['street'] != ""){
				$street = strip_tags($_POST['street']);
				if(strlen($street) > 70){
					$error['street'] = "L adresse ne doit pas faire plus de 70 caractères!";
				}
				else if(ctype_digit($_POST['street'])){
					$error['street'] = "L'adresse ne peut pas contenir que des chiffres !";
				}
			}
			else{
				$error['street'] = "Vous n'avez pas saisie d'adresse !";
			}

			if(isset($_POST['postal_code']) and $_POST['postal_code'] != ""){
				$postal_code = strip_tags($_POST['postal_code']);
				if(strlen($postal_code) > 5){
					$error['postal_code'] = "Le code postale ne doit pas dépasser 5 caractères !";
				}
				else if(!ctype_digit($_POST['postal_code'])){
					$error['postal_code'] = "Le code postale ne doit contenir que des chiffres !";
				}
			}
			else{
				$error['postal_code'] = "Le code postale n'a pas été saisie !";
			}

			if(isset($_POST['city']) and $_POST['city'] != ""){
				$city = strip_tags($_POST['city']);
				if(strlen($city) > 30){
					$error['city'] = "La ville ne doit pas faire plus de 50 caractères !";
				}
				else if(!ctype_alpha($_POST['city'])){
					$error['city'] = "La ville ne doit pas contenir de chiffres !";
				}
			}
			else{
				$error['city'] = "La ville n'a pas été renseignée !";
			}

			if(isset($_POST['mail']) or $_POST['mail'] != ""){
				$mail = strip_tags($_POST['mail']);
				if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
					$error['mail'] = "Le mail rentré n'est pas valide !";
				}
			}
			else{
				$error['mail'] = "Vous n'avez pas saisie votre mail !";
			}

			include_once('View/v_inscription.php');
		}
		else{
			include_once('View/v_inscription.php');
		}
	}
	else{
		echo 'Vous ne pouvez pas vous inscrire car vous êtes déjà connecté !';
	}

