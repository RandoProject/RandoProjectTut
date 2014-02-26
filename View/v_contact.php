<!DOCTYPE html>
<html lang="fr">
		
	<?php head("Contact")?>

	<body>
        <div id="corps">
			<?php menu(); ?>

            <?php include_once('Controller/c_activitees_recentes.php'); ?>

            <section id="contact">
                <form action="index.php?page=contact" method="post">
                    <input type="text" name="name" placeholder="Nom" autocomplete="off" maxlength="30" required/><br/>
                    <input type="text" name="adresse_mail" placeholder="Email" required/><br/>
                    <input type="text" name="objet" placeholder="Objet" required/><br/>
                    <textarea name="mail_message" id="textarea_mail"  style="width: 500px; height: 100px" placeholder="Message"></textarea><br/>
                    <input type="submit" name="envoi_mail" value="Envoyer"/>      
                </form>
            </section>

       		<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>

