<!DOCTYPE html>
<html lang="fr">

	<?php 
		head("Recherche avanc�e"); 
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
	                <label for="Region"> R�gion </label><br/>
	                	<?php
	                		echo'<select name="region">';
	                			foreach ($listeRegion as $l_region) {
	                				echo'<option value="'.$l_region['nom'].'"> '.$l_region['num_region'] .' '.$l_region['nom'].'</option>';
	                			}
	                		echo'</select>';
	                	?><br/>

						<label for="Titre"> Titre </label><br/>
							<input type="texte" name="title" value="Randonn�e � Conques" onfocus="if (this.value=='Randonn�e � Conques') this.value=''" onblur="this.value='Randonn�e � Conques'"/><br/>

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
								<option value="not_clarify" selected="selected">Non pr�cis�</option>
									<?php
										$n=0;
										$m=5;
										$number_of_ligne=0;
											for($number_of_ligne; $number_of_ligne <=5; $number_of_ligne++)
											{
												echo'<option value="'.$n.'">De '.$n.' � '.$m.'Km';
												$n=$n+5;
												$m=$m+5;
											}
											echo'<option value="30">De 30 � 40Km';
											echo'<option value="40">De 40 � 50Km';
											echo'<option value="50">Plus de 50Km';
									?>
							</select><br/>

						<label for="Dur�e"> Dur�e </label><br/>
							<select name="time"><br/>
								<option value="not_clarify" selected="selected">Non pr�cis�</option>
									<?php
										$d=0;
										$m=1;
										$n=3;
										$number_of_ligne=0;
											echo'<option value="'.$d.'">Moins de '.$m.' heure';
											for($number_of_ligne; $number_of_ligne <=1; $number_of_ligne++)
											{
												echo'<option value="'.$m.'">De '.$m.' h � '.$n.' h';
												$m=$n;
												$n=$n+3;
											}
											echo'<option value="half_day"> Demi journ�e </option>';
											echo'<option value="one_day"> 1 journ�e</option>';
											echo'<option value="two_four_days"> 2 � 4 jours </option>';
											echo'<option value="four_days"> Plus de 4 jours </option>';

									?>
							</select><br/>

						<label for="Difficult�"> Difficult� </label><br/>
							<select name="difficulty"><br/>
								<option value="not_clarify" selected="selected">Non pr�cis�</option>
								<?php
									$n=0;
									$number_of_ligne=0;
											for($number_of_ligne; $number_of_ligne <=4; $number_of_ligne++)
											{
												echo'<option value="'.$m.'">Difficult� '.$n;
												$n=$n+1;
											}
								?>
							</select><br/>

						<label for="Point d'eau "> Point d'eau </label><br/>
							<select name="water"><br/>
								<option value="not_matter" selected="selected">Indiff�rent</option>
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


