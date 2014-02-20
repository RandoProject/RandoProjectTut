<!DOCTYPE html>
<html lang="fr">

	<?php head("Modération"); ?>

	<body>
		<?php menu(); ?>
        
        <div id="corps">    
            <section id="administration">
            	<table>
                	<tr>
                    	<td width="500px">Commentaire</td>
                    	<td width="100px">Auteur</td>
					</tr>
                	<?php
                        foreach($listeComment as $comment){
                            echo '	<tr>
                                        <td>'.$comment['commentaire'].'</td>
                                        <td>'.$comment['auteur'].'</td>
                    					<td>
											<form method="post" action="index.php?page=moderateur&code='.$comment['numero'].'">
												<input type="submit" value="X">
											</form>
										</td>
                                    </tr>';
                        }
                    ?>
                </table>
                <table>
                	<tr>
                    	<td width="500px">Nom</td>
					</tr>
                	<?php
                        foreach($listeRandoInvalide as $rando){
                            echo '	<tr>
                                        <td>'.$rando['titre'].'</td>
                                    </tr>';
                        }
                    ?>
                </table>
            </section>
        </div>
    
        <?php include_once('Controller/c_footer.php'); ?>
	</body>
</html>