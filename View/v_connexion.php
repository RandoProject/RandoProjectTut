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
                    <h2>Connectez vous</h2>
                    <?php if(isset($error) and !empty($error)) echo '<p class="error">Imposible de vous connecter : </p>';?>
                    <form method="post" action="index.php?page=connexion<?php echo isset($_GET['page_pre'])? 'parge_pre'.$_GET['page_pre'] : ''; ?>">
                        <label for="pseudo">Identifiant :</label><br>
                        <input type="texte" id="pseudo" name="pseudo" <?php if(isset($value['pseudo'])) echo 'value="'.$value['pseudo'].'"'; ?> >
                        <?php if(isset($error['pseudo'])) echo '<p class="error">'.$error['pseudo'].'</p>';?><br>

                        <label for="pass">Mot de passe : </label><br>
                        <input type="password" id="pass" name="pass"/>
                        <?php if(isset($error['pass'])) echo '<p class="error">'.$error['pass'].'</p>'; ?><br><br>

                        <input type="submit" value="connexion">
                    </form>
                    <?php } ?>
                </section>
	        </div>

        	<?php include_once('Controller/c_footer.php'); ?>
	</body>
</html>


