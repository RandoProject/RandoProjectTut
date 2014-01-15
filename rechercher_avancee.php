<!DOCTYPE html>
<html lang="fr">

	<?php 
		include("header.php");
		head("Recherche avancée"); 
	?>
	

	<body>
		<div id="page_block">

			<?php 
				include("menu.php");
				menu(); 
			?>
			
			<?php
				include("activitees_recentes.php");
				activitees_recentes();
			?>
			
			<section>
                <form method="post" action="rechercher_avancee_post">
					<label for="Titre"> Titre </label><br/><input type="texte" name="titre"/><br/>
					<label for="Code"> Code </label><br/>
						<?php
							include("fonction_rechercher_avancee_select.php"); 
							recherche_avancee("code"); 
						?>

					<input type="submit" value="Rechercher"/>
				</form>
            </section>


			<?php 
				include("footer.php");
				footer(); 
			?>
		</div>
	</body>
</html>


