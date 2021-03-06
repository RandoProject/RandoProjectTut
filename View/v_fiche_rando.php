<!DOCTYPE html>
<html lang="fr">
    
    <?php 
    $listeFiles = array(
                    array('type' => 'meta', 'name' => 'viewport', 'content' => 'initial-scale=1.0, user-scalable=no'),
                    array('type' => 'javascript', 'src' => 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC8ydWcT7L0z-S-g7DJf0Nh985GSMDjSf0&sensor=false&region=FR'),
                    array('type' => 'javascript', 'src' => 'JS/script_GPX2.js'),
                    array('type' => 'css', 'href' => 'CSS', 'name' => 'lightbox')
                    );
    if(isset($_SESSION['pseudo'])){
        $listeFiles[] = array('type' => 'javascript', 'src' => 'JS/stars.js'); // On ajoute ce script seulement si on est connect�
    }
    head("Fiche : $title", $listeFiles); ?>

    <?php if(isset($srcParcours)){ ?>
        <script type="text/javascript">
            var divMap;
            window.addEventListener('load', function(){
                divMap = document.getElementById('carte');
                if(!getGpx('<?php echo $srcParcours?>')){ // Si le XHR n'a ne peut pas �tre instanci�
                    var elem = document.createElement('p');
                    elem.appendChild(document.createTextNode('Votre navigateur ne suporte pas notre gestion de parcours.'))
                    divMap.appendChild(elem);
                }
            }, false);
        </script>
    <?php } ?>

    <body>
        <div id="corps">
            <?php menu(); ?>
            <?php include_once('Controller/c_activitees_recentes.php');?> 
    
            <section id="fiche_rando">
                <div class="titre"><?php echo $title; ?></div>
                
                <center><img id="photo" src="<?php echo $photo; ?>"/></center>
                
                <span id="description"><?php echo $description; ?></span><br/><br/>
				<?php echo $equipment; ?>
                
                <?php if(isset($nom_GPX_final)){ ?>
                    <div id="carte">
                    </div>
                <?php } ?>
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
                        Dur�e
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
                        Difficult�
                    </span><br/>
                    <span class="valeur_caract">
						<?php echo $difficulty; ?>
                    </span>
                </div>
                <div class="caracteristique">
                	<span class="intitule_caract">
                        <img id="img_fiche_denivele" src="Resources/Images/mountain.png"/>
                        D�nivel�
                    </span><br/>
                    <span class="valeur_caract">
						<?php echo $altitude.' m'; ?>
                    </span>
                </div>
                <div class="caracteristique">
                	<span class="intitule_caract">
                        <img id="img_fiche_denivele" src="Resources/Images/departement.png"/>
                        D�partement
                    </span><br/>
                    <span class="valeur_caract">
						<?php if($department === null) echo '<em>Non renseign�</em>'; else echo $department?>
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
                <?php if(isset($nom_GPX_final)){ ?>
                    <div id="download_gpx">
                        <?php echo '<a href="index.php?page=download&file='.$nom_GPX_final.'" target="_blank">' ?><input type="button" id="download_gpx" value="T�l�charger le fichier "/></a>
                    </div>
                <?php } ?>
                <span id="dateRando">Ajout� le <?php echo $insertion_date.' � '.$insertion_hour; ?></span>
                <span id="auteurRando">R�dig� par <?php echo '<a href="index.php?page=profil&pseudo='.$author.'">'.$author.'</a>'; ?></span>
                
                
                <?php 
                if(isset($listeImage) and !empty($listeImage)){
                    echo '<div class="image-row"> <div class="image-set">';
                    $i=0;
                        foreach($listeImage as $image) {
                            $i++;
                            echo '<a class="image-link" href="Resources/Galerie/'.$galery.'/'.$image['nom'].'" data-lightbox="example-set" >';
                            echo '<img class="image" src="Resources/Galerie/'.$galery.'/'.$image['nom'].'" alt="Image '.$i.' sur '.count($listeImage).'"/></a>';
                        }
                    echo '</div></div>';
                }
                ?>
                <br/><br/><br/><br/>
                <?php 
                    if(!empty($nombre_commentaire)){
                ?>
                        <div class="titre">Commentaires</div>
                        <?php
                            $i = 0;
        					foreach($nombre_commentaire as $commentaire){
        						$date = $commentaire['date'];
        						echo '	<div id="commentaire">
                                   			<span id="auteurComment">De <a href="index.php?page=profil&pseudo='.$com['auteur'].'">'.$commentaire['auteur'].'</a></span>
        									<span id="dateComment">Le '.$date .'</span><br/>
        							 		<br/>'.$commentaire['commentaire'].'<br/><br/>';
                                        for($j = 0; $j < $commentaire['note']; $j++){
                                            echo '<span id="note"><img class="etoile" src="Resources/Images/star-pleine_fiche.png" width="20px"/></span>';
                                        }
        						echo '	</div>';
                                $i++;
        					}
                    }
                    if(isset($_SESSION['pseudo'])){
                ?>
                <br/>

                <form action="index.php?page=fiche_rando&code=<?php echo $code; ?>" method="post">
                    <label for="commentaire"><h1>Ajouter un commentaire :</h1></label><br/>
                        <?php 
                            if(!$note_existante){
                        ?>
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
                        
                            <?php } ?>
                        
                    <textarea id="commentaire" name="commentaire" required autocomplete="off" pattern="[a-z]"></textarea>
                    <input type="submit" name="envoie_commentaire" value="Envoyer"/>
                </form>

                <?php } ?>
            </section>
            <script src="JS/jquery-1.10.2.min.js"></script>
            <script src="JS/lightbox-2.6.min.js"></script>
            <?php include_once('Controller/c_footer.php'); ?>
        </div>
    </body>
</html>