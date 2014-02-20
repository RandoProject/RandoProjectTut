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
                            echo '<h1>Vous êtes déjà connecté.</h1>';
                    }
                    else if(isset($_GET['page_pre']) and $_GET['page_pre'] == 'ajout_rando'){ 
                    ?>
                        <h1 id="connexion">Connectez vous</h1>
                        <?php if(isset($_GET['page_pre'])) echo '<p class="connexion">Vous devez être connecté pour accéder à cette page.</p>'; ?>
                        <form id="form_connexion" method="post" action="index.php?page=connexion<?php echo isset($_GET['page_pre'])? '&page_pre='.$_GET['page_pre'] : ''; ?>">
                            <label for="pseudo">Identifiant :</label><br/>
                            <input type="text" name="pseudo" <?php if(isset($value['pseudo'])) echo 'value="'.$value['pseudo'].'"'; ?> maxlength="30" required/>
                            <?php if(isset($error['pseudo'])) echo '<p class="error">'.$error['pseudo'].'</p>'; else echo '<br/><br/>'; ?><br/>
                            
                            <label for="pass">Mot de passe : </label><br/>
                            <input type="password" name="pass" maxlength="30" required/>
                            <?php if(isset($error['pass'])) echo '<p class="error">'.$error['pass'].'</p>'; else echo '<br/><br/>'; ?><br/>
                            
                            <input type="submit" value="connexion">
                        </form>
                    <?php
                                echo '<div id="div_lien_inscription">';
                                    echo'<a id="lien_inscription" href="index.php?page=inscription">Inscrivez-vous</a>';
                                echo '</div>';
                    }
                    else{
                    ?>
                        <h1>Connectez vous</h1>
                        <?php if(isset($_GET['page_pre'])) echo '<p class="connexion">Vous devez être connecté pour accéder à cette page.</p>'; ?>
                        <form method="post" action="index.php?page=connexion<?php echo isset($_GET['page_pre'])? '&page_pre='.$_GET['page_pre'] : ''; ?>">
                            <label for="pseudo">Identifiant :</label><br/>
                            <input type="text" name="pseudo" <?php if(isset($value['pseudo'])) echo 'value="'.$value['pseudo'].'"'; ?> maxlength="30" required/>
                            <?php if(isset($error['pseudo'])) echo '<p class="error">'.$error['pseudo'].'</p>'; else echo '<br/><br/>'; ?><br/>
                            
                            <label for="pass">Mot de passe : </label><br/>
                            <input type="password" name="pass" maxlength="30" required/>
                            <?php if(isset($error['pass'])) echo '<p class="error">'.$error['pass'].'</p>'; else echo '<br/><br/>'; ?><br/>
                            
                            <input type="submit" value="connexion">
                        </form>
                    <?php
                    }
                    ?>
                </section>
	        </div>

        	<?php include_once('Controller/c_footer.php'); ?>
	</body>
</html>


