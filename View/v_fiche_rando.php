<!DOCTYPE html>
<html lang="fr">
    <?php head("Fiche : $title"); ?>
    <script src="JS/stars.js">
    </script>

    <body>
        <div id="corps">
            <?php menu(); ?>
            <?php include_once('Controller/c_activitees_recentes.php');?> 
    
            <section id="fiche_rando">
                <div class="titre"><?php echo $title; ?></div>
                <center><img id="photo" src="<?php echo $photo; ?>"/></center>
                <?php echo $description; ?><br/>
                <?php $difficulte_rond = ''; ?>
                <ul>
                    <li><img id="img_fiche" src="Resources/Images/longueur.png"/><label>Longueur : </label><?php echo '<div id="div_val_fiche">'.$lenght.'</div>'; ?></li>
                    <li><img id="img_fiche_duree" src="Resources/Images/duree.png"/><label>Durée : </label><?php echo '<div id="div_val_fiche">'.$duration.'</div>'; ?></li>
                    <li><img id="img_fiche_point_eau" src="Resources/Images/eau.png"/><label>Point d'eau : </label><?php echo '<div id="div_val_fiche_eau_denivele">'.$water.'</div>'; ?></li>
                    <li><img id="img_fiche" src="Resources/Images/longueur.png"/><label>Note : </label><?php echo '<div id="div_val_fiche">'.$note.'</div>'; ?></li>
                    <li><?php for($j = 1; $j <= $difficulty; $j++){$difficulte_rond .= '<div id="cercle"></div>'; }?><img id="img_fiche_difficulte" src="Resources/Images/difficulte.png"/><label>Difficulté : </label><?php echo '<div id="div_val_fiche">'.$difficulte_rond.'</div>'; ?></li>
                    <li><img id="img_fiche_denivele" src="Resources/Images/mountain.png"/><label>Dénivelé : </label><?php echo '<div id="div_val_fiche_eau_denivele">'.$altitude.'</div>'; ?></li>
                </ul><br/>             
                Equipement : <?php echo $equipment; ?><br/>
                GPX : <?php echo $path; ?><br/>
                Département : <?php echo $department; ?><br/>
                Ajouté le <?php echo $insertion_date.' à '.$insertion_hour; ?>.<br/>
                Rédigé par <?php echo $author; ?>.<br/>
                
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
						$date = $nb_commentaire['date'];
						echo '<div id="cadre_affichage_commentaire">';
							echo $insertion_date .'<br/>';
							echo $nb_commentaire['commentaire'].'<br/>';
							echo $nb_commentaire['auteur'].'<br/>';;
							echo $nb_commentaire['note'];
						echo '</div><br/>';
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