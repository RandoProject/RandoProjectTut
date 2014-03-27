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
		$idParcours = $rando->parcours;
		
		
		//Nom du GPX
		if($idParcours !== null){
			$nom_GPX = get_nom_parcour($idParcours);
			$nom_GPX_final = $nom_GPX->nom_parcour;
		}
		
		// Nombre de note
		$number_of_note = $rando->nb_note.' vote'.(( $rando->nb_note > 1)? 's' : '');
		
		// Difficulté
		$difficulty = '';
        for($j = 1; $j <= $rando->difficulte; $j++){ 
			$difficulty .= '<div id="cercle"></div>'; 
		}
		
		// Durée
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
		if(empty($rando->point_eau) || $rando->point_eau === '0'){
			$water = '<em>non renseigné</em>';
		}
		else{
			$water = 'oui';
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
			$equipment = '';
		}
		else{
			$equipment = 'Equipement conseillé : '.$rando->equipement.'<br/><br/>';
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

		// Dejà_noté
		if(isset($_SESSION['pseudo'])){
			$note_existante = note_existante($code, $_SESSION['pseudo']);
		}

		//Commentaire
		if(isset($_SESSION['pseudo']) and strtolower($_SERVER['REQUEST_METHOD']) == 'post' and isset($_POST['commentaire']) and $_POST['commentaire'] != ""){
				$commentaire = strip_tags($_POST['commentaire']);
				if(!isset($_POST['note'])){
					$note2 = 0;
				}
				else if(is_numeric($_POST['note']) and intval($_POST['note']) <= 5 and intval($_POST['note']) >= 1){
					$note2 = intval($_POST['note']);
				}
				validation_commentaire($commentaire,$_SESSION['pseudo'], $code, $note2);
				$nombre_commentaire = recuperation_commentaire($code);
				$moyenne = moyenne_note_rando($code);
				mise_a_jour_note($code, $moyenne['moyenne_note']);
				header('Location:index.php?page=commentaire_valide&code='.$code);
		}
		else{
			$nombre_commentaire = recuperation_commentaire($code);
			include_once('bin/params.php');
			include_once('Models/m_parcours.php');
			if($idParcours !== null){
				$srcParcours = get_parcours($idParcours)->nom; // Récupère le chemin du parcours
			}

			include_once('View/v_fiche_rando.php');
		}
	}
	else{
		header('Location:index.php?page=erreur');
	}
}
else{
	header('Location:index.php?page=erreur');
}
