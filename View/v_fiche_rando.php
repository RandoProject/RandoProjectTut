<!DOCTYPE html>
<html lang="fr">

	<?php head("Recherche avanc�e"); ?>

	<body>
		<?php menu(); ?>
        
        <div id="corps">
            <?php include_once('Controller/c_activitees_recentes.php'); ?>
    
            <section id="fihce_rando">
                <?php echo $title; ?><br/>
                <img src="<?php echo $photo; ?>"/>
                <?php echo $description; ?>
                Longueur : <?php echo $lenght; ?><br/>
                Dur�e : <?php echo $duration; ?><br/>
                Difficult� : <?php echo $difficulty; ?><br/>
                Note : <?php echo $note; ?><br/>
                Point d'eau : <?php echo $water; ?><br/>
                D�nivel� : <?php echo $altitude; ?><br/>
                Equipement : <?php echo $equipment; ?><br/>
                GPX : <?php echo $path; ?><br/>
                D�partement : <?php echo $department; ?><br/>
                Ajout� le <?php echo $insertion_date.' � '.$insertion_hour; ?>.<br/>
                R�dig� par <?php echo $author; ?>.<br/>
                
                <?php 
					foreach($listeImage as $image) {
						echo '<img src="Resources/Galerie/'.$galery.'/'.$image['nom'].'" width="420" height="310"/>';
					}
				?>
            </section>
        </div>
    
        <?php include_once('Controller/c_footer.php'); ?>
	</body>
</html>