<!DOCTYPE html>
<html xmls="http://www.w3.org/1999/xhtml" lang="fr">
		
	<?php head("RandoPassion"); ?>
	

	<body>
		<div id="page_block">
			<?php menu(); ?>
			
			<?php
				include("activitees_recentes.php");
				activitees_recentes();
			?>
			
			<section>
				
			</section>

			<?php 
				footer();
			?>
		</div>
	</body>
</html>