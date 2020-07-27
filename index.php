<?php
session_start();

// ログイン状態チェック
if (!isset($_SESSION["email"])) {
    header("Location: Logout.php");
    exit;
}

echo htmlspecialchars("ようこそ".$_SESSION["NAME"],ENT_QUOTES."さん");

require './vendor/autoload.php';
$smarty = new Smarty();
$smarty->display('index.tpl');