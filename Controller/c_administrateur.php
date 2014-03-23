<?php

if(!isset($_SESSION['statut']) or $_SESSION['statut'] !== 'administrateur'){
	header('location:index.php?page=accueil');
}

include_once('bin/params.php');
include_once('Models/m_administration.php');

/* Rando */
if($_GET['section'] === 'randonnees'){
	if(!empty($_POST['rando'])){
		if(!empty($_POST['delete'])){
			delete_rando($_POST['rando']);
		}
		else if(!empty($_POST['validUpdate'])){
			update_rando($_POST['rando'], $_POST['title'], $_POST['equipment'], $_POST['description']);
		}
	}
	$listeRando = get_liste_rando();
	if(!empty($_POST['rando']) && !empty($_POST['update'])){
		$listeRando = liste_update($_POST['rando']);
	}
}

/* Commenaire */
else if($_GET['section'] === 'commentaires'){
	if(!empty($_POST['comment'])){
		if(!empty($_POST['delete'])){
			delete_comment($_POST['comment']);
			update_note_rando($_POST['rando']);
		}
	}
	$listeComment = get_liste_comment('');
}

/* Photos */
else if($_GET['section'] === 'photos'){
	if(!empty($_POST['photo'])){
		if(!empty($_POST['delete'])){
			delete_photo($_POST['photo']);
		}
	}
	$listePhoto = get_liste_photo('	AND photo.numero NOT IN (SELECT photo_principale FROM rando) 
									AND photo.numero NOT IN (SELECT photo FROM membre)');
}

/* Membres */
else if($_GET['section'] === 'membres'){
	if(!empty($_POST['membre'])){
		if(!empty($_POST['delete'])){
			delete_member($_POST['membre']);
		}
	}
	$listeMembre = get_liste_member();
}

include_once('View/v_administrateur.php');