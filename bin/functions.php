<?php
/* Ce fichier contient des fonctions utiles dans plusieurs modules du site */


// Permet de supprimer les fichier temporaire n'étant plus utilisés(Si un utilisateur n'a pas enregistrer sa rando avant de quitter)
function cleanTmpGPX($dirGpxTmp = 'Resources/GPX/tmp'){
	$dir = opendir($dirGpxTmp);
	$listGpx = array();


	while($file = readdir($dir)) {
		if($file != '.' && $file != '..' && !is_dir($dirGpxTmp.$file)){
			$listGpx[] = substr($file, 4); // Enlève 'gpx_' dans le nom du fichier
		}
	}
	closedir($dir);


	$dir = opendir(session_save_path()); // Chemin des fichiers de session
	while($file = readdir($dir)) {
		if($file != '.' && $file != '..' && !is_dir($dirGpxTmp.$file)){
				$idSession = substr($file, 5);
				if(array_key_exists($idSession, $listGpx)){
					array_slice(array_key_exists($idSession, $listGpx)); // On supprime l'élément du tableau
				}
		}
	}
	closedir($dir);

	// Supprimer les fichiers en trop

}