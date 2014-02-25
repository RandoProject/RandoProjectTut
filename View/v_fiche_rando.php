<!DOCTYPE html>
<html lang="fr">

	<?php head("Fiche : $title"); ?>

	<body>
		<?php menu(); ?>
        
        <div id="corps">
            <?php include_once('Controller/c_activitees_recentes.php'); ?>
    
            <section id="fiche_rando">
                <?php echo $title; ?><br/>
                <img src="<?php echo $photo; ?>"/>
                <?php echo $description; ?>
                Longueur : <?php echo $lenght; ?><br/>
                Durée : <?php echo $duration; ?><br/>
                Difficulté : <?php echo $difficulty; ?><br/>
                Note : <?php echo $note; ?><br/>
                Point d'eau : <?php echo $water; ?><br/>
                Dénivelé : <?php echo $altitude; ?><br/>
                Equipement : <?php echo $equipment; ?><br/>
                GPX : <?php echo $path; ?><br/>
                Département : <?php echo $department; ?><br/>
                Ajout&eacute; le <?php echo $insertion_date.' à '.$insertion_hour; ?>.<br/>
                Rédigé par <?php echo $author; ?>.<br/>
                
                <?php 
					foreach($listeImage as $image) {
						echo '<img src="Resources/Galerie/'.$galery.'/'.$image['nom'].'" width="420" height="310"/>';
					}
				?>

                <?php
                    $i = 0;
                foreach($nombre_commentaire as $nb_commentaire){
                    $date = $nb_commentaire['date'];
                    echo '<div id="cadre_commentaire">';
                        echo $insertion_date .'<br/>';
                        echo $nb_commentaire['commentaire'].'<br/>';
                        echo $nb_commentaire['auteur'];
                    echo '</div>';
                }
                    if($_SESSION){
                ?>
                <!--Etoile-->
                <ul class="notes">
                    <li>
                        <label for="note1" title="Note;: 1 sur 5"></label>
                        <input type="radio" name="note1" id="note1" value="1"/>
                    </li>
                    <li>
                        <label for="note2" title="Note;: 2 sur 5"></label>
                        <input type="radio" name="note2" id="note2" value="2"/>
                    </li>
                    <li>
                        <label for="note3" title="Note;: 3 sur 5"></label>
                        <input type="radio" name="note3" id="note3" value="3"/>
                    </li>
                    <li>
                        <label for="note4" title="Note;: 4 sur 5"></label>
                        <input type="radio" name="note4" id="note4" value="4"/>
                    </li>
                    <li>
                        <label for="note5" title="Note;: 5 sur 5"></label>
                        <input type="radio" name="note5" id="note5" value="5"/>
                    </li>
                </ul>
                <form action="index.php?page=fiche_rando&code=<?php echo $code; ?>" method="post">
                    <p><label for="commentaire">Commentaires : </label></p><br/>
                    <textarea id="commentaire" name="commentaire"></textarea>
                    <input type="submit" name="envoie_commentaire" value="Envoyer"/>
                </form>

                <?php
                    }
                ?>

                

            </section>
        </div>
    
        <?php include_once('Controller/c_footer.php'); ?>
	</body>
</html>