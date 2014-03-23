<?php
    
    // désactive le temps max d'exécution
    set_time_limit(0);
    
    // on a bien une demande de téléchargement de fichier 
    if(empty($_GET['file'])){
       header('Location:index.php?page=erreur');
        exit;
    }
    
    // le nom doit être un nom de fichier
    if(basename($_GET['file']) != $_GET['file']){
       header('Location:index.php?page=erreur');
        exit;
    }
    
    $name = $_GET['file'];
    
    // vérifie l'existence et l'accès en lecture au fichier
    $filename = dirname(__FILE__)."/../Resources/GPX/".$name;
    if(!is_file($filename) || !is_readable($filename)){
        header('Location:index.php?page=erreur');
        exit;
    }
    
    $size = filesize($filename);
    
    // désactivation compression GZip
    if (ini_get("zlib.output_compression")) {
    ini_set("zlib.output_compression", "Off");
    }
    
    // fermeture de la session
    session_write_close();
    //permet de fermer la session en cours.
    //Si la session reste ouverte avant l’envoi des données,
    //vous ne pourrez plus naviguer sur le site tant que le téléchargement ne sera pas terminé
    
    // désactive la mise en cache
    header("Cache-Control: no-cache, must-revalidate");
    header("Cache-Control: post-check=0,pre-check=0");
    header("Cache-Control: max-age=0");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    // force le téléchargement du fichier avec un beau nom
    header("Content-Type: application/force-download");
    header('Content-Disposition: attachment; filename="'.$name.'"');
    
    // indique la taille du fichier à télécharger
    header("Content-Length: ".$size);
    
    // envoi le contenu du fichier
    readfile($filename);
    
    
    