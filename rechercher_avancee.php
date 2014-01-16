<!DOCTYPE html>
<html lang="fr">

	<?php 
		include("header.php");
		head("Recherche avanc�e"); 
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
					<label for="Titre"> Titre </label><br/>
						<input type="texte" name="titre"/><br/>
					<label for="Code"> Code </label><br/>
						<?php
							include("fonction_rechercher_avancee_select.php");	
							recherche_avancee("Code","code","rando","req0"); 
						?><br/>
					<label for="Longueur"> Longueur</label><br/>
						<select name="longueur"/><br/>
							<option value="vide" selected="selected"> </option>
							<option value="5"> 5 Km </option>
							<option value="10"> 10 Km </option>
							<option value="15"> 15 Km </option>
							<option value="20"> 20 Km </option>
							<option value="25"> 25 Km </option>
							<option value="30"> 30 Km </option>
							<option value="35"> 35 Km </option>
						</select><br/>
					<label for="Difficult�"> Difficult� </label><br/>
						<select name="longueur"/><br/>
							<option value="vide" selected="selected"> </option>
							<option value="1">Difficult� 1 </option>
							<option value="2">Difficult� 2</option>
							<option value="3">Difficult� 3</option>
						</select><br/>


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


