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
	                	if(isset($affichage_rando[0])){ // Il est mieux de faire un foreach au cas ou on a plusieurs r�sultats
	                		echo'Vous avez selectionn� la randonn�e : '.$affichage_rando[0]['titre'];
	                	}
	                	else{
	                		echo'<p>Aucun r�sultat trouv�</p>';
	                	}
	                ?>
	            </section>
	        </div>
			<?php 
				footer(); 
			?>
	</body>
</html>


