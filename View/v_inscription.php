<!DOCTYPE html>
<html lang="fr">

    <?php head("Recherche avancée"); ?>

    <body>
        <div id="corps">
       		<?php menu(); ?>
            <?php include_once('Controller/c_activitees_recentes.php'); ?>
            
            <section id="inscription">
				<?php
                    if(isset($_POST['submit']) and !isset($error)){
                            echo '<h2>Vous vous êtes inscrit sur RandoPassion !</br>Bienvenue !</h2>';
                    }
                    else{
                ?>
                <div class="titre">Inscrivez vous</div>
    
                <form action="index.php?page=inscription" method="post">
    
                    <?php if(isset($error['pseudo'])) echo '<p>'.$error['pseudo'].'</p>';?>
                    <img id="img_formulaire_inscription" src="Resources/Images/contacts.png"><label for="pseudo">Pseudo :</label>
                    <input type="text" id="pseudo" name="pseudo" value="<?php if(isset($value['pseudo'])) echo $value['pseudo']; ?>" maxlength="30" required/><br/><br/>
    
                    <?php if(isset($error['password'])) echo '<p>'.$error['password'].'</p>';?>
                    <img id="img_formulaire_inscription" src="Resources/Images/padlock.png"><label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" maxlength="30" autocomplete="off" required/><br/><br/>
    
                    <img id="img_formulaire_inscription" src="Resources/Images/padlock.png"><label for="confirm_password">Confirmation :</label>
                    <input type="password" id="confirm_password" name="confirm_password" maxlength="30" autocomplete="off" required/><br/><br/>
    
                    <?php if(isset($error['familly_name'])) echo '<p>'.$error['familly_name'].'</p>';?>
                    <img id="img_formulaire_inscription" src="Resources/Images/contacts.png"><label for="familly_name">Nom :</label>
                    <input type="text" id="familly_name" name="familly_name" value="<?php if(isset($value['familly_name'])) echo $value['familly_name']; ?>" maxlength="30" autocomplete="off" required/><br/><br/>
    
                    <?php if(isset($error['name'])) echo '<p>'.$error['name'].'</p>';?>
                    <img id="img_formulaire_inscription" src="Resources/Images/contacts.png"><label for="name">Prénom :</label>
                    <input type="text" id="name" name="name" value="<?php if(isset($value['name'])) echo $value['name']; ?>" maxlength="30" autocomplete="off" required/><br/><br/>
            
                    <?php if(isset($error['day_birth'])) echo '<p>'.$error['day_birth'].'</p>';?>
                    <p id="titre_birth">Date de naissance :</p><br/>
                    <?php
                        echo '<img id="img_formulaire_inscription" src="Resources/Images/birthday.png"> <label for="day_birth" id="day">Jour</label>
                            <select id="day_birth" name="day_birth">';
                            $i = 1;
                            for($i; $i <= 31; $i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                        echo '</select>';
                    ?>
    
                    <?php if(isset($error['month_birth'])) echo '<p>'.$error['month_birth'].'</p>';?>
                    <label for"month_birth" id="mois_annee">Mois :</label>
                    <?php
                        echo '<select id="month_birth" name="month_birth">';
                            $i = 1;
                            for($i; $i <= 9; $i++){
                                echo '<option value="0'.$i.'"> 0'.$i.'</option>';
                            }
                            $j = 10;
                            for($j; $j <= 12; $j++){
                                echo '<option value="'.$j.'">'.$j.'</option>';
                            }
                        echo '</select>';
                    ?>
                        
                    <?php if(isset($error['year_birth'])) echo '<p>'.$error['year_birth'].'</p>';?>
                    <label for"year_birth" id="mois_annee">Année :</label>
                    <?php
                        echo '<select id="year_birth" name="year_birth">';
                            $i = date('Y');
                            for($i; $i >= 1920; $i--){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                        echo '</select>';
                    ?><br/><br/>
    
                    <?php if(isset($error['street'])) echo '<p>'.$error['street'].'</p>';?>
                    <img id="img_formulaire_inscription" src="Resources/Images/home.png"><label for="street">Adresse :</label>
                    <input type="text" id="street" name="street" value="<?php if(isset($value['street'])) echo $value['street']; ?>" maxlength="70" autocomplete="off"/><br/><br/>
    
                    <?php if(isset($error['postal_code'])) echo '<p>'.$error['postal_code'].'</p>';?>
                    <img id="img_formulaire_inscription" src="Resources/Images/home.png"><label for="postal_code">Code postal :</label>
                    <input type="text" id="postal_code" name="postal_code" value="<?php if(isset($value['postal_code'])) echo $value['postal_code']; ?>" pattern="\d+" maxlength="5" autocomplete="off"/><br/><br/>
    
                    <?php if(isset($error['city'])) echo '<p>'.$error['city'].'</p>';?>
                    <img id="img_formulaire_inscription" src="Resources/Images/home.png"><label for="city">Ville :</label>
                    <input type="text" id="city" name="city" value="<?php if(isset($value['city'])) echo $value['city']; ?>" maxlength="30" autocomplete="off"/><br/><br/>
    
                    <?php if(isset($error['mail'])) echo '<p>'.$error['mail'].'</p>';?>
                    <img id="img_formulaire_inscription" src="Resources/Images/mail.png"><label for="mail">Mail :</label>
                    <input type="email" id="mail" name="mail" value="<?php if(isset($value['mail'])) echo $value['mail']; ?>" maxlength="70" required/><br/><br/>
    
                    <input type="submit" value"S'inscrire" name="submit"/>
                </form> 
            	<?php } ?>
    		</section>
    
        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
    </body>
</html>
