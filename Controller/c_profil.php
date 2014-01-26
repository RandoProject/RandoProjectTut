<?php

include_once('bin/params.php');
include_once('Models/m_members.php');

$member = get_member($_SESSION['pseudo']);
$photo = get_photo($_SESSION['pseudo']);

include_once('View/v_profil.php');