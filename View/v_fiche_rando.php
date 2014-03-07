<!DOCTYPE html>
<html lang="fr">
    
    <?php 
    $listeFiles = array(
                    array('type' => 'meta', 'name' => 'viewport', 'content' => 'initial-scale=1.0, user-scalable=no'),
                    array('type' => 'javascript', 'src' => 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC8ydWcT7L0z-S-g7DJf0Nh985GSMDjSf0&sensor=false&region=FR'),
                    array('type' => 'javascript', 'src' => 'JS/script_GPX2.js')
                    );
    if(isset($_SESSION['pseudo'])){
        $listeFiles[] = array('type' => 'javascript', 'src' => 'JS/stars.js'); // On ajoute ce script seulement si on est connecté
    }
    head("Fiche : $title", $listeFiles); ?>

    <script type="text/javascript">
        var divMap;
        window.addEventListener('load', function(){
            divMap = document.getElementById('carte');
            if(!getGpx('<?php echo $srcParcours?>')){ // Si le XHR n'a ne peut pas être instancié
                var elem = document.createElement('p');
                elem.appendChild(document.createTextNode('Votre navigateur ne suporte pas notre gestion de parcours.'))
                divMap.appendChild(elem);
            }
        }, false);

    </script>
    
    <body>
        <div id="corps">
            <?php menu(); ?>
            <?php include_once('Controller/c_activitees_recentes.php');?> 
    
            <section id="fiche_rando">
                <div class="titre"><?php echo $title; ?></div>
                
                <center><img id="photo" src="<?php echo $photo; ?>"/></center>
                
                <?php echo $description; ?><br/><br/>
				<?php echo $equipment; ?>
                
                <div id="carte">
                </div>
                
                <div class="caracteristique">
                	<span class="intitule_caract">
                        <img id="img_fiche" src="Resources/Images/longueur.png"/>
                        Longueur
                    </span><br/>
                    <span class="valeur_caract">
						<?php echo $lenght; ?>
                    </span>
                </div>
                <div class="caracteristique">
                	<span class="intitule_caract">
                        <img id="img_fiche_duree" src="Resources/Images/duree.png"/>
                        Durée
                    </span><br/>
                    <span class="valeur_caract">
						<?php echo $duration; ?>
                    </span>
                </div class="caracteristique">
                <div class="caracteristique">
                	<span class="intitule_caract">
                        <img id="img_fiche_point_eau" src="Resources/Images/eau.png"/>
                        Point d'eau
                    </span><br/>
                    <span class="valeur_caract">
						<?php echo $water; ?>
                    </span>
                </div>
                <div class="caracteristique">
                	<span class="intitule_caract">
                        <img id="img_fiche_difficulte" src="Resources/Images/difficulte.png"/>
                        Difficulté
                    </span><br/>
                    <span class="valeur_caract">
						<?php echo $difficulty; ?>
                    </span>
                </div>
                <div class="caracteristique">
                	<span class="intitule_caract">
                        <img id="img_fiche_denivele" src="Resources/Images/mountain.png"/>
                        Dénivelé
                    </span><br/>
                    <span class="valeur_caract">
						<?php echo $altitude; ?>
                    </span>
                </div>
                <div class="caracteristique">
                	<span class="intitule_caract">
                        <img id="img_fiche_denivele" src="Resources/Images/departement.png"/>
                        Département
                    </span><br/>
                    <span class="valeur_caract">
						<?php echo $department; ?>
                    </span>
                </div>
                <div class="caracteristique">
                	<span class="intitule_caract">
                        <img id="img_fiche" src="Resources/Images/star-pleine_fiche.png"/>
                        Note
                    </span><br/>
                    <span class="valeur_caract">
                    	<?php echo $etoile.'<br/>&emsp;&emsp;&emsp; '.$number_of_note; ?>
                    </span>
                </div>
                
                <br/><br/>
                
                <span id="date">Ajouté le <?php echo $insertion_date.' à '.$insertion_hour; ?></span>
                <span id="auteur">Rédigé par <?php echo $author; ?></span>
                
                
                <?php 
                    foreach($listeImage as $image) {
                        echo '<img src="Resources/Galerie/'.$galery.'/'.$image['nom'].'" class="galerie"/>';
                    }
                ?>
                <br/><br/><br/><br/>
                <div class="titre">Commentaires</div>
                <?php
                    $i = 0;
					foreach($nombre_commentaire as $commentaire){
						$date = $commentaire['date'];
						echo '	<div id="commentaire">
                           			<span id="auteur">De '.$commentaire['auteur'].'</span>
									<span id="date">Le '.$insertion_date .'</span><br/>
							 		<br/>'.$commentaire['commentaire'].'<br/><br/>';
                                for($j = 0; $j < $commentaire['note']; $j++){
                                    echo '<span id="note"><img class="etoile" src="Resources/Images/star-pleine_fiche.png" width="15px"/></span>';
                                }
						echo '	</div>';
                        $i++;
					}
                    if(isset($_SESSION['pseudo'])){
                ?>
                <br/>

                <form action="index.php?page=fiche_rando&code=<?php echo $code; ?>" method="post">
                    <label for="commentaire"><h1>Ajouter un commentaire :</h1></label><br/>
                        <ul name="notes" class="notes">
                            <p> Note : </p>
                            <li>
                                <label class="etoile_vide" id="et5" for="note5" title="Note : 5 sur 5"></label>
                                <input type="radio" name="note" id="note5" value="5"/>
                            </li>
                            <li>
                                <label class="etoile_vide" id="et4" for="note4" title="Note : 4 sur 5"></label>
                                <input type="radio" name="note" id="note4" value="4"/>
                            </li>
                            <li>
                                <label class="etoile_vide" id="et3" for="note3" title="Note : 3 sur 5"></label>
                                <input type="radio" name="note" id="note3" value="3"/>
                            </li>
                            <li>
                                <label class="etoile_vide" id="et2" for="note2" title="Note : 2 sur 5"></label>
                                <input type="radio" name="note" id="note2" value="2"/>
                            </li>
                            <li>
                                <label class="etoile_vide" id="et1" for="note1" title="Note : 1 sur 5"></label>
                                <input type="radio" name="note" id="note1" value="1"/>
                            </li>
                        </ul>
                    <textarea id="commentaire" name="commentaire" required autocomplete="off" pattern="[a-z]"></textarea>
                    <input type="submit" name="envoie_commentaire" value="Envoyer"/>
                </form>

                <?php } ?>
            </section>
    
            <?php include_once('Controller/c_footer.php'); ?>
        </div>
    </body>
</html>