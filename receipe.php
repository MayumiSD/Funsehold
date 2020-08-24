<?php
session_start();
$receipeName = getReceipeName();
$favoriteInfo = getFavoriteInfo($_SESSION["email"]);
var_dump($favoriteInfo);

echo $_SESSION["email"];


require './vendor/autoload.php';
$smarty = new Smarty();

$smarty->assign('receipeName',$receipeName);
$smarty->display('receipe.tpl');

function db_connect(){
            require_once'DSN.php';
            // 接続先DBリンク
            $connect = "mysql:host={$dsn['host']};dbname={$dsn['dbnm']}";
            $pdo = new PDO($connect, $dsn['user'], $dsn['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}

function getReceipeName (){
            db_connect();
            $stmt = $pdo->prepare('SELECT * FROM receipe ');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
     
}

function getFavoriteInfo($userid){
        db_connect();
        $sql = $pdo->prepare('SELECT * FROM favorite_receipe where email = ?');
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
