<?php
/* Ce fichier contient des fonctions utiles dans plusieurs modules du site */


// Permet de supprimer les fichier temporaire n'étant plus utilisés(Si un utilisateur n'a pas enregistrer sa rando avant de quitter)
function cleanTmpGPX($dirGpxTmp = 'Resources/GPX/tmp'){
	
	$listSession = array();


	$dir = opendir(session_save_path()); // Chemin des fichiers de session
	while($file = readdir($dir)) {
		if($file != '.' && $file != '..' && !is_dir($dir.'/'.$file)){
				$listSession[] = substr($file, 5);
		}
	}
	closedir($dir);

	$dir = opendir($dirGpxTmp);
	while($file = readdir($dir)) {
		if($file != '.' && $file != '..'){
			if(!in_array(substr($file, 4), $listSession)){
				if(is_dir($dirGpxTmp.'/'.$file)){ // Si c'est un dossier
					cleanDir($dirGpxTmp.'/'.$file); // Vide et supprime le sous dossier
				}
				else{
					unlink($file);
				}
			}
		}
	}
	closedir($dir);

}


/*
	Supprime un dossier, les fichiers qu'il contient et toute l'arborescence en dessous de lui de manière récursive
*/
function cleanDir($dirname){ 
	$dir = opendir($dirname)
	while($file = readdir($dir)) {
		if($file != '.' && $file != '..'){
			if(is_dir($dirname.'/'.$file)){
				cleanDir($dirname.'/'.$file); // Rappel la fonction elle même
			}
			else{
				unlink($file);
			}
		}
	}
	closedir($dir);
	rmdir($dirname); // Supprime le dossier courant
}