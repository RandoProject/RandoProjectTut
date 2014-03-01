<!DOCTYPE html>
<?php
	include_once("View/header.php");
	include_once("View/menu.php");
?>
<html lang="fr">
	
	<?php head("Erreur 404");?>
	<body>
    	<div id="corps">
			<?php menu(); ?>
        	
            <h2>Erreur 404 : page non trouvée !</h2>

        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>
