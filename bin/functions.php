<?php
/* Ce fichier contient des fonctions utiles dans plusieurs modules du site */


// Permet de supprimer les fichier temporaire n'étant plus utilisés(Si un utilisateur n'a pas enregistrer sa rando avant de quitter)
function cleanTmp($dirGpxTmp = 'Resources/GPX/tmp'){
	
	$listSession = array();

	$dir = opendir(session_save_path()); // Chemin des fichiers de session
	while($file = readdir($dir)) {
		if($file != '.' and $file != '..' and !is_dir($dir.'/'.$file)){
				$listSession[] = substr($file, 5);
		}
	}
	closedir($dir);

	$dir = opendir($dirGpxTmp);
	while($file = readdir($dir)) {
		if($file != '.' and $file != '..'){
			if(!in_array(substr($file, 4), $listSession)){
				if(is_dir($dirGpxTmp.'/'.$file)){ // Si c'est un dossier
					cleanDir($dirGpxTmp.'/'.$file); // Vide et supprime le sous dossier
				}
				else{
					unlink($dirGpxTmp.'/'.$file);
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
	$dir = opendir($dirname);
	while($file = readdir($dir)){
		if($file != '.' and $file != '..'){
			if(is_dir($dirname.'/'.$file)){
				cleanDir($dirname.'/'.$file); // Rappel la fonction elle même
			}
			else{
				unlink($dirname.'/'.$file);
			}
		}
	}
	closedir($dir);
	rmdir($dirname); // Supprime le dossier courant
}

/*
	Déplace tous les fichier d'un dossier dans un autre dossier
	Prend en paramètre le dossier source et le dossier d'arrivée
	Renvoie un tableau contenant la liste des nom de fichiers contenus dans le dossier
*/
function moveFilesDir($src, $dest){
	$dirSrc = opendir($src);
	$listFiles = array();
	while($file = readdir($dirSrc)){
		if($file != '.' and $file != '..'){
			rename($src.'/'.$file, $dest.'/'.$file);
			$listFiles[] = $file;
		}
	}
	return $listFiles;
}

/*
	Retourne la distance qu'il y a entre 2 coordonnées
*/
function compareCoord($lat1, $lon1, $lat2, $lon2){
	$res =  69.09 * rad2deg(acos(sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lon1 - $lon2)))); 
    $res *= 1.609344; // En kilomètre
    return $res;
}


function array_insert(&$array, $element, $indice){
	$size = count($array);
	if($indice < $size){
		$array[] = $array[$size-1];
		for($i = $size-2; $i >= $indice; $i--){
			$array[$i+1] = $array[$i];
		}
		$array[$indice] = $element;

	}
	else{
		$array[] = $element; // Ajoute l'élément à la fin
	}
}