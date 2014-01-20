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
		                <form method="post" action="index.php?page=recherche">
		                <label for="title"> Titre </label><br/>
								<input type="texte" name="title" id="title" value=" Ex: Randonn�e � Conques" onfocus="if (this.value==' Ex: Randonn�e � Conques') this.value=''"/>
								<input type="submit" value="rechercher" name="envoie_titre"/><br/><br/>

		                <label for="s_region"> R�gion </label><br/>
		                	<?php
		                		echo'<select id="s_region" name="s_region">';
		                			echo'<option value="not_clarify"> Non pr�cis� </option>';
		                			foreach ($listeRegion as $l_region) {
		                				echo'<option value="'.$l_region['num_region'].'">'.$l_region['nom'].'</option>';
		                			}
		                		echo'</select>';
		                	?><br/>

							<label for="distance"> Longueur</label><br/>
								<select id="distance" name="distance">
									<option value="non_precise" selected="selected">Non pr�cis�</option>
										<?php
											$n=0;
											$m=5;
												for($number_of_ligne = 0; $number_of_ligne <=5; $number_of_ligne++)
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

							<label for="time"> Dur�e </label><br/>
								<select id="time" name="time">
									<option value="time_non_precise" selected="selected">Non pr�cis�</option>
										<?php
											$d=0;
											$m=1;
											$n=3;
												echo'<option value="0'.$d.':00:00"> Moins de '.$m.' heure';
												for($number_of_ligne = 0; $number_of_ligne <=1; $number_of_ligne++)
												{
													echo'<option value="0'.$m.':00:00"> De '.$m.' h � '.$n.' h';
													$m=$n;
													$n=$n+3;
												}
												echo'<option value="10:00:00"> Demi journ�e </option>';
												echo'<option value="24:00:00"> 1 journ�e</option>';
												echo'<option value="48:00:00"> 2 � 4 jours </option>';
												echo'<option value="96:00:00"> Plus de 4 jours </option>';

										?>
								</select><br/>

							<label for="difficulty"> Difficult� </label><br/>
								<select id="difficulty" name="difficulty">
									<option value="difficulte_non_precise" selected="selected">Non pr�cis�</option>
									<?php
										$n=1;
										$number_of_ligne=0;
												for($number_of_ligne; $number_of_ligne <=4; $number_of_ligne++)
												{
													echo'<option value="'.$n.'">Difficult� '.$n.'</option>';
													$n=$n+1;
												}
									?>
								</select><br/>

							<label for="water"> Point d'eau </label><br/>
								<select id="water" name="water">
									<option value="0" selected="selected">Indiff�rent</option>
									<option value="1"> Oui </option>
								</select><br/>
							<input type="submit" value="Rechercher" name="envoie_formulaire"/>
						</form>
		            

				            <!--Zone pour afficher la recherche-->
				        <?php
				        	if(isset($_POST['envoie_formulaire']))
				        	{
				        		if(isset($affichage_rando_complet) and !empty($affichage_rando_complet))
			                	{
			                		foreach($affichage_rando_complet as $rando){
				                			echo '<strong> Titre : </strong>'.$rando['titre'].'<br/>';
				                			echo '<strong> Longueur : </strong>'.$rando['longueur'].'<br/>';
				                			echo '<strong> Dur�e : </strong>'.$rando['dur�e'].'<br/>';
				                			echo '<strong> Point d\' eau : </strong>'.$rando['point_eau'].'<br/>';
				                			echo '<strong> Difficult� : </strong>'.$rando['difficult�'].'<br/>';
			                		}
			                	}
			                	else
			                	{
			                		echo 'Aucune randonn�e trouv�e';
			                	}
				        	}
				            
				            if(isset($_POST['envoie_titre']))
				            {
				            	if(isset($affichage_titre_rando) and !empty($affichage_titre_rando))
				            	{
				            		foreach($affichage_titre_rando as $rando)
				            		{
				                			echo '<strong> Titre : </strong>'.$rando['titre'].'<br/>';
				                			echo '<strong> Longueur : </strong>'.$rando['longueur'].'<br/>';
				                			echo '<strong> Dur�e : </strong>'.$rando['dur�e'].'<br/>';
				                			echo '<strong> Point d\' eau : </strong>'.$rando['point_eau'].'<br/>';
				                			echo '<strong> Difficult� : </strong>'.$rando['difficult�'].'<br/>';
					                }
	                			}
	                			else
	                			{
			                		echo 'Aucune randonn�e trouv�e';
	                			}
				            }
			            ?>
	            	</section>
	        </div>

			<?php 
				footer(); 
			?>
	</body>
</html>


