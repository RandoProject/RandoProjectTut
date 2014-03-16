<?php

function insert_photo($photos, $galerie){
	global $bdd;
	$idFirst = null;
	
	if(is_array($photos)){
		$req = $bdd->prepare('INSERT INTO photo(nom, galerie) VALUES(:nom, :galerie)');
		for($i=0; $i < count($photos); $i++){
			if($i == 0){
				$bdd->exec('LOCK TABLES photo WRITE');
				$req->execute(array(':nom' => $photos[$i], ':galerie' => $galerie));
				$idFirst = $bdd->lastInsertId(); // Récupère l'id de la première photo
				$bdd->exec('UNLOCK TABLES');
			}
			else{
				$req->execute(array(':nom' => $photos[$i], ':galerie' => $galerie));
			}
		}
	}
	else{
		$req = $bdd->prepare('INSERT INTO photo(nom, galerie) VALUES(:nom, :galerie)');
		$bdd->exec('LOCK TABLES photo WRITE');
		$req->execute(array(':nom' => $photos, ':galerie' => $galerie));
		$idFirst = $bdd->lastInsertId();
		$bdd->exec('UNLOCK TABLES');
	}
	return $idFirst;
}