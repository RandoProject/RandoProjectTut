<!DOCTYPE html>
<html lang="fr">
		
	<?php head("Mot de passe oublié")?>

	<body>
        <div id="corps">
			<?php menu(); ?>

            <?php include_once('Controller/c_activitees_recentes.php'); ?>

            <section id="mdp_forget">
                <div class="titre">Récupération du mot de passe</div><br/><br/>
                    <form action="index.php?page=mdp_forget" method="post" id="form_contact">
                            <img src="Resources/Images/contacts.png"/>
                                <input type="text" name="pseudo" placeholder="Pseudo" autocomplete="off" maxlength="30" required/><br/>
                            <img src="Resources/Images/mail.png"/>
                                <input type="email" name="adresse_mail" placeholder="Email" autocomplete="off" required/><br/>
                        <?php if(isset($mail_verif)) echo '<p> Votre adresse email n\'est pas valide </p>';?>
                        <input type="submit" name="envoi_mail" value="Envoyer"/>      
                    </form>
            </section>

       		<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>

