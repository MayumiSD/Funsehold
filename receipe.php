<?php
session_start();
$receipeName = getReceipeName();
require_once'DSN.php';
// 接続先DBリンク
$connect = "mysql:host={$dsn['host']};dbname={$dsn['dbnm']}";
$pdo = new PDO($connect, $dsn['user'], $dsn['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

echo $_SESSION["email"];


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

if (isset($_SESSION["email"])){
        $userid = $_SESSION["email"];
        $connect;
        $pdo;
        $sql = $pdo->prepare('SELECT * FROM favorite_receipe where email = ?');
        $sql->execute($userid);
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo $data;

}
        
