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
	                	if(isset($affichage_region) and !empty($affichage_region)){
	                		
	                		echo'Dans la r�gion '.$affichage_region[0]['nom'].'se trouve les randonn�es suivantes :<br/>';
	                		foreach($affichage_region as $rando){
	                			echo 'Randos : '.$rando['titre'].'<br/>';
	                		}
	                	
	                	}
	                	else{
	                		echo'<p>Il n\'y a ucune randonn�e dans cette r�gion</p>';
	                	}


	                	if(isset($affichage_rando) and !empty($affichage_rando)){
	                		echo'il existe bien la randonn�e :  '.$affichage_rando[0]['titre'].' dans la r�gion : '.$affichage_rando[0]['nom'].'';
	                		foreach($affichage_rando as $randonnee){
	                			echo 'Rando : '.$randonnee['titre'].'<br/>';
	                		}
	                	}
	                	else{
	                		echo'il n\'y a rien du tout';
	                	}

	                	/*QUESTIONNAIRE COMPLET*/
	        

	                ?>
	            </section>
	        </div>
			<?php 
				footer(); 
			?>
	</body>
</html>


