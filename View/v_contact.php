<!DOCTYPE html>
<html lang="fr">
		
	<?php head("Contact")?>

	<body>
        <div id="corps">
			<?php menu(); ?>

            <?php include_once('Controller/c_activitees_recentes.php'); ?>

            <section id="contact">
                <form action="index.php?page=contact" method="post">
                    <input type="text" name="nom" placeholder="Nom" autocomplete="off" maxlength="30" required/><br/>
                    <input type="email" name="adresse_mail" placeholder="Email" required/><br/>
                    <input type="text" name="objet" placeholder="Objet" required/><br/>
                    <textarea name="message" id="textarea_mail"  style="width: 700px; height: 200px" placeholder="Message" required></textarea><br/>
                    <?php if(isset($mail_verif)) echo '<p> Votre adresse email n\'est pas valide </p>';?>
                    <input type="submit" name="envoi_mail" value="Envoyer"/>      
                </form>
            </section>

       		<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>

