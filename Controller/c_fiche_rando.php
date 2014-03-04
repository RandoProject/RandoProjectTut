<?php

include_once('bin/params.php');
include_once('Models/m_randonnees.php');
include_once('Models/m_commentaire.php');

if(isset($_GET['code'])){
	$code = $_GET['code'];
	
	if(get_rando($code)->valide === '1'){
		$rando = get_rando($code);
		
		$title = $rando->titre;
		$author = $rando->auteur;
		$description = $rando->descriptif;
		$department = $rando->nom_departement;
		$lenght = $rando->longueur.' Km';
		$path = $rando->parcours;
		$galery = $rando->nom_galerie;
		$photo = 'Resources/Galerie/'.$galery.'/'.$rando->nom_photo;
		
		// Nombre de note
			$number_of_note = $rando->nb_note.' vote'.(( $rando->nb_note > 1)? 's' : '');
		
		// Difficult�
		$difficulty = '';
        for($j = 1; $j <= $rando->difficulte; $j++){ 
			$difficulty .= '<div id="cercle"></div>'; 
		}
		
		// Dur�e
		$time = explode(':', $rando->duree);
		$minutes = intVal($time[1]);
		$hour = intVal($time[0]);
		$day = (int)($hour / 24);
		$hour = ($hour % 24);
		$duration = (($day > 0)?$day.' Jour'.(($day > 1)? 's ' : ' '): "").$hour.'h'.(($minutes > 0)? $minutes : "");
		
		
		// Note
        $etoile = '';
		if(empty($rando->note)){ 
			for($j = 1; $j <= 5; $j++){ 
				$etoile .= '<img class="etoile" src="Resources/Images/star_vide_fiche.png"/>';
			}
        }
        else{
            $k = intval($rando->note);
            $z = 5 - intval($rando->note);
            while($k >= 1){ 
                $etoile .= '<img class="etoile" src="Resources/Images/star-pleine_fiche.png"/>';
                $k--;
            }
            while($z >= 1){
                $etoile .= '<img class="etoile" src="Resources/Images/star_vide_fiche.png"/>';
                $z--;
            }
        }
		
		// Point d'eau
		if(empty($rando->point_eau)){
			$water = '<em>non renseign�</em>';
		}
		else{
			$water = $rando->point_eau;
		}
		
		// D�nivel�
		if(empty($rando->denivele)){
			$altitude = '<em>non renseign�</em>';
		}
		else{
			$altitude = $rando->denivele;
		}
		
		// Equipement
		if(empty($rando->equipement)){
			$equipment = '<em>non renseign�</em>';
		}
		else{
			$equipment = $rando->equipement;
		}
		
		// Date et Heure d'insertion
		$date = new DateTime(trim($rando->date_insertion));
		$month = $date->format('m');
		switch($month) {
			case '01': $month = 'Janvier'; break;
			case '02': $month = 'F�vrier'; break;
			case '03': $month = 'Mars'; break;
			case '04': $month = 'Avril'; break;
			case '05': $month = 'Mai'; break;
			case '06': $month = 'Juin'; break;
			case '07': $month = 'Juillet'; break;
			case '08': $month = 'Ao�t'; break;
			case '09': $month = 'Septembre'; break;
			case '10': $month = 'Octobre'; break;
			case '11': $month = 'Novembre'; break;
			case '12': $month = 'D�cembre'; break;
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
					$note2 = 0;
				}
				else if(is_numeric($_POST['note']) and intval($_POST['note']) <= 5 and intval($_POST['note']) >= 1){
					$note2 = intval($_POST['note']);
				}
				if($commentaire != ""){
						validation_commentaire($commentaire,$_SESSION['pseudo'], $code, $note2);
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
	else{
		header('Location:index.php?page=erreur');
	}
}

include_once('View/v_fiche_rando.php');