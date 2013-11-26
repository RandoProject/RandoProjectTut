<!DOCTYPE html>
<html xmls="http://www.w3.org/1999/xhtml" lang="fr">
	
	<head>
				<?php 
						include("includes.php");
						head("RandoPassion"); 
				?>
	</head>
	
	<body>
		<div id="page_block">
			<?php 
				include("Menu.php"); 
				menu();
			?>
			
			<?php
				include("activitees_recentes.php");
				activitees_recentes();
			?>
			
			<section>
				<article>
					<?php include("Article.php"); ?>
				</article>

				<aside>
					<?php include("Aside.php"); ?>
				</aside>
			</section>

			<?php 
				include("Footer.php"); 
				footer();
			?>
		</div>
	</body>
</html>