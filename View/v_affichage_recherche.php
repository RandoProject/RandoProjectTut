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
	                	echo'Vous avez selectionn� la randonn�e : '.$affichage_rando['titre'];
	                ?>
	            </section>
	        </div>
			<?php 
				footer(); 
			?>
	</body>
</html>


