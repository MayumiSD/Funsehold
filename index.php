<?php
session_start();

echo htmlspecialchars("ようこそ".$_SESSION["NAME"],ENT_QUOTES."さん");

require './vendor/autoload.php';
$smarty = new Smarty();
$smarty->display('index.tpl');