<!DOCTYPE html>
<html lang="fr">
	
	<?php head("Randonn� ajout�e",
		array(
			array('type' => 'meta', 'http-equiv' => 'refresh', 'content' => '3; URL=index.php')
		));
	?>
	<body>
    	<div id="corps">
			<?php menu(); ?>
        	
            <h2>Votre randonn�e � bien �t� ajout�e.<br/>
            Elle sera affich�e sur le site d�s que le mod�rateur l'aura valid�.</h2>

        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>
