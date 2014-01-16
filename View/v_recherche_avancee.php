<!DOCTYPE html>
<html lang="fr">

	<?php 
		head("Recherche avancée"); 
	?>
	

	<body>
			<?php 
				menu(); 
			?>
			
			<div id="corps">
			<?php
				activitees_recentes();
			?>
				<section>
	                <form method="post" action="rechercher_avancee_post">
						<label for="Titre"> Titre </label><br/>
							<input type="texte" name="titre"/><br/>
						<label for="Code"> Code </label><br/>
							<?php
								echo '<select name = "code">';
									foreach($listeRando as $rando){
										echo '<option value="'.$rando['code'].'"> '.$rando['code'].'</option>';
									}
								echo '</select>';
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
						<label for="Difficulté"> Difficulté </label><br/>
							<select name="longueur"/><br/>
								<option value="vide" selected="selected"> </option>
								<option value="1">Difficulté 1 </option>
								<option value="2">Difficulté 2</option>
								<option value="3">Difficulté 3</option>
							</select><br/>


						<input type="submit" value="Rechercher"/>
					</form>
	            </section>
	        </div>
			<?php 
				footer(); 
			?>
	</body>
</html>


