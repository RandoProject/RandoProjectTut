<?php
const NAME_SITE = 'Rando';
const CSS_BASE = 'design.css';

/* Arguments : 
	$titlePage : Le titre que l'on veut donner à la page
	$listInc : tableau contenant les CSS, Scripts... que l'on veut rajouter(facultatif) 
	 Chaque élément du tableau doit avoir cette forme : array('type' => 'css ou javascript', 'href' => 'path', 'name' => 'optionel pour css')*/
function head($titlePage, $listInc = array()){
	echo '<head>';
	echo '<title>'.NAME_SITE.' - '.$titlePage.'</title>';
	echo '<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>';
	echo '<link rel="stylesheet" href="CSS/'.CSS_BASE.'" type="text/css" title="Design"/>';
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


function headerPage(){
	echo '<header></header>';
}

function menu(){
	echo '<div id="menu">';

	echo '</div>';
}

function footer(){
	echo '<footer>';

	echo '</footer>';
}