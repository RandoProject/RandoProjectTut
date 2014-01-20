<!DOCTYPE html>
<html lang="fr">

	<?php 
		head("Recherche d'une randonnée"); 
	?>
	

	<body>
			<?php 
				menu(); 
			?>
			
			<div id="corps">
			<?php
				activitees_recentes();
			?>
				<section>
	                <?php

	                	/*TEST QUESTIONNAIRE*/
	                	/*
	                	if(isset($affichage_titre_rando[0])){ // Il est mieux de faire un foreach au cas ou on a plusieurs résultats
	                		echo'Vous avez selectionné la randonnée : '.$affichage_titre_rando[0]['titre'];
	                	}
	                	else{
	                		echo'<p>Aucun résultat trouvé</p>';
	                	}
	                	if(isset($affichage_region) and !empty($affichage_region)){
	                		
	                		echo'Dans la région '.$affichage_region[0]['nom'].'se trouve les randonnées suivantes :<br/>';
	                		foreach($affichage_region as $rando){
	                			echo 'Randos : '.$rando['titre'].'<br/>';
	                		}
	                	
	                	}
	                	else{
	                		echo'<p>Il n\'y a ucune randonnée dans cette région</p>';
	                	}


	                	if(isset($affichage_rando) and !empty($affichage_rando)){
	                		echo'il existe bien la randonnée :  '.$affichage_rando[0]['titre'].' dans la région : '.$affichage_rando[0]['nom'].'';
	                		foreach($affichage_rando as $randonnee){
	                			echo 'Rando : '.$randonnee['titre'].'<br/>';
	                		}
	                	}
	                	else{
	                		echo'il n\'y a rien du tout';
	                	}
						*/

	                	/*QUESTIONNAIRE COMPLET*/
	        
	                	if(isset($affichage_rando_complet) and !empty($affichage_rando_complet))
	                	{
	                		foreach($affichage_rando_complet as $rando){
	                			echo'<center>';
		                			echo '<strong>'.$rando['titre'].'</strong><br/>';
		                			echo $rando['longueur'].'<br/>';
		                			echo $rando['durée'].'<br/>';
		                			echo 'Point d\' eau : '.$rando['point_eau'].'<br/>';
		                			echo $rando['difficulté'].'<br/>';
		                		echo '</center>';
	                		}
	                	}
	                	else
	                	{
	                		echo 'erreur';
	                	}

	                ?>
	            </section>
	        </div>
			<?php 
				footer(); 
			?>
	</body>
</html>

