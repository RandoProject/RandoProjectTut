<!DOCTYPE html>
<html lang="fr">
		
	<?php head("Accueil"); ?>

	<body>
        
    		<?php menu(); ?>
            
            <div id="corps">
            	<div id="presentation">
                    <div id="slideshow">
                        <div class="container">
                            <div class="slider">
                                <?php
                                $photo = array(	"galerie_1.jpg",
                                                "galerie_2.jpg",
                                                "galerie_3.jpg",
                                                "galerie_4.jpg");
                                                
                                $legende = array(	"slide 1",
                                                    "slide 2",
                                                    "slide 3",
                                                    "slide 4");
                                        
                                for($i = 0; $i < count($photo); $i++){
                                    echo '	<a href="#">
                                                <figure>
                                                    <img src="Resources/Images/'.$photo[$i].'" alt="" width="640" height="310"/>
                                                    <figcaption>'.$legende[$i].'</figcaption>
                                                </figure>
                                            </a>
                                    ';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                
				<div id="map"><img style="width:100%; height:100%;" src="Resources/Images/map.png"></div>
			</div>

            <?php 
                footer();
            ?>
	</body>
</html>