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
	                	echo'Vous avez selectionné la randonnée : '.$affichage_rando['titre'];
	                ?>
	            </section>
	        </div>
			<?php 
				footer(); 
			?>
	</body>
</html>


