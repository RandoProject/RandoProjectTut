<!DOCTYPE html>
<html lang="fr">
		
	<?php head("Contact")?>

	<body>
        <div id="corps">
			<?php menu(); ?>

            <?php include_once('Controller/c_activitees_recentes.php'); ?>

            <section id="contact">
                <div class="titre">Nous contacter</div><br/><br/>
                    <form action="index.php?page=contact" method="post" id="form_contact">
                        <input type="text" id="nom" name="nom" placeholder="Nom" autocomplete="off" maxlength="30" required/><br/>
                        <input type="email" id="mail" name="adresse_mail" placeholder="Email" autocomplete="off" required/><br/>
                        <input type="text" id="objet" name="objet" placeholder="Objet" autocomplete="off" required/><br/>
                        <textarea id="message" name="message" id="textarea_mail"  style="width: 700px; height: 200px" placeholder="Message" autocomplete="off" required></textarea><br/>
                        <?php if(isset($mail_verif)) echo '<p> Votre adresse email n\'est pas valide </p>';?>
                        <input type="submit" name="envoi_mail" value="Envoyer"/>      
                    </form>
            </section>

       		<?php include_once('Controller/c_footer.php'); ?>


            <style>
                input[type="text"]:hover,
                input[type="text"]:focus,
                input[type="password"]:hover,
                input[type="password"]:focus,
                input[type="file"]:hover,
                input[type="file"]:focus,
                input[type="range"]:hover,
                input[type="range"]:focus,
                input[type="email"]:hover,
                input[type="email"]:focus,
                textarea:hover,
                textarea:focus,
                select:hover,
                select:focus{
                    border-color: rgba(82, 168, 236, 0.8);
                    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 
                                0 0 8px rgba(82, 168, 236, 0.6);
                }
                section#contact form#form_contact{
                    text-align: center;
                }
                section#contact form input#mail, input#nom, input#objet{
                    margin-left: -37.5%;
                    width: 350px;
                }
            </style>
        </div>
	</body>
</html>

