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
	                	if(isset($affichage_titre_rando[0])){ // Il est mieux de faire un foreach au cas ou on a plusieurs r�sultats
	                		echo'Vous avez selectionn� la randonn�e : '.$affichage_titre_rando[0]['titre'];
	                	}
	                	else{
	                		echo'<p>Aucun r�sultat trouv�</p>';
	                	}
	                	if(isset($affichage_region[0])){
	                		echo'Dans la r�gion '.$affichage_region[0]['nom'].'se trouve les randonn�es suivantes :';
	                	
	                	}
	                	else{
	                		echo'<p>Aucune randonn�e dans la r�gion : '.$affichage_region[0]['nom'].'</p>';
	                	}
	                ?>
	            </section>
	        </div>
			<?php 
				footer(); 
			?>
	</body>
</html>


