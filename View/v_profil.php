<!DOCTYPE html>
<html lang="fr">

	<?php head("Recherche avanc�e"); ?>

	<body>
		<?php menu(); ?>
        
        <div id="corps">
            <?php include_once('Controller/c_activitees_recentes.php'); ?>
    
            <section>
            	<?php echo '<img src="'.$path_photo.'"/>'; ?><br/>
				<?php echo $pseudo; ?><br/>
                Nom : <?php echo $name; ?><br/>
                Pr�nom : <?php echo $firstname; ?><br/>
                N�(e) le <?php echo $birth; ?><br/>
                Adresse : <?php echo $adress; ?><br/>
                E-mail : <?php echo $mail; ?><br/>
                D�scription : <?php echo $description; ?><br/>
            </section>
        </div>
    
        <?php include_once('Controller/c_footer.php'); ?>
	</body>
</html>