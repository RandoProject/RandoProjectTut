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
                    <?php if(isset($_SESSION['statut'])){
                            echo '<p>Vous êtes déjà connecté.</p>';
                    }
                    else{ ?>
                    <h2>Ajouter une randonnée</h2>
                    
                    <?php if(isset($error) and !empty($error)) echo '<p class="error">Impossible de créer votre randonnée, certaines informations ne sont pas valides : </p>';?>
                    <form method="post" action="index.php?page=ajout_rando">
                    	<?php if(isset($error['name'])) echo '<p class="error">'.$error['name'].'</p>';?><br>
                        <label for="name">name de la randonnée : </label><br>
                        <input type="texte" id="name" name="name" <?php if(isset($value['name'])) echo 'value="'.$value['name'].'"'; ?> >
                        
                        <label for="path">Votre parcours (fichier GPX) : </label>
                        <input type="file" id="path" name="path"><br><br>

                        <label for="difficulty">Difficulté : </label>
                        <input type="" id="difficulty" name="difficulty">

                        <labe>Durée :</label><br>
                        <input type="text" id="day" name="day"><label for="day">Jours </label>
                        <input type="text" id="hour"name="hour"><label for="hour">h </label>
                        <input type="text" id="minutes" name="minutes"><label for="minutes">min</label>

                        <input type="submit" value="Ajouter"> 
                    </form>
                    <?php } ?>
                </section>
	        </div>

        	<?php include_once('Controller/c_footer.php'); ?>
	</body>
</html>