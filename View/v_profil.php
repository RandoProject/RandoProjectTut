<!DOCTYPE html>
<html lang="fr">

	<?php head("Profil", array(array('type' => 'javascript', 'src' => 'JS/tinyMCE/tinymce.min.js'))); ?>

    <script type="text/javascript">
		tinymce.init({
			selector: "#description",
			browser_spellcheck: true,
			language: "fr_FR",
			element_format : 'html',
			nowrap: true,
			menubar: false,
			statusbar: false,
			nonbreaking_force_tab: true, // Peremet à l'appuie sur <tab> d'avoir une tabulation et ne pas changer le focus (il faut le plugin)
			plugins: 'emoticons link textcolor image nonbreaking',
			toolbar1: 'undo redo | cut copy paste | bold italic underline | forecolor | fontsizeselect  | alignleft aligncenter alignright alignjustify | bullist numlist | image link | emoticons',
			height: 150,
		});
	</script>
    
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
									<table id="profil">
										<tr>
											<td width="40%"></td>
											<td width="14%"></td>
											<td width="21%"></td>
											<td width="27%"></td>
										</tr>
										<tr>
											<td rowspan="4">
												<img src="'.$path_photo.'"/>
											</td>
											<td colspan="2">
												Nom : <input type="text" name="name" value="'.$member->nom.'" maxlength="30" autocomplete="off" required/>
											</td>
											<td>
												Prénom : <input type="text" name="firstname" value="'.$member->prenom.'" maxlength="30" autocomplete="off" required/>
											</td>
										</tr>
										<tr>
											<td colspan="3">
												Date de naissance : 
												<select name="day_birth">';
												for($i = 1; $i <= 31; $i++){
													echo '<option value="'.$i.'"';
													if($i == $date->format('d')) echo ' selected';
													echo '>'.$i.'</option>';
												}
												echo '</select> / 
												<select name="month_birth">';
												for($i = 1; $i <= 12; $i++){
													$j = (($i < 10)? '0' : '').$i;
													echo '<option value="'.$j.'"';
													if($j == $date->format('m')) echo ' selected';
													echo '>'.$j.'</option>';
												}
												echo '</select> / 
												<select name="year_birth">';
												for($i = date('Y'); $i >= 1920; $i--){
													echo '<option value="'.$i.'"';
													if($i == $date->format('Y')) echo ' selected';
													echo '>'.$i.'</option>';
												}
												echo '</select>
											</td>
										</tr>
										<tr>
											<td>
												Adresse : 
											</td>
											<td colspan="2">
												<input type="text" name="address" value="'.$member->adresse.'" maxlength="70" size="59"/>
											</td>
										</tr>
										<tr>
											<td>
												Code postal : 
											</td>
											<td colspan="2">
												<input type="text" name="postal_code" value="'.$member->code_postal.'" maxlength="5" pattern="\d+" size="5"/>
											</td>
										</tr>
										<tr>
											<td rowspan="2">
												<input type="file" name="photo"/>
											</td>
											<td>
												Ville : 
											</td>
											<td colspan="2">
												<input type="text" name="city" value="'.$member->ville.'" maxlength="30" size="59"/>
											</td>
										</tr>
										<tr>
											<td>
												E-mail :
											</td>
											<td colspan="2">
												<input type="email" name="mail" value="'.$member->mail.'" maxlength="70" required size="59"/>
											</td>
										</tr>
										<tr>
											<td colspan="4">
												<br/>
												<textarea id="description" name="description">'.$member->description.'</textarea>
											</td>
										</tr>
									</table>
								   	<input type="submit" value="Valider" name="update"/>
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
								<table id="profil">
									<tr>
										<td rowspan="4" width="25%">
											<img src="'.$path_photo.'"/>
										</td>
										<td width="35%">
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
										<td colspan="3">Déscription : '.$description.'<br/></td>
									</tr>
								</table>
						';
						echo '	<div class="titre">Randonnées</div>
									<table id="rando">';
						foreach($listeRando as $rando){
							$codeRando = $rando['code'];
							$titleRando = $rando['titre'];
							$photoRando = $rando['nom_photo'];
							$galerieRando = $rando['nom_galerie'];
							$noteRando = '';
							for($i = 1; $i <= $rando['note']; $i++){ 
								$noteRando .= '<img class="note" src="Resources/Images/stars_pleines.png"/>';
							}
							
							echo '	
										<tr onclick="document.location=\'index.php?page=fiche_rando&code='.$codeRando.'\'">
											<td width="160px"><img class="photo_rando" src="Resources/Galerie/'.$galerieRando.'/'.$photoRando.'"/></td>
											<td><a href="index.php?page=fiche_rando&code='.$codeRando.'"><h1>'.$titleRando.'</h1></a></td>
											<td>'.$noteRando.'</td>
										</tr>
									
							';
						}
						echo '		</table>';
					}
				?>
            </section>
    
        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>