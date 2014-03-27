<?php
/******************************************************************************/
/*                                                                            */
/*                       __        ____                                       */
/*                 ___  / /  ___  / __/__  __ _____________ ___               */
/*                / _ \/ _ \/ _ \_\ \/ _ \/ // / __/ __/ -_|_-<               */
/*               / .__/_//_/ .__/___/\___/\_,_/_/  \__/\__/___/               */
/*              /_/       /_/                                                 */
/*                                                                            */
/*                                                                            */
/******************************************************************************/
/*                                                                            */
/* Titre          : Calcul du nombre de lignes par fichier et total d'un...   */
/*                                                                            */
/* URL            : http://www.phpsources.org/scripts435-PHP.htm              */
/* Auteur         : bud                                                       */
/* Date édition   : 23 Juil 2008                                              */
/*                                                                            */
/******************************************************************************/

/**
*** int counter(string $dir)
***
***        \param $dir: chemin du dossier à parcourir
**/
function counter($dir, &$i)
{
   $handle = opendir($dir);

   $nbLines = 0;

   while( ($file = readdir($handle)) != false )
   {
      if( $file != "." && $file != "..")
      {
         if( !is_dir($dir."/".$file) )
         {
            if( preg_match("#\.(php|html|js|css|htaccess)$#", $file) )
            {
                $i++;
                $nb = count(file($dir."/".$file));
    echo $dir,"/",$file," => <strong>",$nb,"</strong><br />n";
                $nbLines += $nb;
            }
         }
         else
         {
            $nbLines += counter($dir."/".$file, $i);
         }
      }
    }
   closedir($handle);
   
   return $nbLines;
}

// dossier à parcourir
// '.' signifie que je parcours le dossier où se trouve mon script
$dir = ".";
$i = 0;

$nb = counter($dir, $i);
print("<br />Le projet comporte un total de <strong>".$nb.
"</strong> lignes<br />\n");

print("<br />Le projet comporte un total de <strong>".$i.
"</strong> lignes<br />\n");

?>