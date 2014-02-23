<!DOCTYPE html>
<html lang="fr">

	<?php head("Modération"); ?>

	<body>
		<?php menu(); ?>
        
        <div id="corps">    
            <section id="administration">
            	<!--<table>
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
                </table>-->
                <form method="post" action="index.php?page=moderateur">
                	<input type="submit" value="Valider les randonnées" name="validate"/> 
                	<input type="submit" value="Supprimer les randonnées" name="delete"/>
                    <table>
                        <tr>
                            <td>Code</td>
                            <td>Titre</td>
                            <td>Difficulté</td>
                            <td>Longueur</td>
                            <td>Durée</td>
                            <td>Dénivelé</td>
                            <td>Département</td>
                            <td>Point d'eau</td>
                            <td>Equipement</td>
                            <td>Déscription</td>
                            <td>Date insertion</td>
                            <td>Auteur</td>
                            <td>Photo</td>
                            <td>Galerie</td>
                        </tr>	
                        <?php
                            foreach($listeRandoInvalide as $rando){
                                echo '	<tr>
                                            <td>'.$rando['code'].'</td>
                                            <td>'.$rando['titre'].'</td>
                                            <td>'.$rando['difficulte'].'</td>
                                            <td>'.$rando['longueur'].'</td>
                                            <td>'.$rando['duree'].'</td>
                                            <td>'.$rando['denivele'].'</td>
                                            <td>'.$rando['departement'].'</td>
                                            <td>'.$rando['point_eau'].'</td>
                                            <td>'.$rando['equipement'].'</td>
                                            <td>'.truncate($rando['descriptif'], 50).'</td>
                                            <td>'.print_date($rando['date_insertion']).'</td>
                                            <td>'.$rando['auteur'].'</td>
                                            <td>'.$rando['nom_photo'].'</td>
                                            <td>'.$rando['nom_galerie'].'</td>
                                            <td><input type="checkbox" value="'.$rando['code'].'" name="rando[]"/></td>
                                        </tr>';
                            }
                        ?>
               		</table>
                </form>
            </section>
        </div>
    
                                            <td><input type="button" value="'.$rando['code'].'" name="remove_rando" title="78988"/></td>
        <?php include_once('Controller/c_footer.php'); ?>
	</body>
</html>