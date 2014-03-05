<!DOCTYPE html>
<html lang="fr">

    <?php head("Fiche : $title",
                array(
                    array('type' => 'meta', 'name' => 'viewport', 'content' => 'initial-scale=1.0, user-scalable=no'),
                    array('type' => 'javascript', 'src' => 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC8ydWcT7L0z-S-g7DJf0Nh985GSMDjSf0&sensor=false&region=FR'),
                    array('type' => 'javascript', 'src' => 'JS/script_GPX2.js'),
                    array('type' => 'javascript', 'src' => 'JS/stars.js')
                )); ?>
    <script type="text/javascript">
        var divMap;
        window.addEventListener('load', function(){
            divMap = document.getElementById('carte');
            divMap.style.height = '350px';
            
            initializeMap()
        }, false);
    </script>
    
    <body>
        <div id="corps">
            <?php menu(); ?>
            <?php include_once('Controller/c_activitees_recentes.php');?> 
    
            <section id="fiche_rando">
                <div class="titre"><?php echo $title; ?></div>
                
                <center><img id="photo" src="<?php echo $photo; ?>"/></center>
                
                <?php echo $description; ?><br/>
                
                <div id="carte">
                    
                	GPX : <?php echo $path; ?><br/>
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
						<?php echo $altitude; ?>
                    </span>
                </div>
                <div class="caracteristique">
                	<span class="intitule_caract">
                        <img id="img_fiche_denivele" src="Resources/Images/departement.png"/>
                        D�partement
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
                
                <br/> <br/> <br/> <br/>             
                Equipement : <?php echo $equipment; ?><br/>
                Ajout� le <?php echo $insertion_date.' � '.$insertion_hour; ?>.<br/>
                R�dig� par <?php echo $author; ?>.<br/>
                
                <?php 
                    foreach($listeImage as $image) {
                        echo '<img src="Resources/Galerie/'.$galery.'/'.$image['nom'].'" width="105" height="77"/>';
                    }
                ?>
                <br/><br/><br/><br/>
                <div class="titre">Commentaires</div>
                <?php
                    $i = 0;
					foreach($nombre_commentaire as $nb_commentaire){
                        if(($i % 2) === 0) $ligneColor = 'pair';
                        else $ligneColor = 'impair';
						$date = $nb_commentaire['date'];
						echo '<div id="cadre_affichage_commentaire_'.$ligneColor.'">';
                            echo '<div id="ligne1">';
                                echo '<span id="auteur">Par : '.$nb_commentaire['auteur'].'</span>';
							    echo '<span id="date">Le : '.$insertion_date .'</span><br/>';
                            echo '</div>';
                            echo '<div id="ligne2">';
							    echo $nb_commentaire['commentaire'].'<br/>';
                            echo '</div>';
                                if($nb_commentaire['note'] == 0){
                                    echo '<span id="note">Note : aucune...</span>';
                                }
                                else{
                                    echo '<span id="note">Note : '.$nb_commentaire['note'].'</span>';
                                }
						echo '</div>';
                        $i++;
					}
                    if($_SESSION){
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