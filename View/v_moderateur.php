<!DOCTYPE html>
<html lang="fr">

	<?php head("Modération"); ?>
    
	<script language="javascript">
		/* Cocher / Décocher UN checkbox
		 * id : id du checkbox à cocher
		 */
        function unCheck(id){
            if(!document.getElementById(id).checked){
                document.getElementById(id).checked = true;
            }
            else{
                document.getElementById(id).checked = false;
            }
        }
    	
		/* Cocher / Décocher TOUS les checkbox
		 * id : id du checkbox principal qui coche les autres
		 */
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
                
            	<?php $i = 0; 



                // - - - - - - - - - - Partie RANDONNEES - - - - - - - - - -
				if($_GET['section'] === 'randonnees'){
					if(!empty($listeRando)){
						// --- BOUTONS ---
						echo '<form method="post" action="index.php?page=moderateur&section=randonnees">';
						if(!empty($_POST['rando']) && !empty($_POST['update'])){
							echo '<input type="submit" value="Valider" name="validUpdate"/>';
						} 
						else{
							echo '	<input type="submit" value="Supprimer" name="delete"/>
									<input type="submit" value="Modifier" name="update"/>
									<input type="submit" value="Valider" name="validate"/>
							';
						}
					
						// --- ENTETE TABLEAU ---
						echo'	<table>
									<tr>
										<td width="25px"></td>
										<td width="200px">Titre</td>
										<td width="250px">Equipement</td>
										<td>Déscription</td>
										<td width="110px">Photo</td>
										<td width="20px">
						';   
						if(empty($_POST['rando']) || !isset($_POST['update'])){
							echo '			<input type="checkbox" id="selectAll" onChange="unCheckAll(\'selectAll\');"/>';
						} 
						echo'			</td>
									</tr>
						';
						
						// --- CONTENU TABLEAU --- Mode MODIFICATION
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
						// --- CONTENU TABLEAU --- Mode NORMAL
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
											<td onClick="unCheck(\''.$i.'\');"><input type="checkbox" name="rando[]" value="'.$rando['code'].'" id="'.$i.'" onclick="check(\''.$i.'\');"/></td>
										</tr>';
								$i++;
							}
						}
						echo '	</table>';
					}
					else{ 
						echo '<br/><br/><br/><br/><br/><h2>Aucune randonnée n\'a été récemment ajoutée<h2/>'; 
					}
					echo '</form>';
				}
				
				

                // - - - - - - - - - - Partie COMMENTAIRES - - - - - - - - - -
				else if($_GET['section'] === 'commentaires'){
					if(!empty($listeComment)){
						// --- BOUTONS ---
						echo '	<form method="post" action="index.php?page=moderateur&section=commentaires">
									<input type="submit" value="Valider" name="validate"/> 
									<input type="submit" value="Supprimer" name="delete"/>
						';
						
						// --- ENTETE TABLEAU ---
						echo'   <table>
                                    <tr>
                                        <td width="25px"></td>
                                        <td width="170px">Auteur</td>
                                        <td>Commentaire</td>
                                        <td width="20px"><input type="checkbox" id="selectAll" onChange="unCheckAll(\'selectAll\');"/></td>
                                    </tr>
						';
						
						// --- CONTENU TABLEAU ---
						foreach($listeComment as $comment){
							if(($i % 2) === 0) $ligneColor = 'pair';
							else $ligneColor = 'impair';
							echo '		<tr class="ligne_'.$ligneColor.'" onclick="unCheck(\''.$i.'\');">
											<td>'.$comment['numero'].'</td>
											<td title="'.$comment['auteur'].'">'.$comment['auteur'].'</td>
											<td title="'.$comment['commentaire'].'">'.truncate($comment['commentaire'], 250).'</td>
											<td onClick="unCheck(\''.$i.'\');">
												<input type="checkbox" name="comment[]" value="'.$comment['numero'].'" id="'.$i.'" onclick="check(\''.$i.'\');"/>
												<input type="hidden" value="'.$comment['code_rando'].'" name="rando[]"/>
											</td>
										</tr>
							';
							$i++;
						}
						echo ' 		</table>
								</form>
						';
					}
					else {
						echo '<br/><br/><br/><br/><br/><h2>Aucun commentaire n\'a été récemment ajoutée<h2/>'; 
					}
				}
                    
                    
                    
                // - - - - - - - - - - Partie PHOTOS - - - - - - - - - -
            	else if($_GET['section'] === 'photos'){ ?>
                	azertyuiop
                <?php } ?>
            </section>

        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>