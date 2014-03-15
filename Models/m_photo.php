<?php

function insert_photo($photos, $galerie){
	global $bdd;

	if(is_array($photos)){
		$req = $bdd->prepare('INSERT INTO photo(nom, galerie) VALUES(:nom, :galerie)');
		foreach($photos as $photo){
			$req->execute(array(':nom' => $photo, ':galerie' => $galerie));
		}
	}
	else{
		$req = $bdd->prepare('INSERT INTO photo(nom, galerie) VALUES(:nom, :galerie)');
		$req->execute(array(':nom' => $photos, ':galerie' => $galerie));
	}
}