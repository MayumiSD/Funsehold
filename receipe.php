<?php
session_start();
$receipeName = getReceipeName();
$favoriteReceipe = getFavoriteReceipe();

require './vendor/autoload.php';
$smarty = new Smarty();

$smarty->assign('receipeName',$receipeName);
$smarty->assign('favoriteReceipe',$favoriteReceipe);
$smarty->display('receipe.tpl');
$smarty->display('cook.tpl');

function getReceipeName (){
            require_once'DSN.php';
            // 接続先DBリンク
            $connect = "mysql:host={$dsn['host']};dbname={$dsn['dbnm']}";
            $pdo = new PDO($connect, $dsn['user'], $dsn['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $stmt = $pdo->prepare('SELECT * FROM receipe ');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
     
}

function getFavoriteReceipe (){
    require_once'DSN.php';
    // 接続先DBリンク
    $connect = "mysql:host={$dsn['host']};dbname={$dsn['dbnm']}";
    $pdo = new PDO($connect, $dsn['user'], $dsn['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $stmt = $pdo->prepare('SELECT * FROM favorite_receipe ');
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}
