<!DOCTYPE html>
<html lang="fr">
	
	<?php 
		head("Commentaire",
			array(
				array('type' => 'meta', 'http-equiv' => 'refresh', 'content' => '3; URL=index.php?page=fiche_rando&code='.$_GET['code'])
	
		));
	?>
	<body>
    	<div id="corps">
			<?php menu(); ?>
        	
            <h2>Merci pour votre commentaire !</h2>

        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>
