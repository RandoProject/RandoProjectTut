<?php

if(isset($_SESSION['statut']) and $_SESSION['statut'] !== 'moderateur'){
	header('location:index.php?page=accueil');
}

include_once('bin/params.php');
include_once('Models/m_administration.php');

/* Rando */
if($_GET['section'] === 'randonnees'){
	if(!empty($_POST['rando'])){
		if(!empty($_POST['validate'])){
			validate_rando($_POST['rando']);
		}
		else if(!empty($_POST['delete'])){
			delete_rando($_POST['rando']);
		}
		else if(!empty($_POST['validUpdate'])){
			update_rando($_POST['rando'], $_POST['title'], $_POST['equipment'], $_POST['description']);
		}
	}
	$listeRando = get_liste_rando('rando.valide = 0');
	if(!empty($_POST['rando']) && !empty($_POST['update'])){
		$listeRando = liste_update($_POST['rando']);
	}
}

/* Commenaire */
else if($_GET['section'] === 'commentaires'){
	if(!empty($_POST['comment'])){
		if(!empty($_POST['validate'])){
			validate_comment($_POST['comment']);
		}
		else if(!empty($_POST['delete'])){
			delete_comment($_POST['comment']);
			update_note_rando($_POST['rando']);
		}
	}
	$listeComment = get_liste_comment('WHERE commentaire.valide = 0');
}

/* Photos */
else if($_GET['section'] === 'photos'){
	if(!empty($_POST['photo'])){
		if(!empty($_POST['validate'])){
			validate_photo($_POST['photo']);
		}
		else if(!empty($_POST['delete'])){
			delete_photo($_POST['photo']);
		}
	}
	$listePhoto = get_liste_photo('	AND valide = 0 
									AND photo.numero NOT IN (SELECT photo_principale FROM rando) 
									AND photo.numero NOT IN (SELECT photo FROM membre)');
}

include_once('View/v_moderateur.php');