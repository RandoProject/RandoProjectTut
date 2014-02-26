<!DOCTYPE html>
<html lang="fr">

	<?php 
		head("Connexion"); 
	?>
	
	<body>
    	<div id="corps">
			<?php menu(); ?>
			<?php
                include_once('Controller/c_activitees_recentes.php');
            ?>

            <section id="connexion">
                <?php if(isset($_SESSION['statut'])){
                        echo '<h1>Vous �tes d�j� connect�.</h1>';
                }
                else if(isset($_GET['page_pre']) and $_GET['page_pre'] == 'ajout_rando'){ 
                ?>
                    <div class="titre">Connectez vous</div><br/><br/>
                    <?php if(isset($_GET['page_pre'])) echo '<h1>Vous devez �tre connect� pour acc�der � cette page.</h1>'; ?><br/><br/><br/><br/>
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
                    <div class="titre">Connectez vous</div><br/><br/>
                    <?php if(isset($_GET['page_pre'])) echo '<h1>Vous devez �tre connect� pour acc�der � cette page.</h1>'; ?><br/><br/><br/><br/>
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

        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>


