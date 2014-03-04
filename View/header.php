 <?php

/* 
	Arguments : 
		$titlePage	:	Le titre que l'on veut donner à la page
		$listInc 	:	Tableau contenant les CSS, Scripts... que l'on veut rajouter(facultatif) 
	 		Chaque élément du tableau doit avoir cette forme : array('type' => 'css ou javascript', 'href' => 'path', 'name' => 'optionel pour css')
*/
	 
const NAME_SITE = 'RandoPassion';
const CSS_BASE = 'Design.css';

function head($titlePage, $listInc = array()){
	echo '<head>';
	echo '<title>'.NAME_SITE.' - '.$titlePage.'</title>';
	echo '<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>';
	echo '<link rel="stylesheet" type="text/css" href="CSS/'.CSS_BASE.'"/>';
	echo '<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>';
	foreach($listInc as $inc){		
		if(isset($inc['type'])){
			switch(strtolower($inc['type'])){
				case 'css':
					echo '<link rel="stylesheet" type="text/css" href="'.$inc['href'].'/'.$inc['name'].'.'.$inc['type'].'"/>';
					break;

				case 'javascript':
					echo '<script type="text/javascript" src="'.$inc['src'].'"></script>';
					break;
				case 'meta':
					echo '<meta ';
					while ($elem = current($inc)) { // Permet de mettre n'importe quel type d'attributs
						if(key($inc) != 'type'){
					    	echo key($inc).'="'.$elem.'" ';
					    }
					    next($inc);
					}
					echo '/>';
				break;

				default: break;
			}	
		}
	}
	echo '</head>';
}
