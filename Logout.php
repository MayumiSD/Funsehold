<?php
session_start();

if (isset($_SESSION["NAME"])) {
    $errorMessage = "ログアウトしました。";
} else {
    $errorMessage = "セッションがタイムアウトしました。";
}

// セッションの変数のクリア
$_SESSION = array();

// セッションクリア
session_destroy();

echo htmlspecialchars($errorMessage, ENT_QUOTES);

require './vendor/autoload.php';
$smarty = new Smarty();
$smarty->display('index.tpl');

?>
