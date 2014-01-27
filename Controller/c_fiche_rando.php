<?php

include_once('bin/params.php');
include_once('Models/m_randonnees.php');

if(isset($_GET['code'])){
	$code = $_GET['code'];
	
	$rando = get_rando($code);
	
	$title = $rando->titre;
	$lenght = $rando->longueur.' Km';
	
	// Durée
	$time = new DateTime(trim($rando->duree));
	$duration = $time->format('h').'h'.$time->format('i');
	
	$difficulty = $rando->difficulte;
	$description = $rando->descriptif;
	$note = $rando->note;
	$water = $rando->point_eau;
	$altitude = $rando->denivele;
	$equipment = $rando->equipement;
	
	// Date et Heure d'insertion
	$date = new DateTime(trim($rando->date_insertion));
	$month = $date->format('m');
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
	$insertion_date = $date->format('d').' '.$month.' '.$date->format('Y');
	$insertion_hour = $date->format('h').'h'.$date->format('i');
	
	$path = $rando->parcours;
	$region = $rando->region;
	$author = $rando->auteur;
	$galery = $rando->nom_galerie;
	$photo = 'Resources/Galerie/'.$galery.'/'.$rando->nom_photo;
}

include_once('View/v_fiche_rando.php');