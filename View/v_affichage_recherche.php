<!DOCTYPE html>
<html lang="fr">

	<?php 
		head("Recherche d'une randonn�e"); 
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
	                	
	                	if(isset($affichage_titre_rando[0])){ // Il est mieux de faire un foreach au cas ou on a plusieurs r�sultats
	                		echo'Vous avez selectionn� la randonn�e : '.$affichage_titre_rando[0]['titre'];
	                	}
	                	else{
	                		echo'<p>Aucun r�sultat trouv�</p>';
	                	}

	                	/*QUESTIONNAIRE COMPLET*/
	        
	                	if(isset($affichage_rando_complet) and !empty($affichage_rando_complet))
	                	{
	                		foreach($affichage_rando_complet as $rando){
	                			echo'<center>';
		                			echo '<strong>'.$rando['titre'].'</strong><br/>';
		                			echo $rando['longueur'].'<br/>';
		                			echo $rando['dur�e'].'<br/>';
		                			echo 'Point d\' eau : '.$rando['point_eau'].'<br/>';
		                			echo $rando['difficult�'].'<br/>';
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

