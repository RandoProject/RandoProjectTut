<?php include_once('includes.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
    <?php 
    $css1 = array('type' => 'css', 'href' => 'CSS/design2.css', 'name' => 'test1');
    $script1 = array('type' => 'JavaScript', 'href' => 'JS/myscript.js');

	head("Accueil", array($css1, $script1)); ?>
    <body>
        <div id="bloc_page">
            <?php headerPage(); ?>
            <section>
                
            </section>

            <?php footer(); ?>
        </div>
    </body>
</html>



