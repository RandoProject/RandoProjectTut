<!DOCTYPE html>
<html lang="fr">

	<?php 
		head("Connexion"); 
	?>
	
	<body>
			<?php menu(); ?>
			
			<div id="corps">
				<?php
                    //include_once('Controller/c_activitees_recentes.php');
                ?>

                <section>
                    <h2>Ajouter une randonnée</h2>
                    
                    <?php if(isset($error) and !empty($error)) echo '<p class="error">Impossible de créer votre randonnée, certaines informations ne sont pas valides : </p>';?>
                    <form method="post" action="index.php?page=ajout_rando">
                    	<?php if(isset($error['name'])) echo '<p class="error">'.$error['name'].'</p>';?><br>
                        <label for="name">Nom de la randonnée : </label><br>
                        <input type="texte" id="name" name="name" <?php if(isset($value['name'])) echo 'value="'.$value['name'].'"'; ?> ><br>
                        
                        <label for="path">Votre parcours (fichier GPX) : </label>
                        <input type="file" id="path" name="path"><br><br>

                        <label for="description">Décrivez votre randonnée : </label><br>
                        <textarea id="description"></textarea><br>

                        <label for="difficulty">Difficulté : </label>
                        <input type="range" step="1" min="1" max="5" id="difficulty" name="difficulty"><br>

                        <labe>Durée :</label><br>
                        <input type="text" id="day" name="day"><label for="day">Jours </label>
                        <input type="text" id="hour"name="hour"><label for="hour">h </label>
                        <input type="text" id="minutes" name="minutes"><label for="minutes">min</label><br>

                        <label>Votre randonnée contient-elle un point d'eau ?</label><br>
                        <input type="radio" id="non" name="water" value="non"><label type="non">Non</label><br>
                        <input type="radio" id="oui" name="water" value="oui"><label type="oui">Oui</label><br><br>


                        <input type="submit" value="Ajouter"> 
                    </form>
                </section>
	        </div>

        	<?php include_once('Controller/c_footer.php'); ?>
	</body>
</html>