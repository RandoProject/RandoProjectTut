<?php

include_once('bin/params.php');
include_once('Models/m_members.php');
include_once('Models/m_inscription.php');

if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
	// Pseudo
	if(isset($_POST['pseudo']) and $_POST['pseudo'] != ""){
		$pseudo = strip_tags($_POST['pseudo']);
		$pseudo2 = get_member($pseudo);
		if(strlen($pseudo) > 30){
			$error['pseudo'] = "Votre pseudo doit faire moins de 30 caractères !";
		}
		else if(!empty($pseudo2)){
			$error['pseudo'] = "Le pseudo <strong>".$pseudo."</strong> existe déjà !";
		}
	}
	else{
		$error['pseudo'] = "Vous n'avez pas renseigné votre pseudo !";
	}
	// Password
	if(isset($_POST['password'], $_POST['confirm_password']) and $_POST['password'] != ""){
		$password = strip_tags($_POST['password']);
		$confirm_password = strip_tags($_POST['confirm_password']);
		if(strlen($password) > 30 or strlen($confirm_password) > 30){
			$error['password'] = "Votre mot de passe ne doit pas contenir plus de 30 caractères !";
		}
		else if($_POST['confirm_password'] != $_POST['password']){
			$error['password'] = "Les deux mots de passe ne correspondent pas !";
		}
	}
	else{
		$error['password'] = "Vous n'avez pas entré de mot de passe !";
	}
	// Nom
	if(isset($_POST['familly_name']) and $_POST['familly_name'] != ""){
		$familly_name = strip_tags($_POST['familly_name']);
		if(strlen($familly_name) > 30){
			$error['familly_name'] = "Votre nom de famille doit faire moins de 30 caractères !";
		}
		else if(!ctype_alpha($familly_name)){
			$error['familly_name'] = "Votre nom de famille ne doit pas contenir de chiffres !";
		}
	}
	else{
		$error['familly_name'] = "Vous n'avez pas renseigné votre nom de famille ";
	}
	// Prénom
	if(isset($_POST['name']) and $_POST['name'] != ""){
		$name = strip_tags($_POST['name']);
		if(strlen($name) > 30){
			$error['name'] = "Votre prénom doit faire moins de 30 caractères !";
		}
		else if(!ctype_alpha($name)){
			$error['name'] = "Votre prénom ne doit pas contenir de chiffres !";
		}
	}
	else{
		$error['name'] = "Vous n'avez pas renseigné votre prénom !";
	}
	// Jour de naissance
	if(!isset($_POST['day_birth']) or $_POST['day_birth'] == ""){
		$day_birth = 0;
	}
	else if(is_numeric($_POST['day_birth']) and intval($_POST['day_birth']) <= 31 and intval($_POST['day_birth']) >= 1){
		$day_birth = intval($_POST['day_birth']);
	}
	else{
		$error['day_birth'] = "Le jour de naissance n'est pas valide !";
	}
	// Mois de naissance
	if(!isset($_POST['month_birth']) or $_POST['month_birth'] == ""){
		$month_birth = 0;
	}
	else if(is_numeric($_POST['month_birth']) and intval($_POST['month_birth']) <= 12 and intval($_POST['month_birth']) >= 1){
		$month_birth = intval($_POST['month_birth']);
	}
	else{
		$error['month_birth'] = "Le mois de naissance n'est pas valide !";
	}
	// Année de naissance
	if(!isset($_POST['year_birth']) or $_POST['year_birth'] == ""){
		$year_birth = 0;
	}
	else if(is_numeric($_POST['year_birth']) and intval($_POST['year_birth']) <= date('Y') and intval($_POST['year_birth']) >= 1920){
		$year_birth = intval($_POST['year_birth']);
	}
	else{
		$error['year_birth'] = "L'année de naissance n'est pas valide !";
	}
	// Adresse
	if(isset($_POST['street']) and $_POST['street'] != ""){
		$street = strip_tags($_POST['street']);
		if(strlen($street) > 70){
			$error['street'] = "L adresse ne doit pas faire plus de 70 caractères!";
		}
		else if(ctype_digit($street)){
			$error['street'] = "L'adresse ne peut pas contenir que des chiffres !";
		}
	}
	else{
		$street = '';
	}
	// Code postal
	if(isset($_POST['postal_code']) and $_POST['postal_code'] != ""){
		$postal_code = strip_tags($_POST['postal_code']);
		if(strlen($postal_code) > 5){
			$error['postal_code'] = "Le code postale ne doit pas dépasser 5 caractères !";
		}
		else if(!ctype_digit($postal_code)){
			$error['postal_code'] = "Le code postale ne doit contenir que des chiffres !";
		}
	}
	else{
		$postal_code = '';
	}
	// Ville
	if(isset($_POST['city']) and $_POST['city'] != ""){
		$city = strip_tags($_POST['city']);
		if(strlen($city) > 30){
			$error['city'] = "La ville ne doit pas faire plus de 50 caractères !";
		}
		else if(!ctype_alpha(str_replace(' ', '', $city))){
			$error['city'] = "La ville ne doit pas contenir de chiffres !";
		}
	}
	else{
		$city = '';
	}
	// Mail
	if(isset($_POST['mail']) or $_POST['mail'] != ""){
		$mail = strip_tags($_POST['mail']);
		if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
			$error['mail'] = "Le mail rentré n'est pas valide !";
		}
	}
	else{
		$error['mail'] = "Vous n'avez pas saisie votre mail !";
	}
	// Erreure
	if(isset($error) and !empty($error)){
		if(!isset($error['pseudo'])){
			$value['pseudo'] = $pseudo;
		}
		if(!isset($error['familly_name'])){
			$value['familly_name'] = $familly_name;
		}
		if(!isset($error['name'])){
			$value['name'] = $name;
		}
		if(!isset($error['street'])){
			$value['street'] = $street;
		}
		if(!isset($error['postal_code'])){
			$value['postal_code'] = $postal_code;
		}
		if(!isset($error['city'])){
			$value['city'] = $city;
		}
		if(!isset($error['mail'])){
			$value['mail'] = $mail;
		}

		include_once('View/v_inscription.php');
	}
	else{

		validation_inscription($pseudo, $password, $familly_name, $name, $day_birth, $month_birth, $year_birth, $street, $postal_code, $city, $mail);
		include_once('View/v_inscription.php');
	}
}
else{
	include_once('View/v_inscription.php');
}