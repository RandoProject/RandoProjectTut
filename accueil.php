<!DOCTYPE html>
<html xmls="http://www.w3.org/1999/xhtml" lang="fr">
	
	<head>
			<?php head("RandoPassion"); ?>
	</head>
	
	<body>
		<div id="page_block">
			<?php menu(); ?>
			
			<?php
				include("activitees_recentes.php");
				activitees_recentes();
			?>
			
			<section>
				<article>
					<?php include("article.php"); ?>
				</article>

				<aside>
					<?php include("aside.php"); ?>
				</aside>
			</section>

			<?php 
				footer();
			?>
		</div>
	</body>
</html>