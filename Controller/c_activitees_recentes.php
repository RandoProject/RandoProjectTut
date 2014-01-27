<?php

include_once('bin/params.php');
include_once('Models/m_activitees_recentes.php');

$liste_rando = last_rando(3);
$liste_com = last_comment(3);

include_once('View/v_activitees_recentes.php');