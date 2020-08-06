<?php
session_start();

// セッションの変数のクリア
$_SESSION = array();

// セッションクリア
session_destroy();

header("location:/index.php");

exit();

?>


