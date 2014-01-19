<?php

include_once('bin/params.php');
include_once('Models/m_gestion_recherche.php');
			
				/*Zone de TEST*/

if(isset($_POST['title']) and $_POST['title'] != "")
{
		$affichage_titre_rando = affichage_title($_POST['title']);
}
if(isset($_POST['s_region']))
{
		$affichage_region = affichage_region($_POST['s_region']);
}



if(isset($_POST['title'],$_POST['s_region'])  and $_POST['title'] !="")
{
		$affichage_rando = affichage_f_rando($_POST['title'], $_POST['s_region']);
}

				/*Fin de zone de TEST, je vais supprimer après, çà marche !*/

																				/*J'ai pas trouvé de moyen plus court pour faire tout çà, étant donné qu'il y a des intervalles, en faisant çà dans la fonction qui fera la requête à la base de donnée, j'aurais tous les cas possibles, et je pourrais définir les intervalles correctement, çà fait beaucoup je sais mais il y a beaucoup d'intervalle, et je n'ai pas trouvé plus facile à faire :/ */

if(isset($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water']) and $_POST['title'] != "")
{
	if($_POST['s_region'] == "not_clarify")
	{
		if($_POST['distance'] == "0" || $_POST['distance'] == "5" || $_POST['distance'] == "10" || $_POST['distance'] == "15" || $_POST['distance'] == "20" || $_POST['distance'] == "25")
		{
			if($_POST['time'] == "0")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_true','distance_0_25','time_0');
			}
			elseif($_POST['time'] == "1" || $_POST['time'] == "3")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_true','distance_0_25','time_1_3');
			}
			elseif($_POST['time'] == "10" || $_POST['time'] == "24")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_true','distance_0_25','time_10_24');
			}
			elseif($_POST['time'] == "48")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_true','distance_0_25','time_48_96');
			}
			else 	/*------------------Si le temps est égal ou supérieur à 96h------------------*/
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_true','distance_0_25','time_96');
			}
		}

		elseif($_POST['distance'] == "30" || $_POST['distance'] == "40")
		{
			if($_POST['time'] == "0")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_true','distance_30_40','time_0');
			}
			elseif($_POST['time'] == "1" || $_POST['time'] == "3")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_true','distance_30_40','time_1_3');
			}
			elseif($_POST['time'] == "10" || $_POST['time'] == "24")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_true','distance_30_40','time_10_24');
			}
			elseif($_POST['time'] == "48")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_true','distance_30_40','time_48_96');
			}
			else 	/*------------------Si le temps est égal ou supérieur à 96h------------------*/
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_true','distance_30_40','time_96');
			}
		}

		else 	/*------------------Si la distance est égal ou supérieur à 50 Km------------------*/
		{
			if($_POST['time'] == "0")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_true','distance_50','time_0');
			}
			elseif($_POST['time'] == "1" || $_POST['time'] == "3")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_true','distance_50','time_1_3');
			}
			elseif($_POST['time'] == "10" || $_POST['time'] == "24")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_true','distance_50','time_10_24');
			}
			elseif($_POST['time'] == "48")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_true','distance_50','time_48_96');
			}
			else 	/*------------------Si le temps est égal ou supérieur à 96h------------------*/
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_true','distance_50','time_96');
			}
		}
	}

	else 	/*------------------Si la région est sélectionnée------------------*/
	{
		if($_POST['distance'] == "0" || $_POST['distance'] == "5" || $_POST['distance'] == "10" || $_POST['distance'] == "15" || $_POST['distance'] == "20" || $_POST['distance'] == "25")
		{
			if($_POST['time'] == "0")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_false','distance_0_25','time_0');
			}
			elseif($_POST['time'] == "1" || $_POST['time'] == "3")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_false','distance_0_25','time_1_3');
			}
			elseif($_POST['time'] == "10" || $_POST['time'] == "24")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_false','distance_0_25','time_10_24');
			}
			elseif($_POST['time'] == "48")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_false','distance_0_25','time_48_96');
			}
			else 	/*------------------Si le temps est égal ou supérieur à 96h------------------*/
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_false','distance_0_25','time_96');
			}
		}

		elseif($_POST['distance'] == "30" || $_POST['distance'] == "40")
		{
			if($_POST['time'] == "0")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_false','distance_30_40','time_0');
			}
			elseif($_POST['time'] == "1" || $_POST['time'] == "3")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_false','distance_30_40','time_1_3');
			}
			elseif($_POST['time'] == "10" || $_POST['time'] == "24")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_false','distance_30_40','time_10_24');
			}
			elseif($_POST['time'] == "48")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_false','distance_30_40','time_48_96');
			}
			else 	/*------------------Si le temps est égal ou supérieur à 96h------------------*/
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_false','distance_30_40','time_96');
			}
		}

		else 	/*------------------Si la distance est égal ou supérieur à 50 Km------------------*/
		{
			if($_POST['time'] == "0")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_false','distance_50','time_0');
			}
			elseif($_POST['time'] == "1" || $_POST['time'] == "3")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_false','distance_50','time_1_3');
			}
			elseif($_POST['time'] == "10" || $_POST['time'] == "24")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_false','distance_50','time_10_24');
			}
			elseif($_POST['time'] == "48")
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_false','distance_50','time_48_96');
			}
			else 	/*------------------Si le temps est égal ou supérieur à 96h------------------*/
			{
				$affichage_rando_complet = affichage_f_rando_complet($_POST['title'],$_POST['s_region'], $_POST['distance'], $_POST['time'], $_POST['difficulty'], $_POST['water'],'s_region_false','distance_50','time_96');
			}
		}
	}
}


include_once('View/v_affichage_recherche.php');