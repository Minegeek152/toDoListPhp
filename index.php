<?php 
//Chargement fichier de config
require_once('utils.php');
require_once(__DIR__."/config/config.php");

require_once(__DIR__.'/config/Autoload.php');
Autoload::charger();

session_start();
$front=new FrontCtrl();


 ?>