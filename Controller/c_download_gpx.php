<?php
    
    // d�sactive le temps max d'ex�cution
    set_time_limit(0);
    
    // on a bien une demande de t�l�chargement de fichier 
    if(empty($_GET['file'])){
       header('Location:index.php?page=erreur');
        exit;
    }
    
    // le nom doit �tre un nom de fichier
    if(basename($_GET['file']) != $_GET['file']){
       header('Location:index.php?page=erreur');
        exit;
    }
    
    $name = $_GET['file'];
    
    // v�rifie l'existence et l'acc�s en lecture au fichier
    $filename = dirname(__FILE__)."/../Resources/GPX/".$name;
    if(!is_file($filename) || !is_readable($filename)){
        header('Location:index.php?page=erreur');
        exit;
    }
    
    $size = filesize($filename);
    
    // d�sactivation compression GZip
    if (ini_get("zlib.output_compression")) {
    ini_set("zlib.output_compression", "Off");
    }
    
    // fermeture de la session
    session_write_close();
    //permet de fermer la session en cours.
    //Si la session reste ouverte avant l�envoi des donn�es,
    //vous ne pourrez plus naviguer sur le site tant que le t�l�chargement ne sera pas termin�
    
    // d�sactive la mise en cache
    header("Cache-Control: no-cache, must-revalidate");
    header("Cache-Control: post-check=0,pre-check=0");
    header("Cache-Control: max-age=0");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    // force le t�l�chargement du fichier avec un beau nom
    header("Content-Type: application/force-download");
    header('Content-Disposition: attachment; filename="'.$name.'"');
    
    // indique la taille du fichier � t�l�charger
    header("Content-Length: ".$size);
    
    // envoi le contenu du fichier
    readfile($filename);
    
    
    