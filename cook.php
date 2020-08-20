<?php
session_start();

$receipeInfo = getReceipeInfo($_GET["receipeid"]);
var_dump($receipeInfo);


require './vendor/autoload.php';
$smarty = new Smarty();

$smarty->display('cook.tpl');


function getReceipeInfo($receipeId){
    require_once'DSN.php';
    // 接続先DBリンク
    $connect = "mysql:host={$dsn['host']};dbname={$dsn['dbnm']}";
    $pdo = new PDO($connect, $dsn['user'], $dsn['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $stmt = $pdo->prepare('SELECT * FROM receipe where receipe_id = ?');
    $stmt->execute([$receipeId]);
    return $stmt->fetch(PDO::FETCH_ASSOC); 
}
