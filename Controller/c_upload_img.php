<?php
// Key est l'indice du fichier chargé
foreach ($_FILES["images"]['error'] as $key => $error) {
  	if($error == UPLOAD_ERR_OK){
    	move_uploaded_file($_FILES['images']['tmp_name'][$key], '../Resources/Images/rando/'.$key.basename($_FILES['images']['name'][$key]));
    }
}
