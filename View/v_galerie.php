<!DOCTYPE html>
<html lang="fr">

	<?php head("Galerie"); ?>

	<body>
        <div id="corps">
			<?php menu(); ?>
            <?php include_once('Controller/c_activitees_recentes.php'); ?>
    
            <section id="galerie">
                <div class="titre">Galerie</div>               
            <?php
                echo '<ul>';
                    foreach ($liste_galerie as $rando) {
                        echo '<li>';
                            echo '<a href="index.php?page=visualisation_galerie&num_galerie='.$rando['num_galerie'].'"><img src="Resources/Galerie/'.$rando['nom_galerie'].'/'.$rando['nom_photo'].'" id="img_couverture"/></a><br>';
                            echo '<center><span id="titre_galerie">'.$rando['titre'].'</span></center>';
                        echo '</li>';
                    }
                echo '<ul>';
            ?>
                
            </section>
    
        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>