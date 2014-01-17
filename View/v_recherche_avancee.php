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
	                <label for="Region"> Région </label><br/>
	                	<?php
	                		echo'<select name="region">';
	                			foreach ($listeRegion as $l_region) {
	                				echo'<option value="'.$l_region['nom'].'"> '.$l_region['num_region'] .' '.$l_region['nom'].'</option>';
	                			}
	                		echo'</select>';
	                	?><br/>

						<label for="Titre"> Titre </label><br/>
							<input type="texte" name="title" value="Randonnée à Conques" onfocus="if (this.value=='Randonnée à Conques') this.value=''" onblur="this.value='Randonnée à Conques'"/><br/>

						<!--<label for="Code"> Code </label><br/>
							<?php
								/*echo '<select name = "code">';
									foreach($listeRando as $rando){
										echo '<option value="'.$rando['code'].'"> '.$rando['code'].'</option>';
									}
								echo '</select>';*/
							?><br/>-->

						<label for="Longueur"> Longueur</label><br/>
							<select name="distance"><br/>
								<option value="not_clarify" selected="selected">Non précisé</option>
									<?php
										$n=0;
										$m=5;
										$number_of_ligne=0;
											for($number_of_ligne; $number_of_ligne <=5; $number_of_ligne++)
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
							<select name="time"><br/>
								<option value="not_clarify" selected="selected">Non précisé</option>
									<?php
										$d=0;
										$m=1;
										$n=3;
										$number_of_ligne=0;
											echo'<option value="'.$d.'">Moins de '.$m.' heure';
											for($number_of_ligne; $number_of_ligne <=1; $number_of_ligne++)
											{
												echo'<option value="'.$m.'">De '.$m.' h à '.$n.' h';
												$m=$n;
												$n=$n+3;
											}
											echo'<option value="half_day"> Demi journée </option>';
											echo'<option value="one_day"> 1 journée</option>';
											echo'<option value="two_four_days"> 2 à 4 jours </option>';
											echo'<option value="four_days"> Plus de 4 jours </option>';

									?>
							</select><br/>

						<label for="Difficulté"> Difficulté </label><br/>
							<select name="difficulty"><br/>
								<option value="not_clarify" selected="selected">Non précisé</option>
								<?php
									$n=0;
									$number_of_ligne=0;
											for($number_of_ligne; $number_of_ligne <=4; $number_of_ligne++)
											{
												echo'<option value="'.$m.'">Difficulté '.$n;
												$n=$n+1;
											}
								?>
							</select><br/>

						<label for="Point d'eau "> Point d'eau </label><br/>
							<select name="water"><br/>
								<option value="not_matter" selected="selected">Indifférent</option>
								<option value="Yes"> Oui </option>
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


