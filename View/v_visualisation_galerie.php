<!DOCTYPE html>
<html lang="fr">

	<?php 
        head("Visualisation_galerie", array(	array('type' => 'css', 'href' => 'CSS', 'name' => 'Galerie'),
												array('type' => 'javascript', 'src' => 'JS/galerie/jquery-latest.pack.js'),
												array('type' => 'javascript', 'src' => 'JS/galerie/jqGalViewII.pack.js')
			 )); 
    ?>

    <script type="text/javascript">
		$(document).ready(function(){
			$('ul#galerie').jqGalViewII();
		});
    </script>
    
	<body>
        <div id="corps">
			<?php menu(); ?>
            <?php include_once('Controller/c_activitees_recentes.php'); ?>
    
            <section id="visualisation_galerie">  
                <div class="titre"><?php echo $titre; ?></div>             
            <?php
        			$i=0;
                        echo '	<ul id="galerie" title="My Gallery">';
        				echo $i; $i++;
                            foreach ($liste_photos as $photos) {
                                echo '	<li>
                                    		<a href="Resources/Galerie/'.$photos['nom_galerie'].'/'.$photos['nom_photo'].'">
        										<img src="Resources/Galerie/'.$photos['nom_galerie'].'/'.$photos['nom_photo'].'" id="img_couverture" alt="'.$photos['titre'].'"/>
        									</a>
                                		</li>
        						';
                            }
                        echo '	</ul>';
                if($nb_photo['nb_photo'] <= 5){
            ?>
            
                <style>
                    section#visualisation_galerie .gvIIContainer .gvIIHolder{
                        position: ;
                        max-height: 278px;
                        width: 450px;
                        overflow: none;
                        border: none;
                        box-shadow: none;
                        margin-left: 250px;
                        text-align: center;
                    }
                    section#visualisation_galerie .gvIIContainer .gvIIHolder .gvIIItem{
                        height: 55px;
                        width: 72px;
                        padding: 4px;
                        border: 1px solid #585858;
                        margin: 2px;
                        position: ;
                        overflow: hidden;
                        text-align: center;
                    }
                </style>

            <?php
                }
            ?>

                
            </section>
    
        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>