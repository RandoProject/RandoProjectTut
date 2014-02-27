<!DOCTYPE html>
<html lang="fr">
		
	<?php head("Accueil", array(array('type' => 'css', 'href' => 'CSS', 'name' => 'Diaporama'))); ?>

	<body>
    	<div id="corps">
			<?php menu(); ?>
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
                                            <img src="Resources/Images/'.$photo[$i].'" alt="" width="1200" height="465"/>
                                            <figcaption>'.$legende[$i].'</figcaption>
                                        </figure>
                                    </a>
                            ';
                        }
                        ?>
                    </div>
                </div>
            </div>
    		
            <br/><br/><hr/><br/>
            <div id="map">
                <img width="650" src="Resources/Carte/carte.png"/>
            </div>
            
            <div class="cadre">
            	<h1>Le sentier du guêpier</h1>
                En forêt de Chaux, tout en parcourant le sentier botanique et ethnologique, vous serez initié au secret des bûcherons charbonniers qui peuplèrent jadis "la forêt qui n'en finit pas".
            </div><div class="cadre">
            	<h1>Le sentier du guêpier</h1>
                En forêt de Chaux, tout en parcourant le sentier botanique et ethnologique, vous serez initié au secret des bûcherons charbonniers qui peuplèrent jadis "la forêt qui n'en finit pas".
            </div><div class="cadre">
            	<h1>Le sentier du guêpier</h1>
                En forêt de Chaux, tout en parcourant le sentier botanique et ethnologique, vous serez initié au secret des bûcherons charbonniers qui peuplèrent jadis "la forêt qui n'en finit pas".
            </div><div class="cadre">
            	<h1>Le sentier du guêpier</h1>
                En forêt de Chaux, tout en parcourant le sentier botanique et ethnologique, vous serez initié au secret des bûcherons charbonniers qui peuplèrent jadis "la forêt qui n'en finit pas".
            </div><div class="cadre">
            	<h1>Le sentier du guêpier</h1>
                En forêt de Chaux, tout en parcourant le sentier botanique et ethnologique, vous serez initié au secret des bûcherons charbonniers qui peuplèrent jadis "la forêt qui n'en finit pas".
            </div><div class="cadre">
            	<h1>Le sentier du guêpier</h1>
                En forêt de Chaux, tout en parcourant le sentier botanique et ethnologique, vous serez initié au secret des bûcherons charbonniers qui peuplèrent jadis "la forêt qui n'en finit pas".
            </div>

        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>