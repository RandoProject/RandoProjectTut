<!DOCTYPE html>
<html lang="fr">

	<?php head("Administration"); ?>

	<body>
        <div id="corps">  
			<?php menu(); ?>  
            
            <section id="administration">
				<?php			
					foreach($listeRando as $rando){
						echo $rando['titre'].'<br/>';
					}
					echo '<br/><br/><br/><br/>';
					
					foreach($listeMember as $member){
						echo $member['pseudo'].'<br/>';
					}
					echo '<br/><br/><br/><br/>';
					
					foreach($listeComment as $comment){
						echo $comment['commentaire'].'<br/>';
					}
					echo '<br/><br/><br/><br/>';
					$i = 1;
					foreach($galery as $photo){
						echo $i.' &nbsp;&nbsp;&nbsp;&nbsp;   '.$photo['nom_photo'].'<br/>';$i++;
					}
				?>
            </section>
    
        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>