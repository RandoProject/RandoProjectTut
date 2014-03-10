<!DOCTYPE html>
<html lang="fr">

	<?php head("Profil"); ?>

	<body>
        <div id="corps">
			<?php menu(); ?>
        
            <?php include_once('Controller/c_activitees_recentes.php'); ?>
    
            <section id="profil">
				<div id="pseudo"><?php echo $pseudo; ?></div><br/>
                <?php
					if(isset($_POST['pseudo'])){
						echo '	<table>
									<tr>
										<td width="150px">
											<img src="'.$path_photo.'"/>
											<input type="file"/>
										</td>
										<td>
											Nom : <input type="text" name="familly_name" value="'.$name.'" maxlength="30" autocomplete="off" required/><br/>
											Prénom : <input type="text" name="firstname" value="'.$firstname.'" maxlength="30" autocomplete="off" required/><br/>
											Né(e) le <input type="text" name="birth" value="'.$birth.'"/><br/>
											Adresse : <input type="text" name="address" value="'.$address.'"/><br/>
											E-mail : <input type="email" name="mail" value="'.$mail.'" maxlength="70" required/><br/>
										</td>
									</tr>
									<tr>
										<td colspan="2">Déscription : <?php echo $description; ?><br/></td>
									</tr>
								</table>
						';					
					}
					else{
						echo '	<table>
									<tr>
										<td width="150px"><img src="'.$path_photo.'"/></td>
										<td>
											Nom : '.$name.'<br/>
											Prénom : '.$firstname.'<br/>
											Né(e) le '.$birth.'<br/>
											Adresse : '.$address.'<br/>
											E-mail : <a href="mailto:'.$mail.'">'.$member->mail.'</a><br/>
										</td>
									</tr>
									<tr>
										<td colspan="2">Déscription : <?php echo $description; ?><br/></td>
									</tr>
								</table>
						';
						if($_SESSION['pseudo'] === $pseudo){
							echo '	<form method="post" action="index.php?page=profil&pseudo='.$_SESSION['pseudo'].'">
									   <input type="submit" value="Modifier mon profil" name="pseudo"/>
									</form>
							';
						}
					}
				?>
            </section>
    
        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>