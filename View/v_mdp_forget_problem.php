<!DOCTYPE html>
<html lang="fr">
	
	<?php head("Contact",
		array(
			array('type' => 'meta', 'http-equiv' => 'refresh', 'content' => '4; URL=index.php?page=mdp_forget')
		));
	?>
	<body>
    	<div id="corps">
			<?php menu(); ?>
        	
        		<h2>Votre pseudo ou adresse mail est incorrect ou les deux mots de passes ne correspondent pas, veuillez réessayer.</h2>

        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>
