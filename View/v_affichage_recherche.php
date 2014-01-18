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
	                	if(isset($affichage_region) and !empty($affichage_region)){
	                		
	                		echo'Dans la r�gion '.$affichage_region[0]['nom'].'se trouve les randonn�es suivantes :';
	                		foreach($affichage_region as $rando){
	                			echo 'Randos : '.$rando['titre'].'<br>';
	                		}
	                	
	                	}
	                	else{
	                		echo'<p>Aucune randonn�e dans la r�gion : <strong> </section>strong></p>';
	                	}
	                ?>
	            </section>
	        </div>
			<?php 
				footer(); 
			?>
	</body>
</html>


