<!DOCTYPE html>
<html lang="fr">
	
	<?php head("Contact",
		array(
			array('type' => 'meta', 'http-equiv' => 'refresh', 'content' => '5; URL=index.php')
		));
	?>
	<body>
    	<div id="corps">
			<?php menu(); ?>
        	
        		<h2>Votre nouveau mot de passe a �t� modifi� et vous a �t� envoy� par mail, vous pouvez d�s maintenant vous connecter avec !</h2>

        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>
