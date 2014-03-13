<!DOCTYPE html>
<html lang="fr">
	
	<?php head("Erreur 404",
		array(
			array('type' => 'meta', 'http-equiv' => 'refresh', 'content' => '3; URL=index.php')
		));
	?>
	<body>
    	<div id="corps">
			<?php menu(); ?>
        	
            <h2>Erreur 404 : page non trouvée !</h2>

        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>
