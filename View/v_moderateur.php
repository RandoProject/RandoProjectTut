<!DOCTYPE html>
<html lang="fr">

	<?php head("Modération"); ?>

	<body>
        <div id="corps">   
			<?php menu(); ?>
         
            <section id="administration">
            	<a href="index.php?page=moderateur&section=commentaires">[commentaire]</a>
            	<a href="index.php?page=moderateur&section=randonnees">[randonnees]</a>
            
                <!-- Partie RANDONNEES -->
            	<?php if($_GET['section'] === 'randonnees'){ ?>
                    <form method="post" action="index.php?page=moderateur&section=randonnees">
                        <input type="submit" value="Valider les randonnées" name="validate"/>
                        <input type="submit" value="Modifier les randonnées" name="modify"/>
                        <input type="submit" value="Supprimer les randonnées" name="delete"/>
                        <input type="reset" value="Déselectionner tout"/>
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
                                    echo '	<tr title="'.$comment['commentaire'].'">
                                                <td>'.$comment['numero'].'</td>
                                                <td>'.$comment['auteur'].'</td>
                                                <td>'.truncate($comment['commentaire'], 200).'</td>
                                                <td><input type="checkbox" value="'.$comment['numero'].'" name="comment[]"/></td>
                                            </tr>';
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