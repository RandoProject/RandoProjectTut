<!DOCTYPE html>
<html lang="fr">

	<?php 
		head("Ajout rando",
			array(
				array('type' => 'meta', 'name' => 'viewport', 'content' => 'initial-scale=1.0, user-scalable=no'),
				array('type' => 'javascript', 'src' => 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC8ydWcT7L0z-S-g7DJf0Nh985GSMDjSf0&sensor=false&region=FR'),
                array('type' => 'javascript', 'src' => 'https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js'),
				array('type' => 'javascript', 'src' => 'JS/tinyMCE/tinymce.min.js'),
                array('type' => 'javascript', 'src' => 'JS/upload_img.js'),
                array('type' => 'javascript', 'src' => 'JS/stars.js')
			));
	?>
    <script type="text/javascript">
		tinymce.init({
			selector: "#description",
			browser_spellcheck: true,
			language: "fr_FR",
			element_format : 'html',
			nowrap: true,
			menubar: false,
			statusbar: false,
			nonbreaking_force_tab: true, // Peremet à l'appuie sur <tab> d'avoir une tabulation et ne pas changer le focus (il faut le plugin)
			plugins: 'emoticons link textcolor image nonbreaking',
			toolbar1: 'undo redo | cut copy paste | bold italic underline | forecolor | fontsizeselect  | alignleft aligncenter alignright alignjustify | bullist numlist | image link | emoticons',
			height: 230,
		});
	</script>

	<body>
		<script type="text/javascript">
			function initialize(arrayCoordinates, limitPoints){
				var sw = new google.maps.LatLng(limitPoints.south, limitPoints.west);
				var ne = new google.maps.LatLng(limitPoints.north, limitPoints.east);
				var frameMap = new google.maps.LatLngBounds(sw, ne); // Permet de définir le cadre de la carte
	
				var mapOptions = {
					mapTypeId: google.maps.MapTypeId.TERRAIN
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
		
        <div id="corps">
			<?php menu(); ?>
			
            <section id="ajoutrando">
                <div class="titre">Ajouter une randonnée</div>
                <?php if(isset($error) and !empty($error)) echo '<p class="error">Impossible de créer votre randonnée, certaines informations ne sont pas valides...</p>';?>
                <form method="post" action="index.php?page=ajout_rando" id="insert_rando" enctype="multipart/form-data">
                    <label for="name">Nom de la randonnée : </label><br/>
                    <?php if(isset($error['name'])) echo '<p class="error">'.$error['name'].'</p>';?>
                    <input type="text" id="name" name="name" size="71" autocomplete="off" maxlength="150" <?php if(isset($value['name'])) echo 'value="'.$value['name'].'"'; ?> required/><br/><br/>
                    <?php if(isset($error['fileMap'])) echo '<p class="error">'.$error['fileMap'].'</p>'; ?>
                    <label for="fileMap">Votre parcours (fichier GPX) : </label>
                    <div id="chooseFile">
                        <input type="button" id="buttonChooseGpx" value="Choisissez un fichier" />
                        <p id="pathFile"></p>
                        <input type="file" id="fileMap" name="fileMap"><br/><br/>
                    </div>
                    <div id="container-map">
                        <div id="map-canvas"></div><br/>
                    </div>

                    <?php if(isset($error['length'])) echo '<p class="error">'.$error['length'].'</p>';?>
                    <label for="length">Longueur (en mètre) : </label>
                    <input type="text" maxlength="7" size="7" id="length" name="length" pattern="\d+" autocomplete="off" <?php if(isset($value['length'])) echo 'value="'.$value['length'].'"'; ?>/><br/><br/>

                    <?php if(isset($error['deniv'])) echo '<p class="error">'.$error['deniv'].'</p>';?>
                    <label for="deniv">Dénivelé positif (en mètre) : </label>
                    <input type="text" maxlength="6" size="6" id="deniv" name="deniv" pattern="\d+" autocomplete="off" <?php if(isset($value['deniv'])) echo 'value="'.$value['deniv'].'"'; ?>/><br/><br/>

                    <labe>Durée :</label><br/>
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
                    <input type="text" id="day" name="day" maxlength="2"  autocomplete="off" pattern="\d+" style="width:20px;"<?php if(isset($value['day'])) echo 'value="'.$value['day'].'"'; ?> >
                    <label for="hour">heures : </label>
                    <input type="text" id="hour"name="hour" maxlength="2" autocomplete="off" pattern="\d+" style="width:20px;" <?php if(isset($value['hour'])) echo 'value="'.$value['hour'].'"'; ?> >
                    <label for="minutes">minutes</label>
                    <input type="text" id="minutes" name="minutes" axlength="2" autocomplete="off" pattern="\d+" style="width:20px;" <?php if(isset($value['minutes'])) echo 'value="'.$value['minutes'].'"'; ?> ><br/><br/>

                    <?php if(isset($error['difficulty'])) echo '<p class="error">'.$error['difficulty'].'</p>'; ?>
                    <p> Difficulté : </p>
                    <ul name="notes" class="notes">
                                    <li>
                                        <label class="etoile_vide" id="et5" for="note5" title="Difficulté: 5 sur 5"></label>
                                        <input type="radio" name="difficulty" id="note5" value="5" onchange="document.getElementById('difficulte').value='Expert';"/>
                                    </li>
                                    <li>
                                        <label class="etoile_vide" id="et4" for="note4" title="Difficulté : 4 sur 5"></label>
                                        <input type="radio" name="difficulty" id="note4" value="4" onchange="document.getElementById('difficulte').value='Confirmé';"/>
                                    </li>
                                    <li>
                                        <label class="etoile_vide" id="et3" for="note3" title="Difficulté : 3 sur 5"></label>
                                        <input type="radio" name="difficulty" id="note3" value="3" onchange="document.getElementById('difficulte').value='Difficile';"/>
                                    </li>
                                    <li>
                                        <label class="etoile_vide" id="et2" for="note2" title="Difficulté : 2 sur 5"></label>
                                        <input type="radio" name="difficulty" id="note2" value="2" onchange="document.getElementById('difficulte').value='Moyen';"/>
                                    </li>
                                    <li>
                                        <label class="etoile_vide" id="et1" for="note1" title="Difficulté : 1 sur 5"></label>
                                        <input type="radio" name="difficulty" id="note1" value="1" onchange="document.getElementById('difficulte').value='Facile';"/>
                                    </li>
                    </ul>
                    <div id="input_difficulte">
                        <input type="text" id="difficulte" size="7" value="" pattern="\d+" readonly/><br/>
                    </div>
                    <!--<label for="difficulty">Difficulté :</label>
                    <input type="range" step="1" min="1" max="5" id="difficulty" name="difficulty" <?php  /*if(isset($value['difficulty'])) echo 'value="'.$value['difficulty'].'"'; else echo 'value="1"';*/ ?> onchange="document.getElementById('difficulte').value=this.value;">--><br/>
                    
                    <label>Votre randonnée contient-elle un point d'eau ?</label><br/>
                    <?php if(isset($error['water'])) echo '<p class="error">'.$error['water'].'</p>'; ?>
                    <input type="radio" id="non" name="water" value="non" <?php if(!isset($value['water']) or $value['water'] == 0) echo 'checked'; ?> ><label for="non">Non</label>&emsp;&emsp;&emsp;&emsp;
                    <input type="radio" id="oui" name="water" value="oui" <?php if(isset($value['water']) and $value['water'] == 1) echo 'checked'; ?> ><label for="oui">Oui</label><br/><br/><br/>



                    <label for="description">Décrivez votre randonnée : </label><br/>
                    <?php if(isset($error['description'])) echo '<p class="error">'.$error['description'].'</p>'; ?>
                    <textarea id="description" name="description"><?php if(isset($value['description'])) echo $value['description']; ?></textarea><br/>

                   

                </form>
                <br>
                <form method="post" enctype="multipart/form-data">
                        <label for="images">Choisissez vos images : </label>
                        <input type="file" name="images[]" id="images" multiple>
                </form>
                <div id="response"></div>
                    <ul id="image-list">
                        
                    </ul>
                <br/>
                <input type="submit" value="Ajouter" id="submitRando">
            </section>

			<?php include_once('Controller/c_footer.php'); ?>
            <script type="text/javascript" src="JS/script_GPX.js"></script>
        </div>
	</body>
</html>