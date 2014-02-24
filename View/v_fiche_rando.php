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
                Dur�e : <?php echo $duration; ?><br/>
                Difficult� : <?php echo $difficulty; ?><br/>
                Note : <?php echo $note; ?><br/>
                Point d'eau : <?php echo $water; ?><br/>
                D�nivel� : <?php echo $altitude; ?><br/>
                Equipement : <?php echo $equipment; ?><br/>
                GPX : <?php echo $path; ?><br/>
                D�partement : <?php echo $department; ?><br/>
                Ajout� le <?php echo $insertion_date.' � '.$insertion_hour; ?>.<br/>
                R�dig� par <?php echo $author; ?>.<br/>
                
                <?php 
					foreach($listeImage as $image) {
						echo '<img src="Resources/Galerie/'.$galery.'/'.$image['nom'].'" width="420" height="310"/>';
					}
				?>

                <?php
                    if($_SESSION){
                ?>
                                    <!--Stars-->
                <span class="star-rating">
                  <input type="radio" name="rating" value="1"><i></i>
                  <input type="radio" name="rating" value="2"><i></i>
                  <input type="radio" name="rating" value="3"><i></i>
                  <input type="radio" name="rating" value="4"><i></i>
                  <input type="radio" name="rating" value="5"><i></i>
                </span>
                <strong class="choice">Choose a rating</strong>

                <script type="text/javascript">
                    $(':radio').change(
                        function(){
                            $('.choice').text( this.value + ' stars' );
                        } 
                    )
                </script>


                <form action="index.php?page=fiche_rando&code=<?php echo $code; ?>" method="post">
                    <p><label for="commentaire">Commentaires : </label></p><br/>
                    <textarea id="commentaire" name="commentaire"></textarea>
                    <input type="submit" name="envoie_commentaire" value="Envoyer"/>
                </form>
                <?php
                    }

                $i = 0;
                foreach($nombre_commentaire as $nb_commentaire){
                    $date = $nb_commentaire['date'];
                    echo '<div id="cadre_commentaire">';
                        echo $insertion_date .'<br/>';
                        echo $nb_commentaire['commentaire'].'<br/>';
                        echo $nb_commentaire['auteur'];
                    echo '</div>';
                }
                ?>

                

            </section>
        </div>
    
        <?php include_once('Controller/c_footer.php'); ?>
	</body>
</html>