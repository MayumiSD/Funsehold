<?php
session_start();
$receipeName = getReceipeName();
$favoriteInfo = getFavoriteInfo($_SESSION["email"]);
var_dump($favoriteInfo);


require './vendor/autoload.php';
$smarty = new Smarty();

$smarty->assign('receipeName',$receipeName);
$smarty->display('receipe.tpl');

function getReceipeName (){
            require_once'DSN.php';
            // 接続先DBリンク
            $connect = "mysql:host={$dsn['host']};dbname={$dsn['dbnm']}";
            $pdo = new PDO($connect, $dsn['user'], $dsn['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $stmt = $pdo->prepare('SELECT * FROM receipe ');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
     
}

function getFavoriteInfo($email){
    if (isset($_SESSION["email"])){
        require_once'DSN.php';
        // 接続先DBリンク
        $connect = "mysql:host={$dsn['host']};dbname={$dsn['dbnm']}";
        $pdo = new PDO($connect, $dsn['user'], $dsn['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $stmt = $pdo->prepare('SELECT * FROM favorite_receipe where ? ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}