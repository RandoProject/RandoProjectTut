<!DOCTYPE html>
<html lang="fr">

	<?php 
		head("Connexion",
			array(
				array('type' => 'meta', 'name' => 'viewport', 'content' => 'initial-scale=1.0, user-scalable=no'),
				array('type' => 'javascript', 'src' => 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC8ydWcT7L0z-S-g7DJf0Nh985GSMDjSf0&sensor=false&region=FR'),
				array('type' => 'javascript', 'src' => 'JS/tinyMCE/tinymce.min.js')
			));
	?>
	<script type="text/javascript">
	tinymce.init({
	    selector: "#description",
	    browser_spellcheck: true,
	    language: "fr_FR",
	    nowrap: true
	 });
	</script>

	  <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas {width: 550px;}
      #container-map {width: 550px;}
    </style>



	<body>	
		<script type="text/javascript">
		function initialize(arrayCoordinates){

				var mapOptions = {
					center: new google.maps.LatLng(arrayCoordinates[0].lat, arrayCoordinates[0].lon), // On met la carte sur le premier point du parcours
					zoom: 12
				};
				document.getElementById('map-canvas').style.height = '350px';
				document.getElementById('container-map').style.height = '350px'; // On agrandi la taille du conteneur pour qu'il puisse contenir la carte
				map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

				var ramblePathCoordinates = new Array();

				for(var i=0; i < arrayCoordinates.length; i++){
					ramblePathCoordinates.push(new google.maps.LatLng(arrayCoordinates[i].lat, arrayCoordinates[i].lon));
				}


				var ramblePath = new google.maps.Polyline({
					path: ramblePathCoordinates,
					strokeColor: '#0000FF',
					strokeOpacity: 0.8,
					strokeWeight: 4
				});

				ramblePath.setMap(map);
			}
		</script>

			<?php menu(); ?>
			
			<div id="corps">
				<?php
                    //include_once('Controller/c_activitees_recentes.php');
                ?>

                <section>
                    <h2>Ajouter une randonnée</h2>
                    
                    <?php if(isset($error) and !empty($error)) echo '<p class="error">Impossible de créer votre randonnée, certaines informations ne sont pas valides : </p>';?>
                    <form method="post" action="index.php?page=ajout_rando" id="insert_rando">
                    	<?php if(isset($error['name'])) echo '<p class="error">'.$error['name'].'</p>';?><br>
                        <label for="name">Nom de la randonnée : </label><br>
                        <input type="texte" id="name" name="name" <?php if(isset($value['name'])) echo 'value="'.$value['name'].'"'; ?> ><br>
                        
                        <label for="fileMap">Votre parcours (fichier GPX) : </label>
                        <input type="file" id="fileMap" name="path"><br>
                        <div id="container-map">
                        	<div id="map-canvas"></div><br>
                        </div>

                        <label for="description">Décrivez votre randonnée : </label><br>
                        <textarea id="description"></textarea><br>

                        <label for="difficulty">Difficulté : </label>
                        <input type="range" step="1" min="1" max="5" id="difficulty" name="difficulty"><br>

                        <labe>Durée :</label><br>
                        <input type="text" id="day" name="day"><label for="day">Jours </label>
                        <input type="text" id="hour"name="hour"><label for="hour">h </label>
                        <input type="text" id="minutes" name="minutes"><label for="minutes">min</label><br>

                        <label>Votre randonnée contient-elle un point d'eau ?</label><br>
                        <input type="radio" id="non" name="water" value="non"><label type="non">Non</label><br>
                        <input type="radio" id="oui" name="water" value="oui"><label type="oui">Oui</label><br><br>


                        <input type="submit" value="Ajouter"> 
                    </form>
                </section>
	        </div>

        	<?php include_once('Controller/c_footer.php'); ?>
        	<script type="text/javascript" src="JS/script_GPX.js"></script>
	</body>
</html>