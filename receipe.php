<?php
session_start();
$receipeName = getReceipeName();
var_dump($receipeName);

require './vendor/autoload.php';
$smarty = new Smarty();
$smarty->display('receipe.tpl');
$smarty->assign('receipeName',$receipeName);


function getReceipeName (){
            require_once'DSN.php';
            // 接続先DBリンク
            $connect = "mysql:host={$dsn['host']};dbname={$dsn['dbnm']}";
            $pdo = new PDO($connect, $dsn['user'], $dsn['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $stmt = $pdo->prepare('SELECT * FROM receipe ');
            $stmt->execute();

            return $stmt->fetchAll();
     
}
