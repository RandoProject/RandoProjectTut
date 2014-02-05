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
	    nowrap: true,
	    element_format : 'html'

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
		function initialize(arrayCoordinates, limitPoints){
			var sw = new google.maps.LatLng(limitPoints.south, limitPoints.west);
			var ne = new google.maps.LatLng(limitPoints.north, limitPoints.east);
			var frameMap = new google.maps.LatLngBounds(sw, ne); // Permet de définir le cadre de la carte

			var mapOptions = {
				// Arguments
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

			map.fitBounds(frameMap); // On ajouste le zoom et le centre en fonction du parcours
			ramblePath.setMap(map);
		}
		</script>

			<?php menu(); ?>
			
			<div id="corps">

                <section>
                <?php 
                if(isset($validation)){ ?>
					<h2>Randonnées ajoutée</h2>
					<p>
						Votre randonnées a bien été ajoutée.<br>
						Elle sera visible sur le site, dès que le modérateur l'aura validé.<br>
						Vous pouvez en attendant consulter les <a href="index.php?page=recherche">autres randonnées</a> ou retouner sur la <a href="index.php">page d'accueil</a>.
					</p>
				<?php }
				else{ ?>
                    <h2>Ajouter une randonnée</h2>
                    
                    <?php if(isset($error) and !empty($error)) echo '<p class="error">Impossible de créer votre randonnée, certaines informations ne sont pas valides...</p>';?>
                    <form method="post" action="index.php?page=ajout_rando" id="insert_rando">
                        <label for="name">Nom de la randonnée : </label><br>
                        <?php if(isset($error['name'])) echo '<p class="error">'.$error['name'].'</p>';?>
                        <input type="texte" id="name" name="name" autocomplete="off" required <?php if(isset($value['name'])) echo 'value="'.$value['name'].'"'; ?> ><br>
                        
                        <label for="fileMap">Votre parcours (fichier GPX) : </label>
                        <input type="file" id="fileMap" name="path" required><br>
                        <div id="container-map">
                        	<div id="map-canvas"></div><br>
                        </div>

                        <label for="description">Décrivez votre randonnée : </label><br>
                        <?php if(isset($error['description'])) echo '<p class="error">'.$error['description'].'</p>'; ?>
                        <textarea id="description" name="description"><?php if(isset($value['description'])) echo $value['description']; ?></textarea><br>

                        <label for="difficulty">Difficulté : </label>
                        <?php if(isset($error['difficulty'])) echo '<p class="error">'.$error['difficulty'].'</p>'; ?>
                        <input type="range" step="1" min="1" max="5" id="difficulty" name="difficulty" <?php  if(isset($value['difficulty'])) echo 'value="'.$value['difficulty'].'"'; else echo 'value="1"'; ?> ><br>

                        <labe>Durée :</label><br>
                        <?php 
                        if (isset($error['day']) or isset($error['hour']) or isset($error['minutes'])){
                        	echo '<ul class="error">';
                        		if(isset($error['day'])) echo '<li>'.$error['day'].'</li>';
                        		if(isset($error['hour'])) echo '<li>'.$error['hour'].'</li>';
                        		if(isset($error['minutes'])) echo '<li>'.$error['minutes'].'</li>';
                        	echo '</ul>';
                        }
                        ?>
                        <label for="day">Jours : </label>
                        <input type="text" id="day" name="day" maxlength="2"  autocomplete="off" style="width:20px;"<?php if(isset($value['day'])) echo 'value="'.$value['day'].'"'; ?> >
                        <label for="hour">heures : </label>
                        <input type="text" id="hour"name="hour" maxlength="2" autocomplete="off" style="width:20px;" <?php if(isset($value['hour'])) echo 'value="'.$value['hour'].'"'; ?> >
                        <label for="minutes">minutes</label>
                        <input type="text" id="minutes" name="minutes" axlength="2" autocomplete="off" style="width:20px;" <?php if(isset($value['minutes'])) echo 'value="'.$value['minutes'].'"'; ?> ><br>

                        <label>Votre randonnée contient-elle un point d'eau ?</label><br>
                        <?php if(isset($error['water'])) echo '<p class="error">'.$error['water'].'</p>'; ?>
                        <input type="radio" id="non" name="water" value="non" <?php if(isset($value['water']) and $value['water'] == 0) echo 'checked'; ?> ><label type="non">Non</label><br>
                        <input type="radio" id="oui" name="water" value="oui" <?php if(isset($value['water']) and $value['water'] == 1) echo 'checked'; ?> ><label type="oui">Oui</label><br><br>


                        <input type="submit" value="Ajouter"> 
                    </form>
                    <?php } // On fermet le else?>
                </section>
	        </div>

        	<?php include_once('Controller/c_footer.php'); ?>
        	<script type="text/javascript" src="JS/script_GPX.js"></script>
	</body>
</html>