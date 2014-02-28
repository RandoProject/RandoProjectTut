<!DOCTYPE html>
<html lang="fr">

	<?php head("Modération"); ?>

	<body>
        <div id="corps">   
			<?php menu(); ?>
         
            <section id="administration">
            	<a href="index.php?page=moderateur&section=commentaires">[commentaire]</a>
            	<a href="index.php?page=moderateur&section=randonnees">[randonnees]</a>
            	<a href="index.php?page=moderateur&section=photos">[photos]</a>
            
            	<?php $i = 0; ?>
               
                <!-- Partie RANDONNEES -->
            	<?php if($_GET['section'] === 'randonnees'){ ?>
                    <form method="post" action="index.php?page=moderateur&section=randonnees">
                        <input type="submit" value="Valider les randonnées" name="validate"/>
                        <input type="submit" value="Modifier les randonnées" name="update"/>
                        <input type="submit" value="Supprimer les randonnées" name="delete"/>
                        <input type="reset" value="Déselectionner tout"/>
                        <table>
                            <tr align="center">
                                <td></td>
                                <td>Titre</td>
                                <td >Auteur</td>
                                <td>Difficulté</td>
                                <td>Longueur</td>
                                <td>Durée</td>
                                <td>Dénivelé</td>
                                <td>Département</td>
                                <td>Point d'eau</td>
                                <td>Equipement</td>
                                <td>Déscription</td>
                                <td>Date insertion</td>
                                <td>Photo</td>
                            </tr>	
                            <?php
								if(!empty($_POST['update'])){
									foreach($listeRando as $rando){
										if(($i % 2) === 0) $ligneColor = 'pair';
										else $ligneColor = 'impair';
										echo '	<tr class="ligne_'.$ligneColor.'">
													<td>'.$rando['code'].'</td>
													<td><input type="text" name="title" autocomplete="off" maxlength="150" required value="'.$rando['titre'].'"/></td>
													<td>'.$rando['auteur'].'</td>
													<td><input type="text" pattern="+\d" value="'.$rando['difficulte'].'"/></td>
													<td>'.$rando['longueur'].'</td>
													<td>'.$rando['duree'].'</td>
													<td>'.$rando['denivele'].'</td>
													<td>'.$rando['departement'].'</td>
													<td>'.$rando['point_eau'].'</td>
													<td>'.$rando['equipement'].'</td>
													<td><textarea name="description">'.$rando['descriptif'].'</textarea></td>
													<td>'.$rando['date_insertion'].'</td>
													<td><img src="Resources/Galerie/'.$rando['nom_galerie'].'/'.$rando['nom_photo'].'" width="100px"/></td>
													<td><input type="checkbox" value="'.$rando['code'].'" name="rando[]"/></td>
												</tr>';
										$i++;
									}
								}
								else {
									foreach($listeRando as $rando){
										if(($i % 2) === 0) $ligneColor = 'pair';
										else $ligneColor = 'impair';
										echo '	<tr class="ligne_'.$ligneColor.'">
													<td>'.$rando['code'].'</td>
													<td>'.$rando['titre'].'</td>
													<td>'.$rando['auteur'].'</td>
													<td>'.$rando['difficulte'].'</td>
													<td>'.$rando['longueur'].'</td>
													<td>'.$rando['duree'].'</td>
													<td>'.$rando['denivele'].'</td>
													<td>'.$rando['departement'].'</td>
													<td>'.$rando['point_eau'].'</td>
													<td>'.$rando['equipement'].'</td>
													<td>'.truncate($rando['descriptif'], 50).'</td>
													<td>'.print_date($rando['date_insertion']).'</td>
													<td><img src="Resources/Galerie/'.$rando['nom_galerie'].'/'.$rando['nom_photo'].'" width="100px"/></td>
													<td><input type="checkbox" value="'.$rando['code'].'" name="rando[]"/></td>
												</tr>';
										$i++;
									}
								}
                            ?>
                        </table>
                    </form>
                    
                <!-- Partie COMMENTAIRES -->
            	<?php } else if($_GET['section'] === 'commentaires'){ ?>
                    <form method="post" action="index.php?page=moderateur&section=commentaires">
                        <input type="submit" value="Valider les commentaires" name="validate"/> 
                        <input type="submit" value="Supprimer les commentaires" name="delete"/>
                        <input type="reset" value="Déselectionner tout"/>
                        <table>
                            <tr>
                                <td>Numéro</td>
                                <td>Auteur</td>
                                <td>Commentaire</td>
                            </tr>
                            <?php
                                foreach($listeComment as $comment){
									if(($i % 2) === 0) $ligneColor = 'pair';
									else $ligneColor = 'impair';
                                    echo '	<tr class="ligne_'.$ligneColor.'" title="'.$comment['commentaire'].'">
                                                <td>'.$comment['numero'].'</td>
                                                <td>'.$comment['auteur'].'</td>
                                                <td>'.truncate($comment['commentaire'], 200).'</td>
                                                <td><input type="checkbox" value="'.$comment['numero'].'" name="comment[]"/></td>
                                            </tr>';
									$i++;
                                }
                            ?>
                        </table>
                    </form>
                <?php } ?>
            </section>

        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>