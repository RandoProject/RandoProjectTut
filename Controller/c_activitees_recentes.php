<?php

include_once('bin/params.php');
include_once('Models/m_activitees_recentes.php');

$liste_rando = dernieres_rando(3);

include_once('View/v_activitees_recentes.php');