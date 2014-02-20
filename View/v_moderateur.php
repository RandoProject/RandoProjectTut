<!DOCTYPE html>
<html lang="fr">

	<?php head("Modération"); ?>

	<body>
		<?php menu(); ?>
        
        <div id="corps">    
            <section id="administration">
            <textarea ></textarea>
            	<table>
                	<tr>
                    	<td width="500px">Commentaire</td>
                    	<td width="100px">Auteur</td>
                    	<td width="100px">Supprimer</td>
					</tr>
                	<?php
                        foreach($listeComment as $comment){
                            echo '	<tr>
                                        <td>'.$comment['commentaire'].'</td>
                                        <td>'.$comment['auteur'].'</td>
                    					<td>
											<a href="Scripts/delete_ski.php?id=$id" title=\"Supprimer\">X</a>
										</td>
                                    </tr>';
                        }
                    ?>
                </table>
            </section>
        </div>
    
        <?php include_once('Controller/c_footer.php'); ?>
	</body>
</html>