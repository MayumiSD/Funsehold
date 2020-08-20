<?php
session_start();


require './vendor/autoload.php';
$smarty = new Smarty();

$smarty->display('cook.tpl');
