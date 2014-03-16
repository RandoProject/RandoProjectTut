<!DOCTYPE html>
<html lang="fr">

	<?php head("Administration", array(array('type' => 'javascript', 'src' => 'JS/check_checkbox.js'))); ?>

	<body>
        <div id="corps">  
			<?php menu(); ?>  
            
            <section id="administration">
            	<div class="titre">Administration</div>
				<a class="menu_administration" href="index.php?page=administrateur&section=randonnees">Randonnees</a>
           		<a class="menu_administration" href="index.php?page=administrateur&section=commentaires">Commentaires</a>
				<a class="menu_administration" href="index.php?page=administrateur&section=photos">Photos</a>
				<a class="menu_administration" href="index.php?page=administrateur&section=membres">Membres</a>
                
            	<?php $i = 0; 

				//array_search($rando, $listeRandoInvalide, true)
				

                // - - - - - - - - - - Partie RANDONNEES - - - - - - - - - -
				if($_GET['section'] === 'randonnees'){
					if(!empty($listeRando)){
						// --- BOUTONS ---
						echo '<form method="post" action="index.php?page=administrateur&section=randonnees">';
						if(!empty($_POST['rando']) && !empty($_POST['update'])){
							echo '<input type="submit" value="Valider" name="validUpdate"/>';
						} 
						else{
							echo '	<input type="submit" value="Supprimer" name="delete"/>
									<input type="submit" value="Modifier" name="update"/>
							';
						}
						
						// --- ENTETE TABLEAU ---
						echo'	<br/>
								<table>
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
											<td title="'.strip_tags($rando['descriptif']).'">'.truncate($rando['descriptif'], 400).'</td>
											<td><img src="Resources/Galerie/'.$rando['nom_galerie'].'/'.$rando['nom_photo'].'" width="100px"/></td>
											<td onClick="unCheck(\''.$i.'\');"><input type="checkbox" name="rando[]" value="'.$rando['code'].'" id="'.$i.'" onclick="check(\''.$i.'\');"/></td>
										</tr>';
								$i++;
							}
						}
						echo '		</table>
								</form>
						';
					}
				}
                
				
				
				// - - - - - - - - - - Partie COMMENTAIRES - - - - - - - - - -
				else if($_GET['section'] === 'commentaires'){
					if(!empty($listeComment)){
						// --- BOUTONS ---
						echo '	<form method="post" action="index.php?page=administrateur&section=commentaires">
									<input type="submit" value="Supprimer" name="delete"/>
						';
						
						// --- ENTETE TABLEAU ---
						echo'   <br/>
								<table>
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
							echo '	<tr class="ligne_'.$ligneColor.'" onclick="unCheck(\''.$i.'\');">
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
						echo ' 	</table>
							</form>
						';
					}
				}
                    
                    
                    
                // - - - - - - - - - - Partie PHOTOS - - - - - - - - - -
            	else if($_GET['section'] === 'photos'){
					if(!empty($listePhoto)){
						// --- BOUTONS ---
						echo '	<form method="post" action="index.php?page=administrateur&section=photos">
									<input type="submit" value="Supprimer" name="delete"/>
									<br/><br/><br/>
						';
						
						echo '		&emsp;&emsp;<input type="checkbox" id="selectAll" onChange="unCheckAll(\'selectAll\');"/><label for="selectAll"> Sélectionner / Déselectionner tout </label><br/>';
						
						// --- LISTE PHOTOS ---
						foreach($listePhoto as $photo){
							echo '	<div class="photo">
										<label for="'.$photo['numero'].'">
											<img src="Resources/Galerie/'.$photo['nom_galerie'].'/'.$photo['nom'].'"/>
										</label>
										<input type="checkbox" name="photo[]" value="'.$photo['numero'].'" id="'.$photo['numero'].'"/>
									</div>
							';
						}
					}
                }
                    
                    
                    
                // - - - - - - - - - - Partie MEMBRES - - - - - - - - - -
            	else if($_GET['section'] === 'membres'){
					if(!empty($listeMembre)){
						// --- BOUTONS ---
						echo '	<form method="post" action="index.php?page=administrateur&section=membres">
									<input type="submit" value="Supprimer" name="delete"/>
									<br/><br/><br/>
						';
						
						// --- ENTETE TABLEAU ---
						echo'   <br/>
								<table>
                                    <tr>
                                        <td width="100px">Pseudo</td>
                                        <td width="150px">Nom - Prénom</td>
                                        <td width="200px">E-mail</td>
                                        <td width="250px">Adresse</td>
                                        <td>Déscription</td>
                                        <td width="110px">Photo</td>
                                        <td width="20px"><input type="checkbox" id="selectAll" onChange="unCheckAll(\'selectAll\');"/></td>
                                    </tr>
						';
						
						// --- CONTENU TABLEAU ---
						foreach($listeMembre as $membre){
							if(($i % 2) === 0) $ligneColor = 'pair';
							else $ligneColor = 'impair';
							echo '	<tr class="ligne_'.$ligneColor.'" onclick="unCheck(\''.$i.'\');">
										<td>'.$membre['pseudo'].'</td>
										<td>'.$membre['prenom'].' '.$membre['nom'].'</td>
										<td>'.$membre['mail'].'</td>
										<td>'.$membre['pseudo'].'</td>
										<td>'.printAddress($membre['adresse'], $membre['code_postal'], $membre['ville']).'</td>
										<td><img src="Resources/Galerie/'.$membre['nom_galerie'].'/'.$membre['nom_photo'].'" width="100px"/></td>
										<td onClick="unCheck(\''.$i.'\');"><input type="checkbox" name="membre[]" value="'.$membre['pseudo'].'" id="'.$i.'" onclick="check(\''.$i.'\');"/></td>
									</tr>
							';
							$i++;
						}
						echo ' 	</table>
							</form>
						';
					}
                } ?>
            </section>
    
        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>