<!DOCTYPE html>
<html lang="fr">
		
	<?php head("Contact")?>

	<body>
        <div id="corps">
			<?php menu(); ?>

            <?php include_once('Controller/c_activitees_recentes.php'); ?>

            <section id="contact">
                <div id="wrap">
                    <div id='form_wrap'>
                       <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="form_contact">
                            <p id="text_lettre">Bonjour,</p>
                            <label for="email" id="label_contact">Votre message : </label>
                            <textarea  name="message" value="Votre Message" id="text_area_contact" ></textarea>
                            <p id="text_lettre">Informations,</p>   
                            <label for="name" id="label_contact">Nom/Prenom: </label>
                            <input type="text" name="nom" value="" class="input_contact" />
                            <label for="email" id="label_contact">Email: </label>
                            <input type="text" name="email" value="" class="input_contact" />
                            <label for="objet" id="label_contact">Objet: </label>
                            <input type="text" name="objet" value="" class="input_contact" />
                            <input type="submit" name ="valider" value="Envoyer" class="input_contact"/>
                        </form>
                    </div>
                </div>

            </section>

       		<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>

