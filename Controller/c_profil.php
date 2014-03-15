<?php

if(!$_SESSION){
	header('location:index.php?page=connexion');
}

include_once('bin/params.php');
include_once('Models/m_members.php');

$member = get_member($_GET['pseudo']);
$photo = get_photo($_GET['pseudo']);


$pseudo = $member->pseudo;
$name = $member->nom;
$firstname = $member->prenom;

// Photo
$path_photo = 'Resources/Galerie/'.$photo->galerie.'/'.$photo->photo;

// Date de naissance
if(empty($member->date_naiss)){
	$birth = '<em>non renseignée</em>';
}
else{
	$date = new DateTime(trim($member->date_naiss));
	$day = $date->format('d');
	$month = $date->format('m');
	$year = $date->format('Y');
	switch($month) {
		case '01': $month = 'Janvier'; break;
		case '02': $month = 'Février'; break;
		case '03': $month = 'Mars'; break;
		case '04': $month = 'Avril'; break;
		case '05': $month = 'Mai'; break;
		case '06': $month = 'Juin'; break;
		case '07': $month = 'Juillet'; break;
		case '08': $month = 'Août'; break;
		case '09': $month = 'Septembre'; break;
		case '10': $month = 'Octobre'; break;
		case '11': $month = 'Novembre'; break;
		case '12': $month = 'Décembre'; break;
		default: $month =''; break;
	}
	$birth = $day.' '.$month.' '.$year;
}

// Adresse
if(empty($member->adresse) && empty($member->code_postal) && empty($member->ville)){
	$address = '<em>non renseignée</em>';
}
else{
	if(!empty($member->adresse)){
		$address = $member->adresse;
	}
	if(!empty($member->code_postal)){
		if(!empty($member->adresse))
			$address .= ', '.$member->code_postal;
		else
			$address = $member->code_postal;
	}
	if(!empty($member->ville)){
		if(!empty($member->adresse) || !empty($member->code_postal))
			$address .= ', '.$member->ville;
		else
			$address = $member->ville;
	}
}

// E-mail
if(empty($member->mail)){
	$mail = '<em>non renseigné</em>';
}
else{
	$mail = $member->mail;
}

// Déscription
if(empty($member->description)){
	$description = '<em>non renseignée</em>';
}
else{
	$description = $member->description;
}

// Randonnées
$listeRando = get_rando_of($pseudo);

include_once('View/v_profil.php');