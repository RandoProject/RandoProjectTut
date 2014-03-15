<!DOCTYPE html>
<html lang="fr">

	<?php head("Profil"); ?>

	<body>
        <div id="corps">
			<?php menu(); ?>
        
            <?php include_once('Controller/c_activitees_recentes.php'); ?>
    
            <section id="profil">
                <?php
					// Modification du profil
					if(isset($_POST['modify']) && $_SESSION['pseudo'] === $pseudo){
						echo '	<div class="titre">Modifier mon profil</div>
								<form method="post" action="index.php?page=profil&pseudo='.$_SESSION['pseudo'].'">
									<table>
										<tr>
											<td rowspan="4"><img src="'.$path_photo.'"/><input type="file"/></td>
											<td>
												Nom : <input type="text" name="familly_name" value="'.$name.'" maxlength="30" autocomplete="off" required/>
											</td>
											<td>
												Prénom : <input type="text" name="firstname" value="'.$firstname.'" maxlength="30" autocomplete="off" required/>
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<input type="text" name="birth" value="'.$birth.'"/>
											</td>
										</tr>
										<tr>
											<td colspan="2">
												Adresse : <input type="text" name="address" value="'.$address.'"/>
											</td>
										</tr>
										<tr>
											<td colspan="2">
												E-mail : <input type="email" name="mail" value="'.$mail.'" maxlength="70" required/>
											</td>
										</tr>
										<tr>
											<td colspan="3">
												Déscription : <?php echo $description; ?>
											</td>
										</tr>
									</table>
								   <input type="submit" value="Valider" name="validate"/>
								</form>
						';				
					}
					
					// Affichage du profil
					else{
						if($_SESSION['pseudo'] === $pseudo){
							echo '	<form method="post" action="index.php?page=profil&pseudo='.$_SESSION['pseudo'].'">
									   <input type="submit" value="Modifier mon profil" name="modify"/>
									</form>
							';
						}
						echo '	<div class="titre">'.$pseudo.'</div>
								<table>
									<tr>
										<td rowspan="4"><img src="'.$path_photo.'"/></td>
										<td>
											Nom : '.$name.'
										</td>
										<td>
											Prénom : '.$firstname.'
										</td>
									</tr>
									<tr>
										<td colspan="2">Né(e) le '.$birth.'</td>
									</tr>
									<tr>
										<td colspan="2">Adresse : '.$address.'</td>
									</tr>
									<tr>
										<td colspan="2">E-mail : <a href="mailto:'.$mail.'">'.$member->mail.'</a></td>
									</tr>
									<tr>
										<td colspan="3">Déscription : <?php echo $description; ?><br/></td>
									</tr>
								</table>
						';
						echo '	<div class="titre">Randonnées</div>';
						foreach($listeRando as $rando){
							$titleRando = $rando['titre'];
							$lenghtRando = $rando['longueur'];
							$durationRando = $rando['duree'];
							$difficultyRando = $rando['difficulte'];
							$descriptionRando = $rando['descriptif'];
							$waterRando = $rando['point_eau'];
							$altitudeRando = $rando['denivele'];
							$equipmentRando = $rando['titre'];
							$photoRando = $rando['nom_photo'];
							$galerieRando = $rando['nom_galerie'];
							$noteRando = $rando['note'];
							
							echo $titleRando.' '.$noteRando.'<img src="Resources/Galerie/'.$galerieRando.'/'.$photoRando.'" width="100"/><br/>';
						}
					}
				?>
            </section>
    
        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>