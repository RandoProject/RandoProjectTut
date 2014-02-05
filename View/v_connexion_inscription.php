<!DOCTYPE html>
<html lang="fr">

	<?php 
		head("Connexion"); 
	?>
	
	<body>
			<?php menu(); ?>
			
			<div id="corps">
				<?php
                    include_once('Controller/c_activitees_recentes.php');
                ?>

                <section id="connexion">
                    <?php if(isset($_SESSION['statut'])){
                            echo '<h1>Vous �tes d�j� connect�.</h1>';
                    }
                    else{ ?>
                        <h1>Connectez vous</h1>
                        <?php if(isset($_GET['page_pre'])) echo '<p>Vous devez �tre connect� pour acc�der � cette page.</p>'; ?>
                        <form method="post" action="index.php?page=connexion<?php echo isset($_GET['page_pre'])? '&page_pre='.$_GET['page_pre'] : ''; ?>">
                            <label for="pseudo">Identifiant :</label><br/>
                            <input type="text" name="pseudo" <?php if(isset($value['pseudo'])) echo 'value="'.$value['pseudo'].'"'; ?> maxlength="30" required/>
                            <?php if(isset($error['pseudo'])) echo '<p class="error">'.$error['pseudo'].'</p>'; else echo '<br/><br/>'; ?><br/>
                            
                            <label for="pass">Mot de passe : </label><br/>
                            <input type="password" name="pass" maxlength="30" required/>
                            <?php if(isset($error['pass'])) echo '<p class="error">'.$error['pass'].'</p>'; else echo '<br/><br/>'; ?><br/>
                            
                            <input type="submit" value="connexion">
                        </form>
                    <?php } ?>

                        <div id="separation"></div>

                        <h1><a href="index.php?page=inscription">Inscrivez-vous ici !</a></h1>
                        
                </section>
	        </div>

        	<?php include_once('Controller/c_footer.php'); ?>
	</body>
</html>

