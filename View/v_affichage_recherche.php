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
	                	if(isset($affichage_rando[0])){ // Il est mieux de faire un foreach au cas ou on a plusieurs résultats
	                		echo'Vous avez selectionné la randonnée : '.$affichage_rando[0]['titre'];
	                	}
	                	else{
	                		echo'<p>Aucun résultat trouvé</p>';
	                	}
	                ?>
	            </section>
	        </div>
			<?php 
				footer(); 
			?>
	</body>
</html>


