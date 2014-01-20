<?php
const NAME_SITE = 'RandoPassion';
const CSS_BASE = 'Design.css';

/* Arguments : 
	$titlePage : Le titre que l'on veut donner à la page
	$listInc : tableau contenant les CSS, Scripts... que l'on veut rajouter(facultatif) 
	 Chaque élément du tableau doit avoir cette forme : array('type' => 'css ou javascript', 'href' => 'path', 'name' => 'optionel pour css')*/
function head($titlePage, $listInc = array()){
	echo '<head>';
	echo '<title>'.NAME_SITE.' - '.$titlePage.'</title>';
	echo '<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>';
	echo '<link rel="stylesheet" type="text/css" title="Design" href="CSS/'.CSS_BASE.'"/>';
	echo '<link rel="stylesheet" type="text/css" title="Design" href="CSS/Diaporama.css"/>';
	echo '<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>';
	foreach($listInc as $inc){
		if(isset($inc['type'])){
			switch(strtolower($inc['type'])){
				case 'css':
					echo '<link rel="stylesheet" href="'.$inc['href'].'" type="text/css" '.(isset($inc['name'])? 'title="'.$inc['name'].'"' : '').'/>'; // Peut-être changer les titres
				break;

				case 'javascript':
					echo '<script type="text/javascript" src="'.$inc['href'].'"></script>';
				break;
				default: break;
				}
				
		}
	}
	echo '</head>';
}
?>