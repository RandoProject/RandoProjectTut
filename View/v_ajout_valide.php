<!DOCTYPE html>
<html lang="fr">
	
	<?php head("Randonné ajoutée",
		array(
			array('type' => 'meta', 'http-equiv' => 'refresh', 'content' => '3; URL=index.php')
		));
	?>
	<body>
    	<div id="corps">
			<?php menu(); ?>
        	
            <h2>Votre randonnée à bien été ajoutée.<br/>
            Elle sera affichée sur le site dès que le modérateur l'aura validé.</h2>

        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>
