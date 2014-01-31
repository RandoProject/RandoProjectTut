<!DOCTYPE html>
<html lang="fr">

    <?php head("Recherche avanc�e"); ?>

    <body>
        <?php menu(); ?>
        
        <div id="corps">
            <section >
                    <h2>Bienvenue sur RandoPassion, inscrivez-vous d�s maintenant !</h2><br/> 

                    <form action="index.php?page=inscription" method="post">
                        <label for="pseudo">Pseudo : </label>
                            <input type="texte" id="pseudo" name="pseudo"/><br/><br/>

                        <label for="password">Mot de passe :</label>
                            <input type="password" id="password" name="password"/><br/>
                            <input type="password" name="confirm_password"/><br/>

                        <label for="familly_name">Nom : </label>
                            <input type="texte" id="familly_name" name="familly_name"/><br/><br/>

                        <label for="name">Pr�nom : </label>
                            <input type="texte" id="name" name="name"/><br/><br/>

                        <label for="day_birth">Date de naissance :</label>
                            <?php
                                echo '<label for="day_birth">Jour</label>
                                    <select id="day_birth" name="day_birth">';
                                    $i = 1;
                                    for($i; $i <= 31; $i++){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                echo '</select>';
                            ?>
                        <label for"month_birth">Mois

                        <label for="street">Adresse :</label>
                            <input type="texte" id="street" name="street"/><br/><br/>

                        <label for="postal_code">Code postal :</label>
                            <input type="texte" id="postal_code" name="postal_code"/><br/><br/>

                        <label for="city">Ville :</label>
                            <input type="texte" id="city" name="city"/><br/><br/>

                        <label for="mail">Mail :</label>
                            <input type="texte" id="mail" name="mail"/><br/><br/>

                        <input type="submit" value"S'inscrire"/>
                    </form>  

            </section>
        </div>
    
        <?php include_once('Controller/c_footer.php'); ?>
    </body>
</html>
