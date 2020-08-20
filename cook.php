<?php
session_start();

echo $_GET["receipeid"]; 


require './vendor/autoload.php';
$smarty = new Smarty();

$smarty->display('cook.tpl');
