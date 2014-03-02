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
    
		function unCheckAll(id){ 
			var inputs = document.getElementsByTagName("input");
			var value = false;
			if(document.getElementById(id).checked){
				value = true;
			}
			for(var i = 0; i < inputs.length; i++){
				if(inputs[i].type == "checkbox" && inputs[i] != document.getElementById(id)){
					inputs[i].checked = value;
				}
			}
		}
    </script>
	<body>
        <div id="corps">   
			<?php menu(); ?>
            
            <section id="administration">
            	<div class="titre">Modération</div>
           		<a class="menu_administration" href="index.php?page=moderateur&section=commentaires">commentaire</a>
				<a class="menu_administration" href="index.php?page=moderateur&section=randonnees">randonnees</a>
				<a class="menu_administration" href="index.php?page=moderateur&section=photos">photos</a>
                
            	<?php $i = 0; ?>
               
                <!-- Partie RANDONNEES -->
            	<?php if($_GET['section'] === 'randonnees'){ ?>
                    <form method="post" action="index.php?page=moderateur&section=randonnees">
                        <?php if($_GET['section'] === 'randonnees'){ ?>
							<?php if(!empty($_POST['rando']) && !empty($_POST['update'])){ ?>
                                <input type="submit" value="Valider" name="validUpdate"/>
                            <?php } else { ?>
                                <input type="submit" value="Supprimer" name="delete"/>
                                <input type="submit" value="Modifier" name="update"/>
                                <input type="submit" value="Valider" name="validate"/>
                            <?php } ?>
                        
                            <table>
                                <tr>
                                    <td width="25px"></td>
                                    <td width="200px">Titre</td>
                                    <td width="250px">Equipement</td>
                                    <td>Déscription</td>
                                    <td width="110px">Photo</td>
                                    <td width="20px">
                                        <?php 
										if(empty($_POST['rando']) || !isset($_POST['update'])){
                                            echo '<input type="checkbox" id="selectAll" onChange="unCheckAll(\'selectAll\');"/>';
                                        } 
										?>
                                    </td>
                                </tr>
                                <?php
									// Mode MODIFICATION
                                    if(!empty($_POST['rando']) && !empty($_POST['update'])){
                                        foreach($listeRando as $rando){
                                            if(($i % 2) === 0) $ligneColor = 'pair';
                                            else $ligneColor = 'impair';
                                            echo '	<tr class="ligne_'.$ligneColor.'">
                                                        <td>'.$rando['code'].'</td>
                                                        <td><input type="text" name="title[]" autocomplete="off" maxlength="150" required value="'.$rando['titre'].'"/></td>
                                                        <td><input type="text" name="equipment[]" autocomplete="off" maxlength="150" value="'.$rando['equipement'].'"/></td>
                                                        <td><textarea name="description[]">'.$rando['descriptif'].'</textarea></td>
                                                        <td><img src="Resources/Galerie/'.$rando['nom_galerie'].'/'.$rando['nom_photo'].'" width="100px"/></td>
                                                    	<td><input type="hidden" name="rando[]" value="'.$rando['code'].'"/></td>
													</tr>';
                                            $i++;
                                        }
                                    }
									// Mode NORMAL
                                    else {
                                        foreach($listeRando as $rando){
                                            if(($i % 2) === 0) $ligneColor = 'pair';
                                            else $ligneColor = 'impair';
                                            echo '	<tr class="ligne_'.$ligneColor.'" height="80px" onclick="unCheck(\''.$i.'\');">
                                                        <td>'.$rando['code'].'</td>
                                                        <td title="'.$rando['titre'].'">'.$rando['titre'].'</td>
                                                        <td title="'.$rando['equipement'].'">'.$rando['equipement'].'</td>
                                                        <td title="'.$rando['descriptif'].'">'.truncate($rando['descriptif'], 400).'</td>
                                                        <td><img src="Resources/Galerie/'.$rando['nom_galerie'].'/'.$rando['nom_photo'].'" width="100px"/></td>
                                                        <td onClick="unCheck(\''.$i.'\');"><input type="checkbox" name="rando[]" value="'.$rando['code'].'" class="a" id="'.$i.'" onclick="check(\''.$i.'\');"/></td>
                                                    </tr>';
                                            $i++;
                                        }
                                    }
                                ?>
                            </table>
                        <?php } ?>
                    </form>
                    
                <!-- Partie COMMENTAIRES -->
            	<?php } else if($_GET['section'] === 'commentaires'){ ?>
                    <form method="post" action="index.php?page=moderateur&section=commentaires">
                        <input type="submit" value="Valider" name="validate"/> 
                        <input type="submit" value="Supprimer" name="delete"/>
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