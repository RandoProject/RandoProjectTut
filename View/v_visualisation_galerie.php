<!DOCTYPE html>
<html lang="fr">

	<?php 
        head("Visualisation_galerie",
            array('type' => 'javascript', 'src' => 'http://code.jquery.com/jquery-latest.pack.js'),
            array('type' => 'javascript', 'src' => 'JS/galerie/jqGalViewII.pack.js')

        )); 
    ?>

    <script type="text/javascript">
        $(document).ready(function(){
                $('ul').jqGalViewII();
        });
    </script>
        
	<body>
        <div id="corps">
			<?php menu(); ?>
            <?php include_once('Controller/c_activitees_recentes.php'); ?>
    
            <section id="visualisation_galerie">               
            <?php
                echo '<ul title="My Gallery">';
                    foreach ($liste_photos as $photos) {
                        echo '<li>';
                            echo '<img src="Resources/Galerie/'.$photos['nom_galerie'].'/'.$photos['nom_photo'].'" id="img_couverture"/>';
                        echo '</li>';
                    }
                echo '<ul>';
                echo 'bonjour';
            ?>
                
            </section>
    
        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>