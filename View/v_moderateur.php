<!DOCTYPE html>
<html lang="fr">

	<?php head("Modération"); ?>
    
	<script language="javascript">
        function unCheck(id){
            if(!document.getElementById(id).checked){
                document.getElementById(id).checked = true;
            }
            else{
                document.getElementById(id).checked = false;
            }
        }
    
	function unCheckAll(){ 
		var inputs = document.getElementsByTagName("input");
		var value = false;
		for(var i = 0; i < inputs.length; i++){
			if(inputs[i].type == "checkbox"){
				if(inputs[i].checked == false){
					value = true;
				}
				break;
			}
		}
		for(var i = 0; i < inputs.length; i++){
			if(inputs[i].type == "checkbox"){
				inputs[i].checked = value;
			}
		}
	}
    </script>
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
                        <input type="button" value="Déselectionner tout" onclick="check('a');"/>
                        
                        <table>
                            <tr>
                                <td width="25px"></td>
                                <td width="200px">Titre</td>
                                <td width="250px">Equipement</td>
                                <td>Déscription</td>
                                <td width="110px">Photo</td>
                                <td width="20px"><input type="checkbox" onClick="unCheckAll();"/></td>
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
										echo '	<tr class="ligne_'.$ligneColor.'" height="80px" onclick="unCheck(\''.$i.'\');">
													<td>'.$rando['code'].'</td>
													<td>'.$rando['titre'].'</td>
													<td>'.$rando['equipement'].'</td>
													<td>'.truncate($rando['descriptif'], 400).'</td>
													<td><img src="Resources/Galerie/'.$rando['nom_galerie'].'/'.$rando['nom_photo'].'" width="100px"/></td>
													<td><input type="checkbox" value="'.$rando['code'].'" name="rando[]" class="a" id="'.$i.'" onclick="check(\''.$i.'\');"/></td>
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
                                <td width="25px"></td>
                                <td width="170px">Auteur</td>
                                <td>Commentaire</td>
                                <td width="20px"></td>
                            </tr>
                            <?php
                                foreach($listeComment as $comment){
									if(($i % 2) === 0) $ligneColor = 'pair';
									else $ligneColor = 'impair';
                                    echo '	<tr class="ligne_'.$ligneColor.'" title="'.$comment['commentaire'].'">
                                                <td>'.$comment['numero'].'</td>
                                                <td>'.$comment['auteur'].'</td>
                                                <td>'.truncate($comment['commentaire'], 250).'</td>
                                                <td><input type="checkbox" value="'.$comment['numero'].'" name="comment[]"/></td>
                                            </tr>';
									$i++;
                                }
                            ?>
                        </table>
                    </form>
                    
                 <!-- Partie PHOTOS -->
            	<?php } else if($_GET['section'] === 'photos'){ ?>
                	azertyuiop
                <?php } ?>
            </section>

        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>