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
	                <form method="post" action="index.php?page=affichage_recherche">
	                <label for="Titre"> Titre </label><br/>
							<input type="texte" name="title" value=" Ex: Randonnée à Conques" onfocus="if (this.value==' Ex: Randonnée à Conques') this.value=''"/>
							<input type="submit" value="rechercher"/><br/><br/>

	                <label for="Region"> Région </label><br/>
	                	<?php
	                		echo'<select name="s_region">';
	                			echo'<option value="not_clarify"> Non précisé </option>';
	                			foreach ($listeRegion as $l_region) {
	                				echo'<option value="'.$l_region['num_region'].'">'.$l_region['nom'].'</option>';
	                			}
	                		echo'</select>';
	                	?><br/>

						<label for="Longueur"> Longueur</label><br/>
							<select name="distance">
								<option value="non_precise" selected="selected">Non précisé</option>
									<?php
										$n=0;
										$m=5;
											for($number_of_ligne = 0; $number_of_ligne <=5; $number_of_ligne++)
											{
												echo'<option value="'.$n.'">De '.$n.' à '.$m.'Km';
												$n=$n+5;
												$m=$m+5;
											}
											echo'<option value="30">De 30 à 40Km';
											echo'<option value="40">De 40 à 50Km';
											echo'<option value="50">Plus de 50Km';
									?>
							</select><br/>

						<label for="Durée"> Durée </label><br/>
							<select name="time">
								<option value="time_non_precise" selected="selected">Non précisé</option>
									<?php
										$d=0;
										$m=1;
										$n=3;
											echo'<option value="0'.$d.':00:00"> Moins de '.$m.' heure';
											for($number_of_ligne = 0; $number_of_ligne <=1; $number_of_ligne++)
											{
												echo'<option value="0'.$m.':00:00"> De '.$m.' h à '.$n.' h';
												$m=$n;
												$n=$n+3;
											}
											echo'<option value="10:00:00"> Demi journée </option>';
											echo'<option value="24:00:00"> 1 journée</option>';
											echo'<option value="48:00:00"> 2 à 4 jours </option>';
											echo'<option value="96:00:00"> Plus de 4 jours </option>';

									?>
							</select><br/>

						<label for="Difficulté"> Difficulté </label><br/>
							<select name="difficulty">
								<option value="difficulte_non_precise" selected="selected">Non précisé</option>
								<?php
									$n=1;
									$number_of_ligne=0;
											for($number_of_ligne; $number_of_ligne <=4; $number_of_ligne++)
											{
												echo'<option value="'.$n.'">Difficulté '.$n.'</option>';
												$n=$n+1;
											}
								?>
							</select><br/>

						<label for="Point d'eau "> Point d'eau </label><br/>
							<select name="water">
								<option value="0" selected="selected">Indifférent</option>
								<option value="1"> Oui </option>
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


