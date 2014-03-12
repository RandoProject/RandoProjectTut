<!DOCTYPE html>
<html lang="fr">
	
	<?php head("Contact",
		array(
			array('type' => 'meta', 'http-equiv' => 'refresh', 'content' => '4; URL=index.php?page=contact')
		));
	?>
	<body>
    	<div id="corps">
			<?php menu(); ?>
        	
        		<h2>Oups votre mail n'a pas pu être envoyé...</h2>

        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>
