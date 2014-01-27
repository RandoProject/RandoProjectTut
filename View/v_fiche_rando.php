<!DOCTYPE html>
<html lang="fr">

	<?php head("Recherche avancée"); ?>

	<body>
		<?php menu(); ?>
        
        <div id="corps">
            <?php include_once('Controller/c_activitees_recentes.php'); ?>
    
            <section id="fihce_rando">
                <?php echo $title; ?><br/>
                <img src="<?php echo $photo; ?>"/>
                <?php echo $description; ?>
                Longueur : <?php echo $lenght; ?><br/>
                Durée : <?php echo $duration; ?><br/>
                Difficulté : <?php echo $difficulty; ?><br/>
                Note : <?php echo $note; ?><br/>
                Point d'eau : <?php echo $water; ?><br/>
                Dénivelé : <?php echo $altitude; ?><br/>
                Equipement : <?php echo $equipment; ?><br/>
                GPX : <?php echo $path; ?><br/>
                Région : <?php echo $region; ?><br/>
                Ajouté le <?php echo $insertion_date.' à '.$insertion_hour; ?>.<br/>
                Rédigé par <?php echo $author; ?>.
            </section>
        </div>
    
        <?php include_once('Controller/c_footer.php'); ?>
	</body>
</html>