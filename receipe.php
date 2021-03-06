<?php
session_start();
$receipeName = getReceipeName();
$favoriteInfo = getFavoriteInfo($_SESSION["email"]);
$userid = $_SESSION["email"];

require './vendor/autoload.php';
$smarty = new Smarty();

$smarty->assign('receipeName',$receipeName);
$smarty->assign('favoriteInfo',$favoriteInfo);
$smarty->assign('userid',$userid);
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

function getFavoriteInfo($userid){
            if (isset($userid)){
                    require('DSN.php');
                        // 接続先DBリンク
                    $connect = "mysql:host={$dsn['host']};dbname={$dsn['dbnm']}";
                    $pdo = new PDO($connect, $dsn['user'], $dsn['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                    
                    $stmt = $pdo->prepare('SELECT * FROM favorite_receipe AS T1 JOIN receipe AS T2 ON T1.receipe_id = T2.receipe_id WHERE T1.email = ?');
                    $stmt->execute([$userid]);
                    return $stmt->fetchAll(PDO::FETCH_ASSOC);

            }
 }

