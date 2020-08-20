<?php
session_start();
$receipeName = getReceipeName();


require './vendor/autoload.php';
$smarty = new Smarty();

$smarty->assign('receipeName',$receipeName);
$smarty->display('cook.tpl');
