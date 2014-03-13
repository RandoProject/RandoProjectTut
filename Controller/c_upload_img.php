<?php
$listExtensions = array('jpg', 'jpeg', 'gif', 'png');

if(isset($_FILES['images'])){
	// Key est l'indice du fichier chargé
	foreach ($_FILES['images']['error'] as $key => $error) {
	  	if($error == UPLOAD_ERR_OK){
	  		$infoFile = pathinfo($_FILES['images']['name'][$key]); // Récupère l'extension du fichier
	  		
	  		if(in_array($infoFile['extension'], $listExtensions) and $_FILES['images']['size'][$key] <= 3000000){ // Environ 3 Mo

	  			if(!file_exists('Resources/Images/rando/tmp/'.session_id())){
	  				mkdir('Resources/Images/rando/tmp/'.session_id(), 0700); // On crée le dossie temporaire de reception
	  			}
	    		move_uploaded_file($_FILES['images']['tmp_name'][$key], 'Resources/Images/rando/'.$key.basename($_FILES['images']['name'][$key]));
	    	}
	    }
	}
}
