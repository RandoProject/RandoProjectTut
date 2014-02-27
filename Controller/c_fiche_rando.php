<?php

include_once('bin/params.php');
include_once('Models/m_randonnees.php');
include_once('Models/m_commentaire.php');

if(isset($_GET['code'])){
	$code = $_GET['code'];
	
	$rando = get_rando($code);
	
	$title = $rando->titre;
	$author = $rando->auteur;
	$description = $rando->descriptif;
	$difficulty = $rando->difficulte;
	$department = $rando->nom_departement;
	$lenght = $rando->longueur.' Km';
	$path = $rando->parcours;
	$galery = $rando->nom_galerie;
	$photo = 'Resources/Galerie/'.$galery.'/'.$rando->nom_photo;
	
	// Durée
	$time = new DateTime(trim($rando->duree));
	$duration = $time->format('H').'h'.$time->format('i');
	
	// Note
	if(empty($rando->note)){
		$note = '<em>non renseigné</em>';
	}
	else{
		$note = $rando->note;
	}
	
	// Point d'eau
	if(empty($rando->point_eau)){
		$water = '<em>non renseigné</em>';
	}
	else{
		$water = $rando->point_eau;
	}
	
	// Dénivelé
	if(empty($rando->denivele)){
		$altitude = '<em>non renseigné</em>';
	}
	else{
		$altitude = $rando->denivele;
	}
	
	// Equipement
	if(empty($rando->equipement)){
		$equipment = '<em>non renseigné</em>';
	}
	else{
		$equipment = $rando->equipement;
	}
	
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
	$insertion_hour = $date->format('H').'h'.$date->format('i');
	
	// Galerie
	$listeImage = get_galery($code);


	//Commentaire
	if($_SESSION){
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
			if(!empty($_POST['commentaire'])){
				$commentaire = strip_tags($_POST['commentaire']);
			}
			if(!isset($_POST['note'])){
				$note = 0;
			}
			else if(is_numeric($_POST['note']) and intval($_POST['note']) <= 5 and intval($_POST['note']) >= 1){
				$note = intval($_POST['note']);
			}

			if($commentaire != ""){
					validation_commentaire($commentaire,$_SESSION['pseudo'], $code, $note);
					$nombre_commentaire = recuperation_commentaire($code);
					$insertion_date = $date->format('d').' '.$month.' '.$date->format('Y');
					$moyenne = moyenne_note_rando($code);
					mise_a_jour_note($code, $moyenne['moyenne_note']);
					include_once('View/v_fiche_rando.php');
			}
		}
	}

	$nombre_commentaire = recuperation_commentaire($code);
}

include_once('View/v_fiche_rando.php');