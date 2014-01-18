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
	                	if(isset($affichage_titre_rando[0])){ // Il est mieux de faire un foreach au cas ou on a plusieurs résultats
	                		echo'Vous avez selectionné la randonnée : '.$affichage_titre_rando[0]['titre'];
	                	}
	                	else{
	                		echo'<p>Aucun résultat trouvé</p>';
	                	}
	                	if(isset($affichage_region[0])){
	                		echo'Dans la région '.$affichage_region[0]['nom'].'se trouve les randonnées suivantes :';
	                	
	                	}
	                	else{
	                		echo'<p>Aucune randonnée dans la région : '.$affichage_region[0]['nom'].'</p>';
	                	}
	                ?>
	            </section>
	        </div>
			<?php 
				footer(); 
			?>
	</body>
</html>


