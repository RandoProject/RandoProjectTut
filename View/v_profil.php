<!DOCTYPE html>
<html lang="fr">

	<?php head("Profil"); ?>

	<body>
		<?php menu(); ?>
        
        <div id="corps">
            <?php include_once('Controller/c_activitees_recentes.php'); ?>
    
            <section id="profil">
				<div id="pseudo"><?php echo $pseudo; ?></div><br/>
            	<table>
                	<tr>
                    	<td width="150px"><img src="<?php echo $path_photo; ?>"/></td>
                    	<td>
                            Nom : <?php echo $name; ?><br/>
                            Pr�nom : <?php echo $firstname; ?><br/>
                            N�(e) le <?php echo $birth; ?><br/>
                            Adresse : <?php echo $adress; ?><br/>
                			E-mail : <?php echo $mail; ?><br/>
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="2">D�scription : <?php echo $description; ?><br/></td>
                    </tr>
                </table>
				<br/>
                
               
                
            </section>
        </div>
    
        <?php include_once('Controller/c_footer.php'); ?>
	</body>
</html>