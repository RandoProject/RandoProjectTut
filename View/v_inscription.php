<!DOCTYPE html>
<html lang="fr">

    <?php head("Recherche avancée"); ?>

    <body>
        <?php menu(); ?>
        
        <div id="corps">
            <section >
                    <h2>Bienvenue sur RandoPassion, inscrivez-vous dès maintenant !</h2><br/> 

                    <form action="index.php?page=inscription" method="post">
                        <label for="pseudo">Pseudo : </label>
                            <input type="texte" id="pseudo" name="pseudo"/><br/><br/>

                        <label for="password">Mot de passe :</label>
                            <input type="password" id="password" name="password"/><br/><br/>

                        <label for="familly_name">Nom : </label>
                            <input type="texte" id="familly_name" name="familly_name"/><br/><br/>

                        <label for="name">Prénom : </label>
                            <input type="texte" id="name" name="name"/><br/><br/>

                        <label for="day_birth">Date de naissance :</label>
                            <input type="texte" id="day_birth" name="day_birth"/>
                            <input type="texte" name="month_birth"/>
                            <input type="texte" name="year_birth"/><br/><br/>

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
