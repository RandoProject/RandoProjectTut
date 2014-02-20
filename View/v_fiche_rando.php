<!DOCTYPE html>
<html lang="fr">

	<?php head("Fiche : $title"); ?>

	<body>
		<?php menu(); ?>
        
        <div id="corps">
            <?php include_once('Controller/c_activitees_recentes.php'); ?>
    
            <section id="fihce_rando">
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
                Ajouté le <?php echo $insertion_date.' à '.$insertion_hour; ?>.<br/>
                Rédigé par <?php echo $author; ?>.<br/>
                
                <?php 
					foreach($listeImage as $image) {
						echo '<img src="Resources/Galerie/'.$galery.'/'.$image['nom'].'" width="420" height="310"/>';
					}
				?>

                <?php
                    if($_SESSION){
                ?>
                <form action="index.php?page=fiche_rando" method="post">
                    <label for="commentaire">Commentaires : </label><br/>
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